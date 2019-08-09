<?php

namespace App\Http\Controllers;
use App\Client;
use App\Physical_IO;
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
        $array = DB::table('physical__i_o_s')
        ->where('template_FK_id', '=',null )->where('LPAR_FK_id','=',null)->paginate(3);
        $client=Client::find($id);
        return view("New_Template",compact('client','array'));
    }
    public function createphysicalIO(Request $request){
        $array=[];
      
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
      ->where('template_FK_id', '=',null )->where('LPAR_FK_id','=',null)->paginate(3);  
   
      //die($array);
      return(view('/New_Template',compact('array')));
    }
}
