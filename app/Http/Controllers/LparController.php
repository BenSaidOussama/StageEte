<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateLPARRequest;
use App\Http\Requests\CreatePhysicalIORequest;
use App\Http\Requests\CreateEthernetRequest;
use App\Http\Requests\CreateFCRequest;
use App\Http\Requests\CreateSCSIRequest;

use App\LPAR;
use App\Client;
use App\Server;
use App\VSwitch;

use App\Physical_IO;
use App\V_SCSI;
use App\V_ethernet;
use App\V_FC;


use DB;
use App\Quotation;
class LparController extends Controller
{
    public function delete($id_c,$id_s,$id) {
        //die($id);
        
        $lpar=LPAR::find($id);
        
        $client=Client::find($id_c);
        $server=Server::find($id_s);
        $lpar->delete();
        $server->Server_LPARs_nbr=$server->Server_LPARs_nbr-1;
        $server->save();
        $array = DB::table('l_p_a_r_s')
                    ->where('Server_FK_id', '=',$id_s )
                    ->get();
        return view('/ViewClient_Server_lpars',compact('server','array','client'));
        
    }
      
    public function go_edit($id_c,$id_s,$id){
        
        
        $lpar=LPAR::find($id);
        $client=Client::find($id_c);
        $server=Server::find($id_s);

        //die($lpar->Template_FK_id);
        if($lpar->Template_FK_id==null){
        $array = DB::table('physical__i_o_s')
        ->where('template_FK_id', '=',null )->where('LPAR_FK_id','=',$id)->get();
       
        $array1 = DB::table('v__f_c_s')
        ->where('Template_FK_id', '=',null)->where('LPAR_FK_id','=',$id)->get(); 
        
        $array2 = DB::table('v_ethernets')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',$id)->get();
        
        $vswitchs = DB::table('V_switches')
        ->where('Lpar_FK_id', '=',$id )->get();
    
        $array3 = DB::table('v__s_c_s_i_s')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',$id)->get();
        }
        else{
            $array = DB::table('physical__i_o_s')
            ->where('template_FK_id', '=',$lpar->Template_FK_id )->where('LPAR_FK_id','=',null)->get();
           
            $array1 = DB::table('v__f_c_s')
            ->where('Template_FK_id', '=',$lpar->Template_FK_id )->where('LPAR_FK_id','=',null)->get(); 
            
            $array2 = DB::table('v_ethernets')
            ->where('Template_FK_id', '=',$lpar->Template_FK_id  )->where('LPAR_FK_id','=',null)->get();
            
            $vswitchs = DB::table('V_switches')
            ->where('Template_FK_id', '=',$lpar->Template_FK_id  )->get();
        
            $array3 = DB::table('v__s_c_s_i_s')
            ->where('Template_FK_id', '=',$lpar->Template_FK_id  )->where('LPAR_FK_id','=',null)->get();
            
        }
        return view('Edit_Lpar',compact('server','vswitchs','client','lpar','array','array1','array2','array3'));
    }
    public function edit($id_c,$id_s,$id){
        
        
        $lpar=LPAR::find($id);
        $client=Client::find($id_c);
        $server=Server::find($id_s);

        //die($lpar->Template_FK_id);
        if($lpar->Template_FK_id==null){
        $array = DB::table('physical__i_o_s')
        ->where('template_FK_id', '=',null )->where('LPAR_FK_id','=',$id)->get();
       
        $array1 = DB::table('v__f_c_s')
        ->where('Template_FK_id', '=',null)->where('LPAR_FK_id','=',$id)->get(); 
        
        $array2 = DB::table('v_ethernets')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',$id)->get();
        
        $vswitchs = DB::table('V_switches')
        ->where('Lpar_FK_id', '=',$id )->get();
    
        $array3 = DB::table('v__s_c_s_i_s')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',$id)->get();
        }
        else{
            $array = DB::table('physical__i_o_s')
            ->where('template_FK_id', '=',$lpar->Template_FK_id )->where('LPAR_FK_id','=',null)->get();
           
            $array1 = DB::table('v__f_c_s')
            ->where('Template_FK_id', '=',$lpar->Template_FK_id )->where('LPAR_FK_id','=',null)->get(); 
            
            $array2 = DB::table('v_ethernets')
            ->where('Template_FK_id', '=',$lpar->Template_FK_id  )->where('LPAR_FK_id','=',null)->get();
            
            $vswitchs = DB::table('V_switches')
            ->where('Template_FK_id', '=',$lpar->Template_FK_id  )->get();
        
            $array3 = DB::table('v__s_c_s_i_s')
            ->where('Template_FK_id', '=',$lpar->Template_FK_id  )->where('LPAR_FK_id','=',null)->get();
            
        }
        return view('View_LPAR',compact('server','vswitchs','client','lpar','array','array1','array2','array3'));
    }
    public function Gotoadd($id_s){
        $lpar=new LPAR();
        $lpar->Server_FK_id=$id_s;
        $lpar->max_v_adapters=0;
        $server=Server::find($id_s);
        $client=Client::find($server->Client_FK_id);
        $server->Server_LPARs_nbr=$server->Server_LPARs_nbr+1;
        $lpar->save();

        $vswitch1=new VSwitch();
        $vswitch2=new VSwitch();
        $vswitch1->name="Ethernet0(Default)";
        $vswitch1->LPAR_FK_id=$lpar->id;
        $vswitch2->name="Ethernet1(Default)";
        $vswitch2->LPAR_FK_id=$lpar->id;
        $vswitch1->save();
        $vswitch2->save();
        
        $vswitchs = DB::table('V_switches')
        ->where('Lpar_FK_id', '=',$lpar->id )->get();
       

        $array = DB::table('physical__i_o_s')
        ->where('template_FK_id', '=',null )->where('LPAR_FK_id','=',$lpar->id)->get();
       
        $array1 = DB::table('v__f_c_s')
        ->where('Template_FK_id', '=',null)->where('LPAR_FK_id','=',$lpar->id)->get(); 
        
        $array2 = DB::table('v_ethernets')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',$lpar->id)->get();
        
    
        $array3 = DB::table('v__s_c_s_i_s')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',$lpar->id)->get();
     
        return(view('New_LPAR',compact("vswitchs",'lpar','array','array1','array2','array3','client')));

    }
    public function CreateLPAR(CreateLPARRequest $request, $id){

        $lpar=LPAR::find($id);
        $server=Server::find($lpar->Server_FK_id);
        $client=Client::find($server->Client_FK_id);
        $lpar->LPAR_name =$request->input('template_name_hidden');
        $lpar->profil_name  =$request->input('profile_name_hidden');
        
        $lpar->min_memory =$request->input('value_hidden');
        $lpar->disired_memory  =$request->input('value1_hidden');
        $lpar->max_memory =$request->input('value2_hidden');

       if($request->input('radio_hidden')=='Shared'){
           $lpar->shared=TRUE;
            if($request->input('proc_pool_hidden')=="Other pool"){
                $lpar->proc_pool =$request->input('input_pool_hidden');
            }
            else{
                $lpar->proc_pool =$request->input('proc_pool_hidden');
            }
           $lpar->max_proc_units =$request->input('max_proc_units_hidden');
           $lpar->min_proc_units =$request->input('min_proc_units_hidden');
           $lpar->disired_proc_units =$request->input('desired_proc_units_hidden');
           $lpar->disired_v_proc  =$request->input('desired_v_proc_hidden');
           $lpar->min_v_proc  =$request->input('min_v_proc_hidden');
           $lpar->max_v_proc  =$request->input('max_v_proc_hidden');

           
       } 
       else{
        $lpar->shared=FALSE;
        $lpar->desired_proc  =$request->input('desired_proc_hidden');
        $lpar->min_proc  =$request->input('min_proc_hidden');
        $lpar->max_proc  =$request->input('max_proc_hidden');
        
        } 
        $lpar->max_v_adapters=$request->input('max_v_adapters_hidden3');
        if($request->input('boot_mode_hidden')=='sms'){
            $lpar->isSMS_BootMode=1;
            $lpar->isNormal_BootMode=0;
        }
        else{
            $lpar->isSMS_BootMode=0;
            $lpar->isNormal_BootMode=1;
        }
        if($request->input('sync_conf_hidden')=='on'){
            $lpar->sync_conf=1;
        }
        else{
            $lpar->sync_conf=0;
        }
        if($request->input('check_hidden')=='auto'){
            $lpar->isAuto_StartWithMangedSys=1;
            $lpar->isEnable_redundant_Error_Path_report=0;
            $lpar->isEnable_Connection_Monitoring=0;


        }
        elseif($request->input('check_hidden')=='redund'){
            $lpar->isEnable_redundant_Error_Path_report=1;
            $lpar->isAuto_StartWithMangedSys=0;
            $lpar->isEnable_Connection_Monitoring=0;
        }
        else{
            $lpar->isEnable_Connection_Monitoring=1;
            $lpar->isEnable_redundant_Error_Path_report=0;
            $lpar->isAuto_StartWithMangedSys=0;
        }
        $lpar->save();



        $array = DB::table('l_p_a_r_s')
        ->where('Server_FK_id', '=',$lpar->Server_FK_id )
        ->get();
        return view('/ViewClient_Server_lpars',compact('server','array','client'));
    }
    
    public function createphysicalIO(CreatePhysicalIORequest $request,$id,$id_t){
        $lpar=LPAR::find($id_t);
        $client=Client::find($id);
        $array=[];
        $array1=[];
        $array2=[];
        $array3=[];
        $array1 = DB::table('v__f_c_s')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',$id_t)->get(); 

        $array2 = DB::table('v_ethernets')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',$id_t)->get();
        
        $array3 = DB::table('v__s_c_s_i_s')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',$id_t)->get();

        $phy=new Physical_IO();
        $phy->index_slot=$request->input('index_slot');
        $phy->type=$request->input('type_physical_IO');
        $phy->isrequired=TRUE;
        $phy->isdesired=FALSE;
        $phy->LPAR_FK_id=$id_t;
        
        if(!isset($_post['req_des'])){
            $radioVal = $request->input["req_des"];
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
        ->where('template_FK_id', '=',null )->where('LPAR_FK_id','=',$id_t)->get();  
       
        $vswitchs = DB::table('V_switches')
        ->where('Lpar_FK_id', '=',$lpar->id )->get();
       
        return(view('/Edit_LPAR',compact('array','vswitchs','array1','array2','array3','client','lpar')));
        }

    public function createSCSI(CreateSCSIRequest $request,$id,$id_t){
        $array=[];
        $array1=[];
        $array2=[];
        $array3=[];
        $lpar=LPAR::find($id_t);
        $client=Client::find($id);
        
        $array1 = DB::table('v__f_c_s')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',$id_t)->get(); 
        
        $array2 = DB::table('v_ethernets')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',$id_t)->get();  

        $array = DB::table('physical__i_o_s')
      ->where('template_FK_id', '=',null )->where('LPAR_FK_id','=',$id_t)->get();

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
        $scsi->LPAR_FK_id=$id_t;
        $scsi->isrequired=TRUE;
        if(!isset($_post['req_SCSI'])){
            $radioVal = $request->input("req_SCSI");
            if($radioVal=='no'){
                $scsi->isrequired=FALSE;
                }
        }
        $scsi->Adpater_id=$request->input('adapter_id');

        $scsi->save();
        if($lpar->max_v_adapters<$request->input('max_v_adapters_hidden')){
            $lpar->max_v_adapters=$request->input('max_v_adapters_hidden');
            $lpar->save();
        }
        $array3 = DB::table('v__s_c_s_i_s')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',$id_t)->get();
        $vswitchs = DB::table('V_switches')
        ->where('Lpar_FK_id', '=',$lpar->id )->get();
       
       return(view('/Edit_LPAR',compact('array1',"vswitchs",'array2','array3','array','client','lpar')));

    }

    public function createEthernet(CreateEthernetRequest $request,$id,$id_t){
        $array=[];
        $array1=[];
        $array2=[];
        $array3=[];
        $lpar=LPAR::find($id_t);
        if($lpar->max_v_adapters<$request->input('max_v_adapters_hidden1')){
            $lpar->max_v_adapters=$request->input('max_v_adapters_hidden1');
            $lpar->save();
        }
        $client=Client::find($id);
           
        $array1 = DB::table('v__f_c_s')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',$id_t)->get(); 
        
        $array3 = DB::table('v__s_c_s_i_s')
        ->where('Template_FK_id', '=',null)->where('LPAR_FK_id','=',$id_t)->get();
       
        $array = DB::table('physical__i_o_s')
      ->where('template_FK_id', '=',null )->where('LPAR_FK_id','=',$id_t)->get();

        $ethernet=new V_ethernet();
        $ethernet->PV_id=$request->input('pv_id');
        $ethernet->VLANs=$request->input('vlans');
        $ethernet->type="Ethernet";
        $ethernet->isrequired=TRUE;
        $ethernet->LPAR_FK_id=$id_t;
        $ethernet->vswitch=$request->input('vswitch');
        $ethernet->Adpater_id=$request->input('adapter_id');
        
        if(!isset($_post['ethernet_req'])){
            $radioVal = $request->input("ethernet_req");
            if($radioVal=='no'){
                $ethernet->isrequired=FALSE;
                }
        }
        $ethernet->save();
        $array2 = DB::table('v_ethernets')
        ->where('Template_FK_id', '=',null)->where('LPAR_FK_id','=',$id_t)->get();  
        $vswitchs = DB::table('V_switches')
        ->where('Lpar_FK_id', '=',$lpar->id )->get();
       
       return(view('/Edit_LPAR',compact('array1',"vswitchs",'array2','array3','array','client','lpar')));

    }
    
    public function createFC(CreateFCRequest $request,$id,$id_t){
        $array=[];
        $array1=[];
        $array2=[];
        $array3=[];
        $client=Client::find($id);
        $lpar=LPAR::find($id_t);
        if($lpar->max_v_adapters<$request->input('max_v_adapters_hidden2')){
            $lpar->max_v_adapters=$request->input('max_v_adapters_hidden2');
            $lpar->save();
        }
        $array2 = DB::table('v_ethernets')
        ->where('Template_FK_id', '=', null)->where('LPAR_FK_id','=',$id_t)->get();  

        $array3 = DB::table('v__s_c_s_i_s')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',$id_t)->get();
    
        $array = DB::table('physical__i_o_s')
      ->where('template_FK_id', '=',null)->where('LPAR_FK_id','=',$id_t)->get();

        $fc=new V_FC();
        $fc->server_partition=$request->input('server_partition');
        $fc->wwpn=$request->input('wwpn');
        $fc->wwpn_lpm=$request->input('lpm');
        $fc->type="FC";
        $fc->isrequired=TRUE;
        $fc->LPAR_FK_id=$id_t;
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
        $fc->Adpater_id=$request->input('adapter_id');

        $fc->save();
        $vswitchs = DB::table('V_switches')
        ->where('Lpar_FK_id', '=',$lpar->id )->get();
       
        $array1 = DB::table('v__f_c_s')
        ->where('Template_FK_id', '=',null )->where('LPAR_FK_id','=',$id_t)->get();
        return(view('/Edit_LPAR',compact('vswitchs','array1','array2','array3','array','client','lpar')));

    }





    
}
