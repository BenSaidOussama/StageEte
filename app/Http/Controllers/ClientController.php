<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Server;
use Alert;

class ClientController extends Controller
{
    public function createClient(Request $request)
    {
        $client = new Client();
        $client->Client_adresse = $request->input('Client_adresse');
        $client->Client_description = $request->input('Client_description');
        $client->Client_mail = $request->input('Client_mail');
        $client->Client_name = $request->input('Client_name');
        $client->Client_servers_nbr=$request->input('Client_servers_nbr');
        $client->save();
        $array=[];
        for ($i =0; $i <$client->Client_servers_nbr; $i++)
            {
                $server=new Server();
                $server->Client_FK_id=$client->id;
                $server->Server_name=$client->Client_name.'_Server'.$i;
                $server->save();
                array_push($array,$server);
            }             
        return view('/view_client',compact('client','array'));
    }
    public function ReadClients(Request $request){
        $array=[];
        $clients = Client::all();

        foreach($clients as $i){
            array_push($array,$i);

        }
        return $array;
    }
    
}
