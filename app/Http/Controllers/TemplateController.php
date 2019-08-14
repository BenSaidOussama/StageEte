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
        
        $array = DB::table('physical__i_o_s')
        ->where('template_FK_id', '=',null )->where('LPAR_FK_id','=',null)->get();
        $client=Client::find($id);

        $array1 = DB::table('v__f_c_s')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',null)->get(); 

        $array2 = DB::table('v_ethernets')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',null)->get();
        

        $array3 = DB::table('v__s_c_s_i_s')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',null)->get();
      
        return view("New_Template",compact('client','array','array1','array2','array3'));
    }
    public function createphysicalIO(Request $request,$id){
        $client=Client::find($id);
        $array=[];
        $array1 = DB::table('v__f_c_s')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',null)->get(); 

        $array2 = DB::table('v_ethernets')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',null)->get();
        

        $array3 = DB::table('v__s_c_s_i_s')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',null)->get();
        //die($array);
        $phy=new Physical_IO();
        $phy->index_slot=$request->input('index_slot');
        $phy->type=$request->input('type_physical_IO');
        $phy->isrequired=TRUE;
        $phy->isdesired=FALSE;
        
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
      ->where('template_FK_id', '=',null )->where('LPAR_FK_id','=',null)->get();  
   
      return(view('/New_Template',compact('array','array1','array2','array3','client')));
    }
    public function createSCSI(Request $request,$id){
        $client=Client::find($id);
        $array3=[];
        $array1 = DB::table('v__f_c_s')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',null)->get(); 
        
        $array2 = DB::table('v_ethernets')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',null)->get();  

        $array = DB::table('physical__i_o_s')
      ->where('template_FK_id', '=',null )->where('LPAR_FK_id','=',null)->get();

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

        $scsi->isrequired=TRUE;
        if(!isset($_post['req_SCSI'])){
            $radioVal = $_POST["req_SCSI"];
            if($radioVal=='no'){
                $scsi->isrequired=FALSE;
                }
        }
        $scsi->save();
        $array3 = DB::table('v__s_c_s_i_s')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',null)->get();

        return(view('/New_Template',compact('array1','array2','array3','array','client')));

    }
    public function createEthernet(Request $request,$id){

        $client=Client::find($id);
        $array1 = DB::table('v__f_c_s')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',null)->get(); 
        
        $array3 = DB::table('v__s_c_s_i_s')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',null)->get();
       
        $array = DB::table('physical__i_o_s')
      ->where('template_FK_id', '=',null )->where('LPAR_FK_id','=',null)->get();

        $ethernet=new V_ethernet();
        $ethernet->PV_id=$request->input('pv_id');
        $ethernet->VLANs=$request->input('vlans');
        $ethernet->type="Ethernet";
        $ethernet->isrequired=TRUE;
        if(!isset($_REQUEST['ethernet_req'])){
            $radioVal = $_REQUEST["ethernet_req"];
            if($radioVal=='no'){
                $ethernet->isrequired=FALSE;
                }
        }
        $ethernet->save();
        $array2 = DB::table('v_ethernets')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',null)->get();  

        return(view('/New_Template',compact('array1','array2','array3','array','client')));

    }
    public function createFC(Request $request,$id){
        $client=Client::find($id);

        $array2 = DB::table('v_ethernets')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',null)->get();  

        $array3 = DB::table('v__s_c_s_i_s')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',null)->get();
    
        $array = DB::table('physical__i_o_s')
      ->where('template_FK_id', '=',null )->where('LPAR_FK_id','=',null)->get();

        $fc=new V_FC();
        $fc->server_partition=$request->input('server_partition');
        $fc->wwpn=$request->input('wwpn');
        $fc->wwpn_lpm=$request->input('lpm');
        $fc->type="FC";
        $fc->isrequired=TRUE;
        if(!isset($_post['fc_req'])){
            $radioVal = $_POST["fc_req"];
            if($radioVal=='no'){
                $fc->isrequired=FALSE;
                }
                else{
                    $fc->isrequired=TRUE;
                }
        }
        $fc->save();
        $array1 = DB::table('v__f_c_s')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',null)->get();

        return(view('/New_Template',compact('array1','array2','array3','array','client')));

    }
    public function createTemplate(Request $request,$id){
        $client=Client::find($id);
    $template=new Template_profile();
    die($request->input('partition_desired_hidden'));
   // die($request->input('template_name_hidden'));
    $template->template_name=$request->input('template_name_hidden');
    $template->profil_name=$request->input('profile_name_hidden');
    $template->partition_id=$request->input('partition_id_hidden');
    $template->partition_name=$request->input('partition_name_hidden');
    $template->partition_min_proc=$request->input('partition_min_proc_hidden');
    $template->partition_max_proc=$request->input('partition_max_proc_hidden');
    if(!isset($_POST['clickkk'])){
        if( $request->input('clickkk')=='Shared'){
            $template->$shared=TRUE;
            $template->min_proc=0;
            $template->max_proc=0;
            $template->desired_proc=0;
        
            $template->disired_proc_units=$request->input('desired_proc_units');
            $template->min_proc_units=$request->input('min_proc_units');
            $template->max_proc_units=$request->input('max_proc_units');

            $template->disired_v_proc=$request->input('desired_v_proc');
            $template->max_v_proc=$request->input('max_v_proc');
            $template->min_v_proc=$request->input('min_v_proc');
           
            $shared=$request->input('shared_proc_pool');
            if($shared=="Default pool"){
                $template->proc_pool=$shared;
            }
            else{
                $template->proc_pool=$request->input('input_pool_name');
            }
        }
        else{
            $template->shared=FALSE;
            $template->min_proc=$request->input('min_proc');
            $template->max_proc=$request->input('max_proc');
            $template->desired_proc=$request->input('desired_proc');

            $template->disired_proc_units=0 ;
            $template->disired_v_proc=0 ;
            $template->max_proc_units=0 ;
            $template->max_v_adapters=0;
            $template->max_v_proc=0;
            $template->min_v_proc=0;
            $template->min_proc_units=0 ;
            $template->proc_pool=null;
        }
        $template->disired_memory=$request->input('desired_memo');
        $template->max_memory=$request->input('max_memo') ;
        $template->min_memory =$request->input('min_memo');

        if(!isset($_POST['boot_mode'])){
            if($request->input('boot_mode')=="normal"){
                $template->isNormal_BootMode=TRUE;
                $template->isSMS_BootMode=FALSE;
            }
            else{
                $template->isNormal_BootMode=FALSE;
                $template->isSMS_BootMode=TRUE;
            }
            
        }
        if(!isset($_POST['check'])){
            if($request->input('check')=="redund"){
                $template->isAuto_StartWithMangedSys=FALSE;
                $template->isEnable_Connection_Monitoring=FALSE;
                $template->isEnable_redundant_Error_Path_report=TRUE;
        
            }
            elseif($request->input('check')=="auto"){
                $template->isAuto_StartWithMangedSys=TRUE;
                $template->isEnable_Connection_Monitoring=FALSE;
                $template->isEnable_redundant_Error_Path_report=FALSE;
        
            }
            else{
                $template->isAuto_StartWithMangedSys=FALSE;
                $template->isEnable_Connection_Monitoring=TRUE;
                $template->isEnable_redundant_Error_Path_report=FALSE;
        
            }
            
        }
        $template->save();
    }
    
}
}