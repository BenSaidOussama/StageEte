<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Server;
use App\Client;
use App\Template_profile;
use App\LPAR;
use DB;
use App\Quotation;


class ServerController extends Controller
{
    public function EditServer($id){
        
        $server= Server::find($id);
        $array=[];
        $templates = Template_profile::all();
        foreach(  $templates as $i){
            array_push($array,$i);

        }
        return view('/Edit_Server',compact('server','array'));
    }
    public function saveUpdate(Request $request){
        $array=[];
        if($request->input('btn')=="save"){
        $id=$request->input('id');
        $server= Server::find($id);
       // die($server);
   
        $id_client=$server->Client_FK_id;
        $client=Client::find($id_client);
        $server->Server_description=$request->input('Server_description');
        $server->LPAR_prefix=$request->input('LPAR_prefix');
        $server->Server_type=$request->input('Server_type');
        $server->Server_LPARs_nbr=$server->Server_LPARs_nbr+$request->input('Server_LPARs_nbr');


        if($request->input('template')=="no template"){
            for ($i =0; $i < $request->input('Server_LPARs_nbr'); $i++)
            {
                $lpar=new LPAR();
                $lpar->LPAR_name=$server->LPAR_prefix.$i;
                $lpar->Server_FK_id=$id;
                
                $lpar->save();
            }

        }
        else{
            for ($i =0; $i < $request->input('Server_LPARs_nbr'); $i++)
            {
                $lpar=new LPAR();
                $id_t=$request->input('template');
                $template=Template_profile::find($id_t);
                $lpar->LPAR_name=$server->LPAR_prefix.$i;
                $lpar->disired_memory=$template->disired_memory;
                $lpar->disired_proc_units=$template->disired_proc_units;
                $lpar->disired_v_proc= $template->disired_v_proc;
                $lpar->max_memory=$template->max_memory;
                $lpar->max_proc_units=$template->max_proc_units;
                $lpar->max_v_adapters= $template->max_v_adapters;
                $lpar->max_v_proc=$template->max_v_proc;
                $lpar->proc_pool= $template->proc_pool;
                $lpar->profil_name=$template->profil_name;
                $lpar->shared=$template->shared;
                $lpar->Server_FK_id=$id;
                $lpar->min_memory=$template->min_memory;
                $lpar->min_proc_units=$template->min_proc_units;
                $lpar->min_v_proc=$template->min_v_proc;
                $lpar->template_FK_id=$id_t;
                $lpar->isAuto_StartWithMangedSys=$template->isAuto_StartWithMangedSys;
                $lpar->isEnable_Connection_Monitoring= $template->isEnable_Connection_Monitoring;
                $lpar->isEnable_redundant_Error_Path_report=$template->isEnable_redundant_Error_Path_report;
                $lpar->isNormal_BootMode=$template->isNormal_BootMode;
                $lpar->isSMS_BootMode=$template->isSMS_BootMode;
                $lpar->save();
            }
            
        }
        $server->save();
    }
    $array = DB::table('l_p_a_r_s')
        ->where('Server_FK_id', '=', $server->id)
        ->paginate(2);
    

    //return $array;
        return view('/ViewClient_Server_lpars',compact('server','array','client'));

    }
    public function NewServer($id){
        $client= Client::find($id);
       // die($client);
       $array=[];
       $templates = Template_profile::all();
       foreach(  $templates as $i){
           array_push($array,$i);

       }
        return view('/NewServer',compact('client','array'));
    }
    public function createServer(Request $request){
       
        $server= new Server();

        $client=Client::find($request->input('id'));
        $array=[];
        $server->Client_FK_id=$request->input('id');
        $server->Server_name=$request->input('Server_name');
        $server->Server_description=$request->input('Server_description');
        $server->LPAR_prefix=$request->input('LPAR_prefix');
        $server->Server_type=$request->input('Server_type');
        $server->Server_LPARs_nbr=$request->input('Server_LPARs_nbr');
        $server->save();
        if($request->input('template')=="no template"){
            for ($i =0; $i < $request->input('Server_LPARs_nbr'); $i++)
            {
                $lpar=new LPAR();
                $lpar->LPAR_name=$server->LPAR_prefix.$i;
                $lpar->Server_FK_id=$server->id;
                array_push($array,$lpar);
                $lpar->save();
            }

        }
        else{
            for ($i =0; $i < $request->input('Server_LPARs_nbr'); $i++)
            {
                $lpar=new LPAR();
                $id_t=$request->input('template');
                $template=Template_profile::find($id_t);
                $lpar->LPAR_name=$server->LPAR_prefix.$i;
                $lpar->disired_memory=$template->disired_memory;
                $lpar->disired_proc_units=$template->disired_proc_units;
                $lpar->disired_v_proc= $template->disired_v_proc;
                $lpar->max_memory=$template->max_memory;
                $lpar->max_proc_units=$template->max_proc_units;
                $lpar->max_v_adapters= $template->max_v_adapters;
                $lpar->max_v_proc=$template->max_v_proc;
                $lpar->proc_pool= $template->proc_pool;
                $lpar->profil_name=$template->profil_name;
                $lpar->shared=$template->shared;
                $lpar->Server_FK_id=$server->id;
                $lpar->min_memory=$template->min_memory;
                $lpar->min_proc_units=$template->min_proc_units;
                $lpar->min_v_proc=$template->min_v_proc;
                $lpar->template_FK_id=$id_t;
                $lpar->isAuto_StartWithMangedSys=$template->isAuto_StartWithMangedSys;
                $lpar->isEnable_Connection_Monitoring= $template->isEnable_Connection_Monitoring;
                $lpar->isEnable_redundant_Error_Path_report=$template->isEnable_redundant_Error_Path_report;
                $lpar->isNormal_BootMode=$template->isNormal_BootMode;
                $lpar->isSMS_BootMode=$template->isSMS_BootMode;
                $lpar->save();
                array_push($array,$lpar);
            }
            
        }
    
        return view('/ViewClient_Server_lpars',compact('server','array','client'));

    }
    public function deleteServer($id){
        
        $server=Server::find($id);
        //die($server);
        $client=Client::find($server->Client_FK_id);
      
        $server->delete();
        $array = DB::table('servers')
        ->where('Client_FK_id', '=', $server->Client_FK_id)
        ->get();
       // die($array);
        $client->Client_servers_nbr=$client->Client_servers_nbr-1;
        $client->save();

      return view('/view_client',compact('server','client','array'));


    }
    
}
