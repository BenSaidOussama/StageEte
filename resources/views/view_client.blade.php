@extends('layout.head')
@extends('layout.template')
@section('content')
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
<body>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
    <table>
        <tr>
          <td> 
            <h1 class="h3 mb-4 text-gray-800">
              Client Details</td>
          <td style="width:700px">
              {!!Form::open(['action' => ['TemplateController@Gotoadd',$client->id], 'method' => 'PUT', 'class' => 'pull-right'])!!}    
                  <button type="submit" class="btn btn-secondary" style="margin-left:50x"><i class="fas fa-plus"></i> New template</button>
                
        {!! Form::close() !!}
</td><td style="width:120px">
        {!!Form::open(['action' => ['ServerController@NewServer',$client->id], 'method' => 'POST', 'class' => 'pull-right'])!!}       
                <button type="submit"  class="btn btn-secondary"><i class="fas fa-plus"></i> New Server</button>
        {!! Form::close() !!}
</td>
</h1> 
</tr>
</table>

<div class="row">

  <div class="col-lg-6">

    <!-- Circle Buttons -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Client's description</h6>
      </div>
      <div class="card-body">
     
          <table>
          <tr>
          <td >
          <label>Name    :</label>
              </td>
              <td>
              {{$client->Client_name}}
              </td>
              </tr>
          <tr>
          <td >
          <label>Mail    :</label>
              </td>
              <td>
              {{$client->Client_mail}}
              </td>
              </tr>
              <tr>
          <td>
          <label>Address    :</label>
              </td>
              <td>
             {{$client->Client_adresse}}
              </td>
              </tr>
          <tr>
          <td>
              <label >Description     : </label>
              </td>
              <td>{{$client->Client_description}}
              </td>
              </tr>
          </table>

       
</div>
    </div>

    <!-- Brand Buttons -->
    

  </div>

  <div class="col-lg-6">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Servers List</h6>
      </div>
      <div class="card-body">
      
                      <table class="table table-sm" name="server">
                      <thead>
                          <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Type</th>
                      <th scope="col">Lpars Number</th>
                      <th scope="col">Actions</th>


                    </tr>
                  </thead>
                  <tbody>
                  @for($i=0;$i<$client->Client_servers_nbr;$i++)
                    <tr>
                      <th scope="row">{{$i}}</th>
                      <td style="text-align:center">{{$array[$i]->Server_name}}</td>
                      <td style="text-align:center">
                        <?php
                        if($array[$i]->Server_type==null){
                          echo"---";
                        }
                        else {
                          echo "{{$array[$i]->Server_type}}";
                        }
                        ?>
                        </td>
                      <td style="text-align:center">
                      <?php
                        if($array[$i]->Server_LPARs_nbr==null){
                          echo"0";
                        }
                        else {
                          echo "{{$array[$i]->Server_LPARs_nbr}}";
                        }
                        ?>
                        {{$array[$i]->Server_LPARs_nbr}}</td>
                      
              <td>
                      <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Actions
            </button>
            <div class="dropdown-menu"  aria-labelledby="btnGroupDrop1">
            <a class="dropdown-item"  style="color:#3377ff;width:50%" href="{{action('ServerController@EditServer', ['id' => $array[$i]->id])}}">
            <i class="far fa-edit"   
            ></i>   Edit </a>
            <a class="dropdown-item" style="color:#b30000;width:50px" href="{{action('ServerController@deleteServer', ['id' => $array[$i]->id])}}">
            <i class="fa fa-trash"   
            ></i> Delete </a>

              
     
    </div>
  </div>
                        </td>

                    </tr>
                    @endfor 
                  </tbody>
</table>

      </div>
    </div>

  </div>

</div>

</div>

</body>
</html>
<!-- /.container-fluid -->
@endsection