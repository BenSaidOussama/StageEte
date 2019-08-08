@extends('layout.head')
@extends('layout.template')
@section('content')
<div class="container-fluid">
<div class="card shadow mb-4" style="width:90%; margin-left:50px">  
<h1>LPAR Details</h1>
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
<body>
    <button class="accordion"><i class="fas fa-angle-double-right"></i> Profile</button>
        <div class="panel">
        <table>
            <br>
            
            <tr>
                <td>
                <label style="margin-left:50px">Partition ID:</label>
  
                </td>
                <td>
                <input type="text" class ="form-control" name="partition_id">
                </td>
                    
                <td>
                   <label style="margin-left:30px"> Partition Name:</label>
                </td>
                <td>
                <input type="text" class ="form-control" name="partion_name" >
                </td>
                <td>
                <label style="margin-left:30px">  Profile Name:</label>
                </td>
                <td>
                <input type=text class ="form-control">
                </td>
        </tr>
    </table>
    <br>
    </div>

    {!! Form::open(array('method' => 'POST'))!!}

<button class="accordion"><i class="fas fa-angle-double-right"></i> Processor</button>
    <div class="panel" >
   
                    <input type="radio"  name="gender" value="Shared">
                    <B>Shared : </B>

                   Assign partial processor units from the shared processor pool.
<br>
                <input  type="radio" name="gender" value="Dedicate"></td><td><B> Dedicate :  </B>
               
               Assign entire processors that can only be used by the partition
          
    </div>
  

<button class='accordion' name="showing" type="submit"><i class='fas fa-angle-double-right'></i> Processor Settings</button>

<div class='panel' >
    <p style='margin-left:50px' ><B>Specify the desired,minimum,and maximum</B></p>
        <p style='margin-left:50px'><B>processing settings in the filed bellow.</B></p>

            <table style='margin-left:50px'>
            <tr>
                <td>
                Minimum processing units *
                </td>
                <td>
                <input type='text' class ='form-control' name='min_proc_units'>
                </td>
            </tr>
            <tr>
                <td>
                    Desired processing units *
                </td>
                <td>
                    <input type='text' name='desired_proc_units' class ='form-control'>
                </td>
                <td >
                    <label style='margin-left:20px'> Minimum virtual processors *
                    </label>
                </td>
                <td>
                    <input type='text' class ='form-control' name='min_v_proc'>
                </td>
             </tr>
            <tr>
                <td>
                    Maximum processing units *
                </td>
                <td>
                    <input type='text' name='max_proc_units' class ='form-control'>
                </td>
                <td>
                <label style='margin-left:20px'> Desired virtual processing *
                </td>
                <td>
                    <input type='text' name='desired_v_proc' class ='form-control'>
                </td>
            </tr>
            <tr>
                <td>
                    Shared processor pool *
                </td>
                <td>
                    <input type='text' name='shared_proc_pool' class ='form-control'>
                </td>
            
                <td>
                  
                    <label style='margin-left:20px'>   Maximum virtual processorss *

                </td>
                <td>
                    <input type='text' name='max_v_proc' class ='form-control'>
                </td>
            </tr>
            </table>
            <br>
    </div>
  
    {!! Form::close()!!}

  
<button class="accordion"><i class="fas fa-angle-double-right"></i> Memory Settings</button>
<div class="panel">
  <p > 
      Physical Memory
</p>
<p >
    Installed Memory          65563
</p>
<p >
    Current memory available for Partiton usage (MB)         65563
</p>
    <table >
        <tr>
            <td >
                Minimum memory 
             </td>
            <td >
                 <input  class ="form-control" type="range" min="0" max="100" value="42" class="slider" id="myRange">
            </td> 
            <td>
                 <span id="value"></span>GB
            </td>
            
        </tr>
        <tr>
            <td >
                Desired memory 
             </td>
            <td >
                 <input class ="form-control" type="range" min="0" max="100" value="42" class="slider1" id="myRange1">
            </td> 
            <td>
                 <span id="value1"></span>GB
            </td>
            
        </tr>
        <tr>
            <td >
                Maximum memory 
             </td>
            <td >
                 <input class ="form-control"  type="range" min="0" max="100" value="42" class="slider2" id="myRange2">
            </td> 
            <td>
                 <span id="value2"></span>GB
            </td>
            
        </tr>

    </table>
</div>

<button class="accordion"> <i class="fas fa-angle-double-right"></i>   Virtual Adapters</button>
  
<div class="panel" >
      
<br>
            <table style="margin-left:350px">
           <tr>
           <td>
              Maximum virtual adapters:
           </td>
           <td>
           <select style="margin-left:0px" name="server" style="width:30%;margin-left:320px;margin-top:-25px" class="form-control form-control-sm" >
            @for($i=0;$i<=100;$i++)
                <option value="$i">{{$i}}</option>
            @endfor
        </select>
           </td>
           </tr>
           </table>
           <br>
                  <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td colspan="2">Larry the Bird</td>
              <td>@twitter</td>
            </tr>
          </tbody>
        </table>
           <br>
           <table>
           <tr> 
            <td>
                <button style="margin-left:200px" data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
    Virtal SCSI Adapter
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
          <table>
                <tr>
                <td>
                      <label>Adapter</label>
                </td>
                <td>
                  <select class="form-control" class="" name="adapter">
                    <option value="client_adapter">
                      Client
                    </option>
                    <option  value="client_adapter">
                      Server
                    </option>
                    </select>
                </td>
              </tr>
              <tr>
                <td>
                      <label>Partition</label>
                </td>
                <td>
                <select class="form-control" class="" name="adapter">
                    <option value="client_adapter">
                      Client
                    </option>
                    <option  value="client_adapter">
                      Server
                    </option>
                    </select>
                </td>
              </tr>
</table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
            </td>
            <td>
               <button style="margin-left:50px" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>   Virtual Ethernet Adapter</button>
               </td>
            <td>
            <button style="margin-left:50px" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>   Virtual FC Adapter</button>
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
              <input class ="form-control" style="color:red" type=checkbox> Enable connection monitoring 
                </td>
                <td>
                
                <label>Boot modes</label>
                </td>
                
                </tr>

        
        <tr>
                <td>
             <input class ="form-control" type=checkbox > Automatically start with managed system 
                </td>
                <td>
                <input class ="form-control" type=checkbox >Normal
                </td>
        </tr>
        <tr>
                <td>
             <input type=checkbox class ="form-control"> Enable redundant error path reporting  
                </td>
                <td>
                <input type=checkbox class ="form-control">System Managment Services(SMS)
                </td>
              
        </tr>
        </table>
        <table>
        <tr>
        <td>
        <br>
        
       
        <button type="button" class="btn btn-success"style="margin-left:400px">Success</button>
        </td>
        </tr>

</table>
        </div>

   

        

<script>
    
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

output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
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

output1.innerHTML = slider1.value;

slider1.oninput = function() {
  output1.innerHTML = this.value;
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

output2.innerHTML = slider2.value;

slider2.oninput = function() {
  output2.innerHTML = this.value;
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
</script>
<script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js')}}"></script>
<script src="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js')}}"></script>

</body>
</html>
</div>

</div>

@endsection
