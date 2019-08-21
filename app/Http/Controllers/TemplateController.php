<?php

namespace App\Http\Controllers;
use App\Client;
use App\Physical_IO;
use App\V_SCSI;
use App\V_ethernet;
use App\V_FC;
use App\Template_profile;


use Illuminate\Http\Request;
use DB;
use App\Quotation;

class TemplateController extends Controller
{
    public function ReadTemplates(Request $request){
        $array=[];
        $templates = Template_profile::all();
        foreach(  $templates as $i){
            array_push($array,$i);

        }
        //die('ok+ '.$templates);
       return view('/Edit_Server',compact('array'));

    }





    public function Gotoadd($id){
        
        $array=[];
        $array1=[];
        $array2=[];
        $array3=[];
       
        $template=new Template_profile();

            $template->max_v_adapters=NULL;
            $template->proc_pool=NULL;
            $template->profil_name=NULL;
            $template->template_name=NULL;
            $template->min_proc=NULL;
            $template->max_proc=NULL;
            $template->desired_proc=NULL;
            $template->min_proc=Null;
            $template->max_proc=Null;
            $template->desired_proc=Null;
            $template->disired_proc_units=Null;
            $template->min_proc_units=Null;
            $template->max_proc_units=Null;
            $template->disired_v_proc=Null;
            $template->max_v_proc=Null;
            $template->min_v_proc=Null;
            $template->Client_FK_id=$id;

            $template->save();
            $client=Client::find($id);

           //$array = DB::table('phyical__i_o_s')
            //->where('template_FK_id', '=',$template->id )->where('LPAR_FK_id','=',null)->get();
    
          /*  $array1 = DB::table('v__f_c_s')
            ->where('Template_FK_id', '=',$template->id )->where('LPAR_FK_id','=',null)->get(); 
    
            $array2 = DB::table('v_ethernets')
            ->where('Template_FK_id', '=',$template->id )->where('LPAR_FK_id','=',null)->get();
            
            $array3 = DB::table('v__s_c_s_i_s')
            ->where('Template_FK_id', '=',$template->id )->where('LPAR_FK_id','=',null)->get();
          */
        return view("New_Template",compact('client','array','array1','array2','array3','template'));
    }






    public function createphysicalIO(Request $request,$id,$id_t){
        $template=Template_profile::find($id_t);
        $client=Client::find($id);
        $array=[];
        $array1=[];
        $array2=[];
        $array3=[];
        $array1 = DB::table('v__f_c_s')
        ->where('Template_FK_id', '=',$id_t )->where('LPAR_FK_id','=',null)->get(); 

        $array2 = DB::table('v_ethernets')
        ->where('Template_FK_id', '=',$id_t )->where('LPAR_FK_id','=',null)->get();
        
        $array3 = DB::table('v__s_c_s_i_s')
        ->where('Template_FK_id', '=',$id_t )->where('LPAR_FK_id','=',null)->get();

        $phy=new Physical_IO();
        $phy->index_slot=$request->input('index_slot');
        $phy->type=$request->input('type_physical_IO');
        $phy->isrequired=TRUE;
        $phy->isdesired=FALSE;
        $phy->Template_FK_id=$id_t;
        
        if(!isset($_post['req_des'])){
            $radioVal = $_POST["req_des"];
            //die($radioVal);
            if($radioVal=='required'){
                $phy->isrequired=TRUE;
                $phy->isdesired=FALSE;}
            else{
                $phy->isrequired=FALSE;
                $phy->isdesired=TRUE; 
                }
        }
      $phy->save();
      $array = DB::table('physical__i_o_s')
      ->where('template_FK_id', '=',$id_t )->where('LPAR_FK_id','=',null)->get();  
   
      return(view('/New_Template',compact('array','array1','array2','array3','client','template')));
    }







    public function createSCSI(Request $request,$id,$id_t){
        $array=[];
        $array1=[];
        $array2=[];
        $array3=[];
        $template=Template_profile::find($id_t);
        $client=Client::find($id);
        if(!isset($_post["max_v_adapters"])){
            $template->max_v_adapters=$request->input('max_v_adapters_hidden');
            $template->save();
        }
        $array1 = DB::table('v__f_c_s')
        ->where('Template_FK_id', '=',$id_t )->where('LPAR_FK_id','=',null)->get(); 
        
        $array2 = DB::table('v_ethernets')
        ->where('Template_FK_id', '=',$id_t )->where('LPAR_FK_id','=',null)->get();  

        $array = DB::table('physical__i_o_s')
      ->where('template_FK_id', '=',$id_t )->where('LPAR_FK_id','=',null)->get();

        $scsi=new V_SCSI();
        $adapter=$request->input('adapter_select');
        $partition=$request->input('partition_select');
        $type=$request->input('SCSI_Type');
        $scsi->type="SCSI";

        if($adapter=="Client"){
            $scsi->isClientAdapter=TRUE;
            $scsi->isServerAdapter=FALSE;
        }
        else{
            $scsi->isClientAdapter=FALSE;
            $scsi->isServerAdapter=TRUE;
        }
        if($partition=="Client"){
            $scsi->isClientPartition=TRUE;
            $scsi->isServerPartition=FALSE;
        }
        else{
            $scsi->isClientPartition=FALSE;
            $scsi->isServerPartition=TRUE;
        }
        $scsi->type_SCSI=$type;
        $scsi->Template_FK_id=$id_t;
        $scsi->isrequired=TRUE;
        if(!isset($_post['req_SCSI'])){
            $radioVal = $request->input("req_SCSI");
            if($radioVal=='no'){
                $scsi->isrequired=FALSE;
                }
        }
        $scsi->save();
        $array3 = DB::table('v__s_c_s_i_s')
        ->where('Template_FK_id', '=',$id_t )->where('LPAR_FK_id','=',null)->get();

       // die($array1);
       return(view('/New_Template',compact('array1','array2','array3','array','client','template')));

    }





    public function createEthernet(Request $request,$id,$id_t){
        $array=[];
        $array1=[];
        $array2=[];
        $array3=[];
        $template=Template_profile::find($id_t);
        if(!isset($_post["max_v_adapters"])){

            $template->max_v_adapters=$request->input('max_v_adapters_hidden1');

           $template->save();

        }
        $client=Client::find($id);
           
        $array1 = DB::table('v__f_c_s')
        ->where('Template_FK_id', '=',$id_t )->where('LPAR_FK_id','=',null)->get(); 
        
        $array3 = DB::table('v__s_c_s_i_s')
        ->where('Template_FK_id', '=',$id_t )->where('LPAR_FK_id','=',null)->get();
       
        $array = DB::table('physical__i_o_s')
      ->where('template_FK_id', '=',$id_t )->where('LPAR_FK_id','=',null)->get();

        $ethernet=new V_ethernet();
        $ethernet->PV_id=$request->input('pv_id');
        $ethernet->VLANs=$request->input('vlans');
        $ethernet->type="Ethernet";
        $ethernet->isrequired=TRUE;
        $ethernet->Template_FK_id=$id_t;
        
        if(!isset($_post['ethernet_req'])){
            $radioVal = $request->input("ethernet_req");
            if($radioVal=='no'){
                $ethernet->isrequired=FALSE;
                }
        }
        $ethernet->save();
        $array2 = DB::table('v_ethernets')
        ->where('Template_FK_id', '=',$id_t )->where('LPAR_FK_id','=',null)->get();  
      // die($array1);
       //die($array2);
       return(view('/New_Template',compact('array1','array2','array3','array','client','template')));

    }





    public function createFC(Request $request,$id,$id_t){
        $array=[];
        $array1=[];
        $array2=[];
        $array3=[];
        $client=Client::find($id);
        $template=Template_profile::find($id_t);
        if(!isset($_post["max_v_adapters"])){

            $template->max_v_adapters=$request->input('max_v_adapters_hidden2');

           $template->save();

        }
        $array2 = DB::table('v_ethernets')
        ->where('Template_FK_id', '=',$id_t )->where('LPAR_FK_id','=',null)->get();  

        $array3 = DB::table('v__s_c_s_i_s')
        ->where('Template_FK_id', '=',$id_t )->where('LPAR_FK_id','=',null)->get();
    
        $array = DB::table('physical__i_o_s')
      ->where('template_FK_id', '=',$id_t )->where('LPAR_FK_id','=',null)->get();

        $fc=new V_FC();
        $fc->server_partition=$request->input('server_partition');
        $fc->wwpn=$request->input('wwpn');
        $fc->wwpn_lpm=$request->input('lpm');
        $fc->type="FC";
        $fc->isrequired=TRUE;
        $fc->Template_FK_id=$id_t;
        if(!isset($_post['fc_req'])){
            $radioVal = $_POST["fc_req"];
            if($radioVal=='no'){
                $fc->isrequired=FALSE;
                }
                else{
                    $fc->isrequired=TRUE;
                }
        }if(!isset($_post['fc_req'])){
            $radioVal = $request->input("fc_req");
            if($radioVal=='no'){
                $fc->isrequired=FALSE;
                }
        }
        $fc->save();
        $array1 = DB::table('v__f_c_s')
        ->where('Template_FK_id', '=',$id_t )->where('LPAR_FK_id','=',null)->get();
        return(view('/New_Template',compact('array1','array2','array3','array','client','template')));

    }





    public function createTemplate(Request $request,$id,$id_t){
        $client=Client::find($id);
        $template=Template_profile::find($id_t);
        //die($template);

    $template->template_name=$request->input('template_name_hidden');
    $template->profil_name=$request->input('profile_name_hidden');
    if($request->input('sync_conf_hidden')=="off"){
        $template->sync_conf=FALSE;
    }
    else{
        $template->sync_conf=TRUE;
    }
        if( $request->input('radio_hidden')=='Shared'){
            $template->shared=TRUE;

            $template->min_proc=NULL;
            $template->max_proc=NULL;
            $template->desired_proc=NULL;

            $template->disired_proc_units=$request->input('desired_proc_units_hidden');
            $template->min_proc_units=$request->input('min_proc_units_hidden');
            $template->max_proc_units=$request->input('max_proc_units_hidden');
         
            $template->disired_v_proc=$request->input('desired_v_proc_hidden');
            $template->max_v_proc=$request->input('max_v_proc_hidden');
            $template->min_v_proc=$request->input('min_v_proc_hidden');

            $shared=$request->input('proc_pool_hidden');
            if($shared=="Default pool"){
                $template->proc_pool=$shared;
            }
            else{
                $template->proc_pool=$request->input('input_pool_hidden');
            }
        }
        else{
            $template->shared=FALSE;
            

            $template->min_proc=$request->input('min_proc_hidden');
            $template->max_proc=$request->input('max_proc_hidden');
            $template->desired_proc=$request->input('desired_proc_hidden');
           

            $template->disired_proc_units= NULL;
            $template->disired_v_proc= NULL;
            $template->max_proc_units=NULL ;
            $template->max_v_proc=NULL;
            $template->min_v_proc=NULL;
            $template->min_proc_units=NULL ;
            $template->proc_pool=NULL;
        }
        //die($request->input('max_v_adapters_hidden3'));
        
        $template->disired_memory=$request->input('value1_hidden');
        $template->max_memory=$request->input('value2_hidden') ;
        $template->min_memory =$request->input('value_hidden');

        //$template->max_v_adapters=$request->input('max_v_adapters_hidden3');

        $template->isNormal_BootMode=TRUE;
        $template->isSMS_BootMode=FALSE;

            if($request->input('boot_mode_hidden')=="sms"){
                $template->isNormal_BootMode=FALSE;
                $template->isSMS_BootMode=TRUE;
            }
            else{
                $template->isNormal_BootMode=TRUE;
                $template->isSMS_BootMode=FALSE;
            }

            $template->isAuto_StartWithMangedSys=TRUE;
            $template->isEnable_Connection_Monitoring=FALSE;
            $template->isEnable_redundant_Error_Path_report=FALSE;

            if($request->input('check_hidden')=="redund"){
                $template->isAuto_StartWithMangedSys=FALSE;
                $template->isEnable_Connection_Monitoring=FALSE;
                $template->isEnable_redundant_Error_Path_report=TRUE;
        
            }
            elseif($request->input('check_hidden')=="cnx_monit"){
                $template->isAuto_StartWithMangedSys=FALSE;
                $template->isEnable_Connection_Monitoring=TRUE;
                $template->isEnable_redundant_Error_Path_report=FALSE;
        
            }
            else{
                $template->isAuto_StartWithMangedSys=TRUE;
                $template->isEnable_Connection_Monitoring=FALSE;
                $template->isEnable_redundant_Error_Path_report=FALSE;
               
        
            }     
          
          //die($request->input('max_v_adapters_hidden3'));
        
        $template->save();
        $array = DB::table('physical__i_o_s')
        ->where('template_FK_id', '=',$template->id )->where('LPAR_FK_id','=',null)->get();
        $array1 = DB::table('v__f_c_s')
        ->where('Template_FK_id', '=',$template->id )->where('LPAR_FK_id','=',null)->get(); 
        
        $array2 = DB::table('v_ethernets')
        ->where('Template_FK_id', '=',$template->id )->where('LPAR_FK_id','=',null)->get();
        
    
        $array3 = DB::table('v__s_c_s_i_s')
        ->where('Template_FK_id', '=',$template->id )->where('LPAR_FK_id','=',null)->get();
     
        return(view('View_template',compact('template','array','array1','array2','array3')));
}
public function DeleteTemplate($id){

    $template=Template_profile::find($id);
    $id_client=$template->Client_FK_id;
    $template->delete();
    $client=Client::find($id_client);
    $array = DB::table('servers')
    ->where('Client_FK_id', '=',$client->id )->get();
    $templates = DB::table('template_profiles')
    ->where('Client_FK_id', '=',$client->id )->get();
 
    return view('view_client',compact('client','array','templates'));

}
public function GoToEdit($id){
    $template=Template_profile::find($id);
    $id_c=$template->Client_FK_id;
    $client=Client::find($id_c);
    $array = DB::table('physical__i_o_s')
        ->where('template_FK_id', '=',$template->id )->where('LPAR_FK_id','=',null)->get();
        $array1 = DB::table('v__f_c_s')
        ->where('Template_FK_id', '=',$template->id )->where('LPAR_FK_id','=',null)->get(); 
        
        $array2 = DB::table('v_ethernets')
        ->where('Template_FK_id', '=',$template->id )->where('LPAR_FK_id','=',null)->get();
        
    
        $array3 = DB::table('v__s_c_s_i_s')
        ->where('Template_FK_id', '=',$template->id )->where('LPAR_FK_id','=',null)->get();
     
    return(view('Edit_Template',compact('template','array','array1','array2','array3','client')));
}
public function EditTemplate($id,Request $request){
    $template=Template_profile::find($id);
    $id_client=$template->Client_FK_id;
    $client=Client::find($id_client);
/*
    $template->template_name=$request->input('template_name_hidden');
    $template->profil_name=$request->input('profile_name_hidden');
    if($request->input('sync_conf_hidden')=="off"){
        $template->sync_conf=FALSE;
    }
    else{
        $template->sync_conf=TRUE;
    }
        if( $request->input('radio_hidden')=='Shared'){
            $template->shared=TRUE;

            $template->min_proc=NULL;
            $template->max_proc=NULL;
            $template->desired_proc=NULL;

            $template->disired_proc_units=$request->input('desired_proc_units_hidden');
            $template->min_proc_units=$request->input('min_proc_units_hidden');
            $template->max_proc_units=$request->input('max_proc_units_hidden');
         
            $template->disired_v_proc=$request->input('desired_v_proc_hidden');
            $template->max_v_proc=$request->input('max_v_proc_hidden');
            $template->min_v_proc=$request->input('min_v_proc_hidden');

            $shared=$request->input('proc_pool_hidden');
            if($shared=="Default pool"){
                $template->proc_pool=$shared;
            }
            else{
                $template->proc_pool=$request->input('input_pool_hidden');
            }
        }
        else{
            $template->shared=FALSE;
            

            $template->min_proc=$request->input('min_proc_hidden');
            $template->max_proc=$request->input('max_proc_hidden');
            $template->desired_proc=$request->input('desired_proc_hidden');
           

            $template->disired_proc_units= NULL;
            $template->disired_v_proc= NULL;
            $template->max_proc_units=NULL ;
            $template->max_v_proc=NULL;
            $template->min_v_proc=NULL;
            $template->min_proc_units=NULL ;
            $template->proc_pool=NULL;
        }
        //die($request->input('max_v_adapters_hidden3'));
        
        $template->disired_memory=$request->input('value1_hidden');
        $template->max_memory=$request->input('value2_hidden') ;
        $template->min_memory =$request->input('value_hidden');

        //$template->max_v_adapters=$request->input('max_v_adapters_hidden3');

        $template->isNormal_BootMode=TRUE;
        $template->isSMS_BootMode=FALSE;

            if($request->input('boot_mode_hidden')=="sms"){
                $template->isNormal_BootMode=FALSE;
                $template->isSMS_BootMode=TRUE;
            }
            else{
                $template->isNormal_BootMode=TRUE;
                $template->isSMS_BootMode=FALSE;
            }

            $template->isAuto_StartWithMangedSys=TRUE;
            $template->isEnable_Connection_Monitoring=FALSE;
            $template->isEnable_redundant_Error_Path_report=FALSE;

            if($request->input('check_hidden')=="redund"){
                $template->isAuto_StartWithMangedSys=FALSE;
                $template->isEnable_Connection_Monitoring=FALSE;
                $template->isEnable_redundant_Error_Path_report=TRUE;
        
            }
            elseif($request->input('check_hidden')=="cnx_monit"){
                $template->isAuto_StartWithMangedSys=FALSE;
                $template->isEnable_Connection_Monitoring=TRUE;
                $template->isEnable_redundant_Error_Path_report=FALSE;
        
            }
            else{
                $template->isAuto_StartWithMangedSys=TRUE;
                $template->isEnable_Connection_Monitoring=FALSE;
                $template->isEnable_redundant_Error_Path_report=FALSE;
               
        
            }     
          
          //die($request->input('max_v_adapters_hidden3'));
        
        $template->save();
*/

    $array = DB::table('physical__i_o_s')
        ->where('template_FK_id', '=',$template->id )->where('LPAR_FK_id','=',null)->get();
        $array1 = DB::table('v__f_c_s')
        ->where('Template_FK_id', '=',$template->id )->where('LPAR_FK_id','=',null)->get(); 
        
        $array2 = DB::table('v_ethernets')
        ->where('Template_FK_id', '=',$template->id )->where('LPAR_FK_id','=',null)->get();
        
    
        $array3 = DB::table('v__s_c_s_i_s')
        ->where('Template_FK_id', '=',$template->id )->where('LPAR_FK_id','=',null)->get();
     
    return view("Edit_Template",compact('client','array','array1','array2','array3','template'));
}

}