<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Server;
use App\Client;
use App\VSwitch;
use App\Http\Requests\CreateServerRequest;
use App\Http\Requests\EditServerRequest;
use App\Template_profile;
use App\LPAR;
use DB;
use App\Quotation;


class ServerController extends Controller
{
    public function EditServer($id){
        
        $server= Server::find($id);
        $array=[];
        $templates= DB::table('template_profiles')
        ->where('template_name', '!=',null )->where('Client_FK_id','=',$client->id)->get();
       
     
        return view('/Edit_Server',compact('server','templates'));
    }
    public function saveUpdate(EditServerRequest $request,$id){
        $array=[];
        
       
        $server= Server::find($id);
        //  die($server);
        $id_client=$server->Client_FK_id;
        $client=Client::find($id_client);
        $server->Server_description=$request->input('Server_description');
        $server->LPAR_prefix=$request->input('LPAR_prefix');
        $server->Server_type=$request->input('Server_type');
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
                $lpar->Template_FK_id=$id_t;
                $lpar->isAuto_StartWithMangedSys=$template->isAuto_StartWithMangedSys;
                $lpar->isEnable_Connection_Monitoring= $template->isEnable_Connection_Monitoring;
                $lpar->isEnable_redundant_Error_Path_report=$template->isEnable_redundant_Error_Path_report;
                $lpar->isNormal_BootMode=$template->isNormal_BootMode;
                $lpar->isSMS_BootMode=$template->isSMS_BootMode;
                $lpar->save();
            }
            
        }
        $server->Server_LPARs_nbr=$server->Server_LPARs_nbr+$request->input('Server_LPARs_nbr');
        
        $templates= DB::table('template_profiles')
        ->where('template_name', '!=',null )->where('Client_FK_id','=',$client->id)->get();
       
        $array = DB::table('servers')
        ->where('Client_FK_id', '=',$client->id )->get();
        
     
        $server->save();
    
    $array = DB::table('l_p_a_r_s')
        ->where('Server_FK_id', '=', $server->id)->get();
    

    //return $array;
        return view('/ViewClient_Server_lpars',compact("templates",'server','array','client'));

    }
    public function NewServer($id){
        $client= Client::find($id);
       // die($client);
       $array=[];
       $templates= DB::table('template_profiles')
        ->where('template_name', '!=',null )->where('Client_FK_id','=',$client->id)->get();
       
        return view('/NewServer',compact('client','templates'));
    }
    public function createServer(CreateServerRequest $request){
       
        $server= new Server();

        $client=Client::find($request->input('id'));
        $client->Client_servers_nbr=$client->Client_servers_nbr+1;
        $client->save();
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
                $lpar->Template_FK_id=$id_t;
                $lpar->isAuto_StartWithMangedSys=$template->isAuto_StartWithMangedSys;
                $lpar->isEnable_Connection_Monitoring= $template->isEnable_Connection_Monitoring;
                $lpar->isEnable_redundant_Error_Path_report=$template->isEnable_redundant_Error_Path_report;
                $lpar->isNormal_BootMode=$template->isNormal_BootMode;
                $lpar->isSMS_BootMode=$template->isSMS_BootMode;
                $lpar->save();
                //array_push($array1,$lpar);
            }
            
        }
        $templates = DB::table('template_profiles')
        ->where('Client_FK_id', '=',$client->id )->get();
        $array = DB::table('servers')
        ->where('Client_FK_id', '=',$client->id )->get();
        
        return view('/view_client',compact('server','array','client','templates'));

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
        $templates= DB::table('template_profiles')
        ->where('template_name', '!=',null )->where('Client_FK_id','=',$client->id)->get();
       
 

      return view('/view_client',compact("client",'array','templates'));


    }
    public function ViewServer($id){
        $server=Server::find($id);
        $id_client=$server->Client_FK_id;
       // die($server);
        $client=Client::find($id_client);
       // die($client);
        $array= DB::table('l_p_a_r_s')
        ->where('Server_FK_id', '=',$id )->get();
        $templates= DB::table('template_profiles')
        ->where('template_name', '!=',null )->where('Client_FK_id','=',$client->id)->get();
       
  // die($array);

        return view('/ViewClient_Server_lpars',compact('templates','server','array','client'));

    }

}
