@extends('layout.head')
@extends('layout.template')
@section('content')
<!DOCTYPE html>
<html>


<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css')}}">

<style>
  
  .slider:hover {
	opacity: 1;
  }
  
  .slider::-webkit-slider-thumb {
	-webkit-appearance: none;
	appearance: none;
	width: 40px;
	height: 40px;
	background: white;
	cursor: pointer;
	border-radius: 50%;
  }
  
  .slider::-moz-range-thumb {
	width: 40px;
	height: 40px;
	background: white;
	cursor: pointer;
	border-radius: 50%;
  }

.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}


.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}

</style>
</head>
<body><!-- Begin Page Content -->
    <div class="container-fluid">

<!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Create New template</h1>

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Template details </h6>
                    </div>
                    <div class="card-body">
                        <button class="accordion"><i class="fas fa-angle-double-right"></i> Profile</button>
                            <div class="panel">
                                <table>
                                    <br>
                                    <tr>
                                    <td style="text-align:center;width:15%" >
                                            <label >Sync Configuration:</label>
  
                                        </td>
                                        <td style="text-align:center;width:15%">
                                            <select  class ="form-control" name="sync_conf" id="id_sync_conf">
                                            <option value="on"> ON</option>
                                            <option value="off"> OFF</option>
                                            </select>
                                        </td>
                                    <td style="text-align:center;width:15%">
                                            <label >Template name:</label>
  
                                        </td>
                                        <td style="text-align:center;width:15%">
                                            <input type="text" class ="form-control"  name="template_name" id="id_template_name">
                                        </td>
                                       
                                        <td style="text-align:center;width:15%">
                                            <label >  Profile Name:</label>
                                        </td>
                                        <td style="text-align:center;width:15%">
                                            <input type=text class ="form-control" name="profile_name" id="id_profile_name">
                                        </td>
                                    </tr>
                                </table>
                                    <br>
                            </div>

                        <button class="accordion"><i class="fas fa-angle-double-right"></i> Processor</button>
                            <div class="panel" >
                                <input type="radio" id="radio_shared" name="clickkk" checked onclick='displaying_shared()' value="Shared">
                                <B>Shared : </B>
                                Assign partial processor units from the shared processor pool.
                                <br>
                                <input type="radio" name="clickkk" id="radio_dedicated" class="radio_shared"   onclick='displaying_dedicated()' value="Dedicate"><B> Dedicate :  </B>
                                Assign entire processors that can only be used by the partitio
                            </div>
                        <button class='accordion'  ><i class='fas fa-angle-double-right'></i> Processor Settings</button>
                            <div class='panel' >    
                                <p id="proc_shared"  style='margin-left:50px;display: block;' ><B>Specify the desired,minimum,and maximum</B></p>
                                <p id="proc_settings_shared" style='margin-left:50px;display: block;'><B>processing settings in the filed bellow.</B></p>
                                <table id="table_shared" style='margin-left:50px;display: block;' >
                                    <tr>
                                        <td>
                                        Minimum processing units *
                                        </td>
                                        <td>
                                        <input type='number' placeholder="0.1" step="0.1" class ='form-control' name='min_proc_units' id="id_min_proc_units">
                                        </td>
                                        <td style='text-align:right'>
                                             Minimum virtual processors *
                                        </td>
                                        <td>
                                            <input type='number' step="0.1" placeholder="0.1" class ='form-control' name='min_v_proc' id="id_min_v_proc">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >
                                        <br>
                                            Desired processing units *
                                        </td>
                                        <td>
                                        <br>
                                            <input type='number' step="0.1" placeholder="0.1" name='desired_proc_units' class ='form-control' id="id_desired_proc_units">
                                        </td>
                                        <td style='text-align:right' >
                                        <br>
                                                 Desired virtual processors *
                                            </td>
                                            <td>
                                            <br>
                                                <input type='number' step="0.1" placeholder="0.1" name='desired_v_proc' class ='form-control'>
                                            </td>
                                        
                                     </tr>
                                        <tr>
                                            <td>
                                            <br>
                                                Maximum processing units *
                                            </td>
                                            <td>
                                            <br>
                                                <input type='number' step="0.1" placeholder="0.1" name='max_proc_units' class ='form-control' id="id_max_proc_units">
                                            </td>
                                            <td style="text-align:center">
                                            <br>
                                                  Maximum virtual processorss *
                                            </td>
                                            <td>
                                            <br>
                                                <input type='number' step="0.1" placeholder="0.1" name='max_v_proc' class ='form-control'>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td>
                                            <br>
                                                Shared processor pool *
                                            </td>
                                            <td>
                                            <br>
                                                <select id="select" name='shared_proc_pool' onclick='verifier()' class ='form-control' editable='true'>
                                                    <option value="Default pool">
                                                    
                                                        Default pool
                                                    </option>
                                                    <option value="Other pool">
                                                        Other pool
                                                    </option>
                                                </select>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                            <br>
                                            <input type="text" style="display:none" class ='form-control' id="input_pool" name="input_pool_name">
                                            </td>
                                           
                                        </tr>
                                    </table>
                                       <p id="p_dedicated" style="display: none"> <B>    Specify the desired, minimum, and maximum processing settings in the fields below.</B></p>
                                          <table id="table_dedicated" style='margin-left:50px;display: none;' >
                                                      <tr>
                                                          <td>
                                                          Minimum processors*
                                                          </td>
                                                          <td>
                                                          
                                                          <input type='number' placeholder="1" class ='form-control' name='min_proc'>
                                                          </td>
                                                      </tr>
                                                      <tr>
                                                          <td>
                                                          <br>
                                                          Desired processors*
                                                          </td>
                                                          <td>
                                                          <br>
                                                          <input type='number' placeholder="1" class ='form-control' name='desired_proc'>
                                                          </td>
                                                      </tr>
                                                      <tr>
                                                          <td>
                                                          <br>
                                                          Maximum processors:
                                                          </td>
                                                          <td>
                                                          <br>
                                                          <input type='number' placeholder="1"  class ='form-control' name='max_proc'>
                                                          </td>
                                                     </tr>
                                              </table>
                                            <br>
                                    </div>
                        <button class="accordion"><i class="fas fa-angle-double-right"></i> Memory Settings</button>
                            <div class="panel">
                                <table >
                                    <tr>
                                        <td >
                                            Minimum memory 
                                         </td>
                                        <td >
                                             <input  class ="form-control" type="range" min="0" max="100" step="0.1" value="42" class="slider" id="myRange">
                                        </td> 
                                        <td style="text-align:right">
                                        <input style="width:50%; " step="0.1" type="number" id="value" name="min_memo" >GB
                                        </td>

                                    </tr>
                                    <tr>
                                        <td >
                                            Desired memory 
                                         </td>
                                        <td >
                                             <input class ="form-control"  type="range" min="0" max="100" step="0.1" value="42" class="slider1" id="myRange1">
                                        </td> 
                                        <td style="text-align:right">
                                        <input style="width:50%; "type="number" name="desired_memo" step="0.1" id="value1"  >GB
                                        </td>
                                        

                                    </tr>
                                    <tr>
                                        <td >
                                            Maximum memory 

                                         </td>
                                        <td >
                                             <input class ="form-control"  type="range" name="max_memo" step="0.1" min="0" max="100" value="42" class="slider2" id="myRange2">
                                        </td> 
                                        <td style="text-align:right">
                                        <input style="width:50%; "type="number" step="0.1" id="value2" >GB
                                        </td>

                                    </tr>

                                </table>
                            </div>

                        <button class="accordion" ><i class="fas fa-angle-double-right"></i> physical I/O</button>
                            <div class="panel" id="panel1"  >
                                <br>
                                  <?php 
                                  $j=0;
                                  foreach($array as $i)
                                  {
                                    $j=$j+1;}

                                    ?>
                                <input id="secret_input" value="{{$j}}" hidden>
          <table class="table table-hover"  >
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Index Slot</th>
              <th scope="col">Type</th>
              <th scope="col">Required/Desired</th>
              <th scope="col">Actions</th>

            </tr>
              </thead>
              <tbody>
                <?php $i=0;?>
                @foreach($array as $phy)
                <?php $i=$i+1;?>
                <tr>
                  <th scope="row">{{$i}}</th>
                  <td>{{$phy->index_slot}}</td>
                  <td>{{$phy->type}}</td>
                  <td>
                  <?php 
                  if( $phy->isrequired==TRUE){
                  echo'Required';}
                  else{
                    echo'Desired';
                  }
                  ?>  
                  

                 </td>
                  
                    <td>
                    <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Actions
            </button>
            <div class="dropdown-menu"  aria-labelledby="btnGroupDrop1">
            <a class="dropdown-item"  style="color:#3377ff;width:50%" href="{{action('ServerController@EditServer', ['id' => $phy->id])}}">
            <i class="far fa-edit"   
            ></i>   Edit </a>
            <a class="dropdown-item" style="color:#b30000;width:50px" href="{{action('ServerController@deleteServer', ['id' => $phy->id])}}">
            <i class="fa fa-trash"   
            ></i> Delete </a>
                        </div>
    </div>
                    </td>
                </tr>
                  @endforeach
            
                    </tbody>
                </table> 
                <br>  <br>  <br>  <br>  <br>
                    <p>
                    <button style="margin-left:350px" data-toggle="modal" data-target="#myModal1" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                                      Add physical I/O
                                    </button>
                    </p>

            <!-- The Modal -->
            <div class="modal fade" id="myModal1">
              <div class="modal-dialog">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">New physical IO</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->

                  <div class="modal-body">
                  {!!Form::open(['action' => ['TemplateController@createphysicalIO',$client->id], 'method' => 'POST'])!!}       
              
                    <table>
                          <tr>
                          <td>
                          
                                <label>Index Slot</label>
                          </td>
                          <td>
                          
                            <input type="text" class="form-control" name="index_slot">
                          </td>
                        </tr>
                        <tr>
                          <td>
                          <br>
                                <label>Type</label>
                          </td>
                          <td>
                          <br>
                          <select class="form-control" name="type_physical_IO">
                              <option value="type1">
                                type1
                              </option>
                              <option  value="type2">
                              type2
                              </option>
                              </select>
                          </td>
                        </tr>
                        <tr>
                          <td>
                          <br>
                                <label>Is Required</label>
                          </td>
                          <td>
                          <br>
                          <input checked  type="radio" value="required" name="req_des">
                          </td>
                        </tr>
                        <tr>
                          <td>
                                <label>Is Desired</label>
                          </td>
                          <td>
                          <input  type="radio" value="desired" name="req_des">
                          </td>
                        </tr>
          </table>
                  </div>
                  
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
                  

                    <button type="submit" class="btn btn-success"  >Save</button>
                
                    {!!Form::close()!!}
  </div>
                  
                </div>
              </div>
            </div>
</div>

<button class="accordion"> <i class="fas fa-angle-double-right"></i>   Virtual Adapters</button>
  
<div class="panel" id="panel2" >
      
      
<br>
            <table >
           <tr>
           <td style="width:5%">
           </td>
           <td style="width:20%">
           
           <label>   Maximum virtual adapters:</label>
           </td>
           <td style="width:20%">
            <input type="number" name="server"  class="form-control form-control-sm" > 
           </td>
           <td style="width:30%">
           </td>
           <td style="width:10%">
           <label>Filter By :</label>
           </td>
           <td style="width:30%" >
            <select onclick="selection_type_Adapters()" name="type_select_adapters" id="id_type_select_adapters"  class="form-control form-control-sm" > 
                  <option value="All">
                  All
                  </option>
                  <option value="Ethernet">
                  Virtual Ethernet Adapter
                  </option>
                  <option value="SCSI">
                 Virtual SCSI Adapter
                  </option>
                  <option value="FC">
                  Virtual FC Adapter
                  </option>
            </select>
           </td>
           </tr>
           </table>
           <br>
           <div id="table_all">
     <table class="table table-hover" >
          <thead>
            <tr>
              <th  scope="col" style="text-align:center">#</th>
              <th scope="col" style="text-align:center">Type</th>
              <th scope="col" style="text-align:center">Identifiant</th>
              <th scope="col" style="text-align:center">Required</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $i=0;?>
            @foreach($array1 as $fc)
           <?php $i=$i+1;?>
            <tr>
              <th style="text-align:center" scope='row'>{{$i}}</th>
              <td style="text-align:center">Virtual {{$fc->type}}  Adapter</td>
              <td style="text-align:center">{{$fc->id}}</td>
              <td style="text-align:center">
              <?php
              if($fc->isrequired=="TRUE")
              echo"<i class='fa fa-check-circle' style='font-size:16px;color:green'></i>";
              else{
              echo"<i class='fa fa-exclamation-triangle' style='color:red' aria-hidden='true'></i>
              ";}
              ?>
              </td>
            </tr>

            @endforeach
            <?php
            $j=$i;?>
            @foreach($array2 as $ethernet)
           <?php $j=$j+1;?>
            <tr>
              <th style="text-align:center" scope='row'>{{$j}}</th>
              <td style="text-align:center">Virtual {{$ethernet->type}} Adapter</td>
              <td style="text-align:center">{{$ethernet->id}}</td>
              <td style="text-align:center"><?php
              if($ethernet->isrequired=="TRUE")
              echo"<i class='fa fa-check-circle' style='font-size:16px;color:green'></i>";
              else{
              echo"<i class='fa fa-exclamation-triangle' style='color:red' aria-hidden='true'></i>
              ";}
              ?></td>
            </tr>
            @endforeach
            <?php
            $k=$j;?>
            @foreach($array3 as $scsi)
           <?php $k=$k+1;?>
            <tr>
              <th style="text-align:center" scope='row'>{{$k}}</th>
              <td style="text-align:center">Virtual {{$scsi->type}} Adapter</td>
              <td style="text-align:center">{{$scsi->id}}</td>
              <td style="text-align:center"><?php
              if($scsi->isrequired=="TRUE")
              echo"<i class='fa fa-check-circle' style='font-size:16px;color:green'></i>";
              else{
              echo"<i class='fa fa-exclamation-triangle' style='color:red' aria-hidden='true'></i>
              ";}
              ?></td>
            </tr>
            @endforeach
            <input id="secret_input_all" name="secret_input_all1" value="{{$k}}" hidden>
          </tbody>
        </table>
        </div>
        <div id="table_fc" style="display:none" >
    <table class="table table-hover" >
          <thead>
            <tr>
              <th style="text-align:center" scope="col">#</th>
              <th style="text-align:center" scope="col">Type</th>
              <th style="text-align:center" scope="col">Identifiant</th>
              <th style="text-align:center" scope="col">Required</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $i=0;?>
            @foreach($array1 as $fc)
           <?php $i=$i+1;?>
            <tr>
              <th style="text-align:center" scope='row'>{{$i}}</th>
              <td style="text-align:center">Virtual {{$fc->type}} Adapter</td>
              <td style="text-align:center">{{$fc->id}}</td>
              <td style="text-align:center"><?php
              if($fc->isrequired=="TRUE")
              echo"<i class='fa fa-check-circle' style='font-size:16px;color:green'></i>";
              else{
              echo"<i class='fa fa-exclamation-triangle' style='color:red' aria-hidden='true'></i>
              ";}
              ?></td>
            </tr>
            @endforeach
            <input id="secret_input_all" name="secret_input_all1" value="{{$i}}" hidden>
          </tbody>
        </table>
        </div>
        <div id="table_ethernet" style="display:none">
     <table class="table table-hover"  >
          <thead>
            <tr>
              <th style="text-align:center" scope="col">#</th>
              <th style="text-align:center" scope="col">Type</th>
              <th style="text-align:center" scope="col">Identifiant</th>
              <th style="text-align:center" scope="col">Required</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $j=0;?>
            @foreach($array2 as $ethernet)
           <?php $j=$j+1;?>
            <tr>
              <th style="text-align:center" scope='row'>{{$j}}</th>
              <td style="text-align:center">Virtual {{$ethernet->type}} Adapter</td>
              <td style="text-align:center">{{$ethernet->id}}</td>
              <td style="text-align:center"><?php
              if($ethernet->isrequired=="TRUE")
              echo"<i class='fa fa-check-circle' style='font-size:16px;color:green'></i>";
              else{
              echo"<i class='fa fa-exclamation-triangle' style='color:red' aria-hidden='true'></i>
              ";}
              ?></td>
            </tr>
            @endforeach
            <input id="secret_input_all" name="secret_input_all1" value="{{$j}}" hidden >

          </tbody>
        </table>
        </div>
    <div id="table_scsi" style="display:none">
     <table class="table table-hover"  >
          <thead>
            <tr>
              <th style="text-align:center" scope="col">#</th>
              <th style="text-align:center" scope="col">Type</th>
              <th style="text-align:center" scope="col">Identifiant</th>
              <th style="text-align:center"  scope="col">Required</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $k=0;?>
            @foreach($array3 as $scsi)
           <?php $k=$k+1;?>
            <tr>
              <th style="text-align:center" scope='row'>{{$k}}</th>
              <td style="text-align:center">Virtual {{$scsi->type}} Adapter</td>
              <td style="text-align:center">{{$scsi->id}}</td>
              <td style="text-align:center"><?php
              if($scsi->isrequired=="TRUE")
              echo"<i class='fa fa-check-circle' style='font-size:16px;color:green'></i>";
              else{
              echo"<i class='fa fa-exclamation-triangle' style='color:red' aria-hidden='true'></i>
              ";}
              ?></td>
            </tr>
            @endforeach
            <input id="secret_input_all" name="secret_input_all1" value="{{$k}}" hidden>
          </tbody>
        </table>
        </div>
           <br>
    
   
           <table>
           <tr> 
            <td>
                <button style="margin-left:200px" data-toggle="modal" data-target="#myModal4" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                  Virtual SCSI Adapter
                </button>

                {!!Form::open(['action' => ['TemplateController@createSCSI',$client->id], 'method' => 'POST'])!!}       

            <!-- The Modal -->
            <div class="modal fade" id="myModal4">
              <div class="modal-dialog">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">New Virtual SCSI Adapter</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                    <table >
                    <tr>
                    <td style="width:40%;text-align:center">
                          <br>
                                <label>Adapter Id</label>
                          </td>
                            <td>
                          <input type="text" class ="form-control" name="SCSI_Type" >
                    </td>
                    </tr>
                          <tr>
                         
                          <td style="width:40%;text-align:center">
                          <br>
                                <label>Adapter</label>
                          </td>
                          <td>
                          <br>
                            <select class="form-control" id='adapter_select' name="adapter_select">
                              <option value="Client">
                                Client
                              </option>
                              <option  value="Server">
                                Server
                              </option>
                              </select>
                          </td>
                        </tr>
                        <tr>
                          <td style="width:40%;text-align:center">
                          <br>
                                <label >Partition</label>
                          </td>
                          <td>
                          <br>
                          <select class="form-control" name="partition_select">
                              <option value="Client">
                                Client
                              </option>
                              <option  value="Server">
                                Server
                              </option>
                              </select>
                          </td>
                        </tr>
                        <tr>
                        <td style="width:40%;text-align:center">
                        <br>
                                <label >Type SCSI </label>
                        </td>
                        <td>
                        <br>
                        <input type="text" class ="form-control" name="SCSI_Type" >
                        </td>

                        </tr>
                        <td style="width:40%;text-align:center">
                        <br>
                                <label >Required </label>
                        </td>
                        <td>
                        <br>
                        <input type="radio" checked value="yes" name="req_SCSI">
                        Yes
                        <input type="radio" value="no" name="req_SCSI">
                        No
                        </td>
                        <tr>
                        </tr>
          </table>
                  </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">  
                  <button type="submit" class="btn btn-success"  >Save</button>
                    <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            {!!Form::close()!!}
            </td>
            <td>
               <button style="margin-left:50px" class="btn btn-primary" data-toggle="modal" data-target="#myModal2" ><i class="fa fa-plus" aria-hidden="true"></i>   Virtual Ethernet Adapter</button>
               {!!Form::open(['action' => ['TemplateController@createEthernet',$client->id], 'method' => 'POST'])!!}       

                <!-- The Modal -->
            <div class="modal fade" id="myModal2">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">New virtual Ethernet Adapter</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                    <table>
                    <tr>
                    <td >
                          <br>
                                <label>Adapter Id</label>
                          </td>
                            <td>
                          <input type="text" class ="form-control" name="SCSI_Type" >
                    </td>
                    </tr> 
                          <tr>
                          <td><br>
                          PV_id 
                          </td>
                          <td>
                          <br>
                          <input type="number" class ="form-control" name="pv_id" >
                          </td>
                        </tr>
                        <tr>
                          <td>
                          <br>
                          VLANS 
                          </td>
                          <td>
                          <br>
                          <input type="text" class ="form-control" name="vlans" >
                          </td>
                          </tr>
                          <tr>
                          <td>
                          <br>
                          Required : 
                          </td>
                          <td>
                          <br>
                          <input type="radio" checked value ="no" name="ethernet_req" >
                          Yes
                          <input type="radio"   value ="yes" name="ethernet_req" >
                          No
                          </td>
                        </tr>
          </table>
                  </div>
                  
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success"  >Save</button>
                    <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
                  </div>
                  
                </div>
              </div>
            </div>
            {!!Form::close()!!}
              </td>
            <td>
            <button style="margin-left:50px" class="btn btn-primary"  data-toggle="modal" data-target="#myModal3"><i class="fa fa-plus" aria-hidden="true"></i>   Virtual FC Adapter</button>
            {!!Form::open(['action' => ['TemplateController@createFC',$client->id], 'method' => 'POST'])!!}       

           <!-- The Modal -->
           <div class="modal fade" id="myModal3">
              <div class="modal-dialog">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">New Virtual FC Adapter
                  </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  
                  <!-- Modal body -->
                  <div class="modal-body">
                    <table>
                    <tr>
                    <td >
                          <br>
                                <label>Adapter Id</label>
                          </td>
                            <td>
                          <input type="text" class ="form-control" name="SCSI_Type" >
                    </td>
                    </tr> 
                          <tr>
                            <td>
                            <br>
                            Server Partition
                            </td>
                            <td>  
                            <br>
                            <input type="text" class ="form-control" name="server_partition" >
                            </td>
                          </tr>
                          <tr>
                            <td>
                            <br>
                            World Wide Port Name
                            </td>
                            <td>
                            <br>
                            <input type="text" class ="form-control" name="wwpn" >
                            </td>
                          </tr>
                          <tr>
                            <td>
                            <br>
                            World Wide Port Name LPM
                            </td>
                            <td>
                            <br>
                            <input type="text" class ="form-control" name="lpm" >
                            </td>
                          </tr>
                          <tr>
                          <td>
                          <br>
                          Required : 
                          </td>
                          <td>
                          <br>
                          <input type="radio" checked value ="yes" name="fc_req" >
                          Yes
                          <input type="radio"   value ="no" name="fc_req" >
                          No
                          </td>
                        </tr>
          </table>
                  </div>
                  
                  <!-- Modal footer -->
                  <div class="modal-footer">
                  <button type="submit" class="btn btn-success"  >Save</button>
                    <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
                  </div>
                  
                </div>
              </div>
            </div>
{!!Form::close()!!}
          </td>

          </tr>
          </table>
<br>
    </div>


   <button class="accordion"><i class="fas fa-angle-double-right"></i> Optional Settings</button>
        <div class="panel">
        <table> 
            <tr>
                <td style="width:500px">
              <input  style="color:red" name="check" type="checkbox" value="cnx_monit" > Enable connection monitoring 
                </td>
                <td>
                
                <label>Boot modes</label>
                </td>
                
                </tr>

        
        <tr>
                <td>
                <input type=checkbox name="check" value="auto"> Automatically start with managed system 
                </td>
                <td>
                <input  type="checkbox" name="boot_mode" value='normal' checked>Normal
                </td>
        </tr>
        <tr>
                <td>
             <input type='checkbox' name="check" value="redund" > Enable redundant error path reporting  
                </td>
                <td>
                <input type="checkbox" name="boot_mode" value="sms">System Managment Services(SMS)
                </td>
              
        </tr>
        </table>
        <table>
        <tr>
        <td>
        <br>
        
        {!!Form::open(['action' => ['TemplateController@createTemplate',$client->id], 'method' => 'POST'])!!}       
            <button type="submit" class="btn btn-success"style="margin-left:400px">Success</button>

<input type="text" value="" name="template_name_hidden" id="id_template_name_hidden" hidden>        
<input type="text" value="" name="profile_name_hidden" id="id_profile_name_hidden" hidden>        
<input type="text" value="" name="radio_hidden" id="id_radio_hidden" hidden>        
<input type="text" value="" name="max_proc_units_hidden" id="id_max_proc_units_hidden" hidden>        
<input type="text" value="" name="min_proc_units_hidden" id="id_min_proc_units_hidden" hidden>        
<input type="text" value="" name="desired_proc_units_hidden" id="id_desired_proc_units_hidden" hidden>        
<input type="text" value="" name="sync_conf_hidden" id="id_sync_conf_hidden" hidden>        

        {!!Form::close()!!}
          </td>
        </tr>

</table>
        </div>
<script>
//add_hidden
//sync_conf
var input_sync_conf = document.getElementById("id_sync_conf");
var input_sync_conf_hidden = document.getElementById("id_sync_conf_hidden");

input_sync_conf_hidden.value = input_sync_conf.value;
input_sync_conf.oninput = function() {
  input_sync_conf_hidden.value = this.value;
}



//template_name
var input_template_name = document.getElementById("id_template_name");
var input_template_name_hidden = document.getElementById("id_template_name_hidden");

input_template_name_hidden.value = input_template_name.value;

input_template_name.oninput = function() {
  input_template_name_hidden.value = this.value;
}
//profile_name
var input_profile_name = document.getElementById("id_profile_name");
var input_profile_name_hidden = document.getElementById("id_profile_name_hidden");

input_profile_name_hidden.value = input_profile_name.value;

input_profile_name.oninput = function() {
  input_profile_name_hidden.value = this.value;
}


//proc_units
// max_proc_units
var input_max_proc_units = document.getElementById("id_max_proc_units");
var input_max_proc_units_hidden = document.getElementById("id_max_proc_units_hidden");

input_max_proc_units_hidden.value = input_max_proc_units.value;

input_max_proc_units.oninput = function() {
  input_max_proc_units_hidden.value = this.value;
}
// min_proc_units
var input_min_proc_units = document.getElementById("id_min_proc_units");
var input_min_proc_units_hidden = document.getElementById("id_min_proc_units_hidden");

input_min_proc_units_hidden.value = input_min_proc_units.value;

input_min_proc_units.oninput = function() {
  input_min_proc_units_hidden.value = this.value;
}
// desired_proc_units
var input_desired_proc_units = document.getElementById("id_desired_proc_units");
var input_desired_proc_units_hidden = document.getElementById("id_desired_proc_units_hidden");

input_desired_proc_units_hidden.value = input_desired_proc_units.value;

input_desired_proc_units.oninput = function() {
  input_desired_proc_units_hidden.value = this.value;
}







//panel:Pysical IO
  var variable_input = document.getElementById("secret_input");
  var mypanel = document.getElementById("panel1");

  if(variable_input.value>0){
    mypanel.style.display="block";
  }
  else{
    mypanel.style.display="none";

  }

//panel:Virtual adapters
  
  var variable_input_adap = document.getElementById("secret_input_all");
  var mypanel_adap = document.getElementById("panel2");

  if(variable_input_adap.value>0){
    mypanel_adap.style.display="block";
  }
  else{
    mypanel_adap.style.display="none";

  }

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}


///Script Minimum
var slider = document.getElementById("myRange");
var output = document.getElementById("value");

output.value = slider.value;

slider.oninput = function() {
  output.value = this.value;
}
output.oninput = function() {
  slider.value = this.value;
}

var start_value = slider.getAttribute("value");

var x = start_value;
var color = 'linear-gradient(90deg, rgb(117, 252, 117)' + x + '% , rgb(214, 214, 214)' + x + '%)';
slider.style.background = color;

slider.addEventListener("mousemove", function() {
    x = slider.value;
    color = 'linear-gradient(90deg, rgb(117, 252, 117)' + x + '% , rgb(214, 214, 214)' + x + '%)';
    slider.style.background = color;
});


///Script Desired
var slider1 = document.getElementById("myRange1");
var output1 = document.getElementById("value1");

output1.value = slider1.value;

slider1.oninput = function() {
  output1.value = this.value;
}
output1.oninput = function() {
  slider1.value = this.value;
}
var start_value1 = slider1.getAttribute("value");

var x1 = start_value;
var color1 = 'linear-gradient(90deg, rgb(117, 252, 117)' + x1 + '% , rgb(214, 214, 214)' + x1 + '%)';
slider1.style.background = color1;

slider1.addEventListener("mousemove", function() {
    x1 = slider.value;
    color1 = 'linear-gradient(90deg, rgb(117, 252, 117)' + x1 + '% , rgb(214, 214, 214)' + x1 + '%)';
    slider1.style.background = color1;
});
///Script Maximum
var slider2 = document.getElementById("myRange2");
var output2 = document.getElementById("value2");

output2.value = slider2.value;

slider2.oninput = function() {
  output2.value = this.value;
}
output2.oninput = function() {
  slider2.value = this.value;
}

var start_value2 = slider2.getAttribute("value");

var x2 = start_value;
var color2 = 'linear-gradient(90deg, rgb(117, 252, 117)' + x2 + '% , rgb(214, 214, 214)' + x2 + '%)';
slider2.style.background = color1;

slider2.addEventListener("mousemove", function() {
    x2 = slider.value;
    color2= 'linear-gradient(90deg, rgb(117, 252, 117)' + x2 + '% , rgb(214, 214, 214)' + x2 + '%)';
    slider2.style.background = color2;
});
var input_radio_hidden = document.getElementById("id_radio_hidden");
var input_radio = document.getElementById("radio_shared");
var input_radio1 = document.getElementById("radio_dedicated");

input_radio_hidden.value=input_radio.value;


      function displaying_shared(){
        document.getElementById("proc_shared").style.display = 'block';
        document.getElementById("proc_settings_shared").style.display = 'block';
        document.getElementById("table_shared").style.display = 'block';
        document.getElementById("table_dedicated").style.display = 'none';
        document.getElementById("p_dedicated").style.display = 'none';
        input_radio_hidden.value=input_radio.value;





      }
      function displaying_dedicated(){
        document.getElementById("proc_shared").style.display = 'none';
        document.getElementById("proc_settings_shared").style.display = 'none';
        document.getElementById("table_shared").style.display = 'none';
        document.getElementById("table_dedicated").style.display = 'block';
        document.getElementById("p_dedicated").style.display = 'block';
        input_radio_hidden.value=input_radio1.value;

      }
     
      function verifier(){
        var select_var = document.getElementById("select");
        var input_var = document.getElementById("input_pool");

        if(select_var.value!="Default pool"){ 
          document.getElementById("input_pool").style.display="block";
          input_var.placeholder="enter a pool ...";
          input_var.value ="";

        }

      }
    function selection_type_Adapters(){
      $select=document.getElementById('id_type_select_adapters');
      if($select.value=="All"){
        document.getElementById("table_all").style.display="block";
        document.getElementById("table_ethernet").style.display="none";
        document.getElementById("table_fc").style.display="none";
        document.getElementById("table_scsi").style.display="none";

      }
      if($select.value=="Ethernet")
      {
      document.getElementById("table_all").style.display="none";
        document.getElementById("table_ethernet").style.display="block";
        document.getElementById("table_fc").style.display="none";
        document.getElementById("table_scsi").style.display="none";
      
      }
      if($select.value=="SCSI")
      {
        document.getElementById("table_all").style.display="none";
        document.getElementById("table_ethernet").style.display="none";
        document.getElementById("table_fc").style.display="none";
        document.getElementById("table_scsi").style.display="block";

      }
      if($select.value=="FC")
      {
        document.getElementById("table_all").style.display="none";
        document.getElementById("table_ethernet").style.display="none";
        document.getElementById("table_fc").style.display="block";
        document.getElementById("table_scsi").style.display="none";


      }
    }


    
</script>


<script src="{{asset('js/jquery-2.1.4.min.map" rel="stylesheet')}}"></script>
<script src="{{asset('js/jquery-2.1.4.min.js" rel="stylesheet')}}"></script>
<script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js')}}"></script>
<script src="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js')}}"></script>


</div>

</div>
</div>

</div>
    </div>
    
</body>
</html>
@endsection
