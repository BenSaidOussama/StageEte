<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LPAR;
use App\Client;
use App\Server;
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
        $array = DB::table('l_p_a_r_s')
                    ->where('Server_FK_id', '=',$id_s )
                    ->get();
        return view('/ViewClient_Server_lpars',compact('server','array','client'));
        
    }
    public function edit($id_c,$id_s,$id){
        $lpar=LPAR::find($id);
        $client=Client::find($id_c);
        $server=Server::find($id_s);
        return view('New_Template',compact('server','client','lpar'));
    }
}
