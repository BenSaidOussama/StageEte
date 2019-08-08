<?php 
use App\Template_profile;
?>
@extends('layout.head')
@extends('layout.template')
@section('content')
<?php 
use Illuminate\Http\Request;
use App\Client;
use App\Server;?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Server Details
{!!Form::open(['action' => ['ServerController@EditServer',$server->id], 'method' => 'Post', 'class' => 'pull-right'])!!}
         <button type="submit" class="btn btn-secondary" ><i class="fas fa-edit"></i> Edit Server</button>

        {!! Form::close() !!}</h1>

<div class="row">
<div class="col-lg-12">
    <div class="card shadow mb-4">
      <div class="card-header py-3">

      <?php 
      
      $server=Server::find($id_s);
      $client=Client::find($server->Client_FK_id);
      
      ?>
        <h6 class="m-0 font-weight-bold text-primary">Server : {{$server->Server_name}} </h6>
      </div>
      <div class="card-body">

      <div class="col-lg-5">
</div>
      <div class="col-lg-4">
          <table style="align:center">
          <tr>
          <td>
              <label >Client     : </label>
              </td>
              <td><label >{{$client->Client_name}} </label>
              </td>
              </tr>
          <tr>
          <td >
          <label>Description    :</label>
              </td>
              <td>
              <label>{{$server->Server_description}}
              </td>
              </tr>
              <tr>
          <td>
          <label>Type :</label>
              </td>
              <td>
              <label>{{$server->Server_type}}
              </td>
              </tr>
          
          </table>
        </div>
        <div class="col-lg-3">
        </div>

      </div></div></div>



  <div class="col-lg-12">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">LPARS List </h6>
      </div>
      <div class="card-body">
          
<div class="table-responsive">
  <table class="table">
    <tr>
        <td>
            LPAR's name
        </td>
        <td>
            profile's name
        </td>
        <td>
            Template's name
        </td>
        <td>
             Memory
        </td>
        <td>
            processor units
        </td>
        <td>
            Virtual processor
        </td>
        <td>
            Boot Mode
        </td>
        <td>
            Action
        </td>
    </tr>
    @foreach($array as $lpar)
    <tr>
        <td>
        <?php
        
            if($lpar->LPAR_name!=null){
                echo "$lpar->LPAR_name";
            }
            else{
                echo "---";
            }
            ?>
            
        </td>
        <td>
        <?php
            if($lpar->profil_name!=null){
                echo "$lpar->profil_name";
            }
            else{
                echo "---";
            }
            ?>
        </td>
        <td>
            <?php
            if($lpar->template_FK_id!=null){
                $id_t=$lpar->template_FK_id;
                $template=Template_profile::find($id_t);
                echo "$template->template_name";
            }
            else{
                echo "---";
            }
            ?>
        </td>
        <td>
            <?php 
            $min=$lpar->min_memory;
            $max=$lpar->max_memory;
            $disired=$lpar->disired_memory;
            if($min==null){
                $min="--";
            }
            if($max==null){
                $max="--";
            }
            if($disired==null){
                $disired="--";
            }
            echo "[".$min.";".$disired.";".$max."]";
            
            ?>      
        </td>
        <td>
        <?php 
            $min=$lpar->min_proc_units;
            $max=$lpar->max_proc_units;
            $disired=$lpar->disired_proc_units;
            if($min==null){
                $min="--";
            }
            if($max==null){
                $max="--";
            }
            if($disired==null){
                $disired="--";
            }
            echo "[".$min.";".$disired.";".$max."]";
            
            ?>  
        </td>
        <td>
        <?php 
            $min=$lpar->min_v_proc;
            $max=$lpar->max_v_proc;
            $disired=$lpar->disired_v_proc;
            if($min==null){
                $min="--";
            }
            if($max==null){
                $max="--";
            }
            if($disired==null){
                $disired="--";
            }
            echo "[".$min.";".$disired.";".$max."]";
            
            ?>  
        </td>
        <td>
        <?php
            if($lpar->isNormal_BootMode==1){
              
                echo "Normal";
            }
            else{
                echo "SMS";
            }
            ?>
        </td>
        <td>
        
        
    
        {!!Form::open(['action' => ['LparController@delete',$client->id,$server->id,$lpar->id], 'method' => 'PUT', 'class' => 'pull-right'])!!}
                   {{Form::submit('Delete', ['class' => "btn btn-outline-danger"])}}
        {!!Form::close()!!}
        
        {!!Form::open(['action' => ['LparController@edit',$client->id,$server->id,$lpar->id], 'method' => 'PUT', 'class' => 'pull-right'])!!}
        {{Form::submit('Edit', ['class' => "btn btn-outline-info"])}}
                
        {!!Form::close()!!}
        </td>
    </tr>
    @endforeach
    </table>
    {{$array->links()}}
</div>
</div>
      </div></div></div></div>
        
@endsection
                                                                             
                                         