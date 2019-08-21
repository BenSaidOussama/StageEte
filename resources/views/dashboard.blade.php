@extends('layout.head')
@extends('layout.template')
@section('content')
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                      <label style="font-size:15px;width:150%;text-align:center">Clients number</label></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <label style="font-size:30px;width:150%;text-align:center">    
                      {{$nb_client}}
                        </label>
                    </div>
                    </div>
                    <div class="col-auto">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                      <label style="font-size:15px;width:150%;text-align:center">Servers number</label></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <label style="font-size:30px;width:150%;text-align:center">    
                      {{$nb_server}}
                        </label>
                      </div>
                    </div>
                    <div class="col-auto">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                      <label style="font-size:15px;width:150%;text-align:center">Lpars number</label>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <label style="font-size:30px;width:150%;text-align:center">    
                      {{$nb_lpar}}
                        </label>
                      </div>
                    </div>
                    <div class="col-auto">
                    </div>
                  </div>
                </div>
                  </div>
                </div>
                <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                      <label style="font-size:15px;width:150%;text-align:center">Templates number</label>
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <label style="font-size:30px;width:150%;text-align:center">    
                      {{$nb_template}}
                        </label>
                      </div>
                    </div>
                    <div class="col-auto">
                    </div>
                  </div>
                </div>
              </div>
            </div>
              </div>
            </div>
          

     
@endsection