@extends('layout.head')
@extends('layout.template')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
<body>
<div class="container-fluid">
<div class="container">
  <h2>Fading Modal</h2>
  <p>Add the "fade" class to the modal container if you want the modal to fade in on open and fade out on close.</p>

  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
</div>
  
</div>
<script src="asset{{'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'}}"></script>
  <script src="asset{{'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'}}"></script>
  <script src="asset{{'https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'}}"></script>
    </body>
</html>


@endsection