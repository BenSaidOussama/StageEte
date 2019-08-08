@extends('layout.head')
@extends('layout.template')
@section('content')
<div class="container-fluid">
<div class="card shadow mb-4" style="width:90%; text-align:center; margin-left:50px">  
<h1>LPAR Details</h1>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css')}}">
<script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js')}}"></script>
<script src="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js')}}"></script>
<style>
  



.slideContainer {
/*	width: 75%;
	margin-top: 50px;
  align-self: center; */
}
  
  .slider {
	/*-webkit-appearance: none;
	width: 100%;
	height: 5px;
	background: linear-gradient(90deg, rgb(117, 252, 117) 5%, rgb(214, 214, 214) 0%);
	outline: none;
	opacity: 0.7;
	-webkit-transition: .2s;
	transition: opacity .2s;
	border-radius: 12px;
	box-shadow: 0px 1px 10px 1px black;*/
	}
  
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
                <input type="text" name="partition_id">
                </td>
                    
                <td>
                   <label style="margin-left:30px"> Partition Name:</label>
                </td>
                <td>
                <input type="text" name="partion_name" >
                </td>
                <td>
                <label style="margin-left:30px">  Profile Name:</label>
                </td>
                <td>
                <input type=text>
                </td>
        </tr>
    </table>
    <br>
    </div>


<button class="accordion"><i class="fas fa-angle-double-right"></i> Processor</button>
    <div class="panel" >
                    <input type="radio" style="margin-left:50px" name="gender" value="Shared"> Shared
                     <p style="margin-left:50px">Assign partial processor units from the shared processor pool.</p>
                <input style="margin-left:50px" type="radio" name="gender" value="Dedicate"> Dedicate
                <p style="margin-left:50px">Assign entire processors that can only be used by the partition</p>
               
    </div>

<button class="accordion"><i class="fas fa-angle-double-right"></i> Processor Settings</button>
    <div class="panel" >
        <p style="margin-left:50px">Specify the desired,minimum,and maximum</p>
        <p style="margin-left:50px">processing settings in the filed bellow.</p>

            <table style="margin-left:50px">
            <tr>
                <td>
                Minimum processing units *
                </td>
                <td>
                <input type='text' name="min_proc_units">
                </td>
            </tr>
            <tr>
                <td>
                    Desired processing units *
                </td>
                <td>
                    <input type='text' name="desired_proc_units">
                </td>
                <td >
                    <label style="margin-left:20px"> Minimum virtual processors *
                    </label>
                </td>
                <td>
                    <input type='text' name="min_v_proc">
                </td>
             </tr>
            <tr>
                <td>
                    Maximum processing units *
                </td>
                <td>
                    <input type='text' name="max_proc_units">
                </td>
                <td>
                <label style="margin-left:20px"> Desired virtual processing *
                </td>
                <td>
                    <input type='text' name="desired_v_proc">
                </td>
            </tr>
            <tr>
                <td>
                    Shared processor pool *
                </td>
                <td>
                    <input type='text' name="shared_proc_pool">
                </td>
            
                <td>
                  
                    <label style="margin-left:20px">   Maximum virtual processorss *

                </td>
                <td>
                    <input type="text" name='max_v_proc'>
                </td>
            </tr>
            </table>
            <br>
    </div>
    
<button class="accordion"><i class="fas fa-angle-double-right"></i> Memory Settings</button>
<div class="panel">
  <p style="margin-left:-100px;"> 
      Physical Memory
</p>
<p style="margin-left:-100px;">
    Installed Memory          65563
</p>
<p style="margin-left:-100px;">
    Current memory available for Partiton usage (MB)         65563
</p>
    <table style="margin-left:220px;">
        <tr>
            <td >
                Minimum memory 
             </td>
            <td >
                 <input style="margin-left:70px" type="range" min="0" max="100" value="42" class="slider" id="myRange">
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
                 <input style="margin-left:70px" type="range" min="0" max="100" value="42" class="slider1" id="myRange1">
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
                 <input style="margin-left:70px" type="range" min="0" max="100" value="42" class="slider2" id="myRange2">
            </td> 
            <td>
                 <span id="value2"></span>GB
            </td>
            
        </tr>

    </table>
</div>

<button class="accordion"> <i class="fas fa-angle-double-right"></i> Virtual Adapters</button>
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
                <button style="margin-left:200px" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>Virtual SCSI Adapter</button>
            </td>
            <td>
               <button style="margin-left:50px" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>Virtual Ethernet Adapter</button>
               </td>
            <td>
            <button style="margin-left:50px" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>Virtual FC Adapter</button>
            </td>

          </tr>
          </table>
<br>
    </div>

<button class="accordion"><i class="fas fa-angle-double-right"></i> Optional Settings</button>
        <div class="panel">
        <table> 
            <tr>
                <td>
              <input type=checkbox style="margin-left:0px"> Enable connection monitoring 
                </td>
                <td>
                
                <label style="margin-left:180px">Boot modes</label>
                </td>
                
                </tr>

        
        <tr>
                <td>
             <input type=checkbox style="margin-left:70px"> Automatically start with managed system 
                </td>
                <td>
                <input type=checkbox style="margin-left:20px">Normal
                </td>
        </tr>
        <tr>
                <td>
             <input type=checkbox style="margin-left:50px"> Enable redundant error path reporting  
                </td>
                <td>
                <input type=checkbox style="margin-left:200px">System Managment Services(SMS)
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



              
</body>
</html>
</div>
</div>

@endsection