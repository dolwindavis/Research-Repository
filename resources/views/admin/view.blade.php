@extends('layouts.admin')
@section('title','Research Repository | Admin')

@section('content')
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8" style="padding-top: 5px;">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <a href="/admin/college-reports">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Books</h5>
                      <span class="h2 font-weight-bold mb-0">{{$repositorycount[0]}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    
                  </p>
                </div>
              </div>
              </a>
            </div>
            <div class="col-xl-3 col-lg-6">
              <a href="/admin/event-reports">
                <div class="card card-stats mb-4 mb-xl-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Journals</h5>
                        <span class="h2 font-weight-bold mb-0">{{$repositorycount[1]}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                          <i class="fas fa-chart-pie"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                    
                    </p>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Projects</h5>
                      <span class="h2 font-weight-bold mb-0">{{$repositorycount[2]}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                   
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Faculties</h5>
                      <span class="h2 font-weight-bold mb-0">{{$repositorycount[3]}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                   
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 mb-5 mb-xl-0">
          <div class="card bg-gradient-default shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                    <h6 class="text-uppercase text-light ls-1 mb-1">Publish Results</h6>
                    <h2 class="text-white mb-0">Shells 2K19</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
                <!-- PUblish Results -->
              <form method="post" action="/result/register">
              @csrf
                <div class="row">
                
                  <!-- Event name -->
                  <div class="form-group col-md-6">
                    <label for="inputState">Event</label>
                    <select id="inputState" class="form-control" name="eventid">
          
                      <!--<option value="1"> DeepCoder </option>-->
                      <option value="" selected> </option>
                    </select>
                  </div>

                  <!-- Round Number -->
                  <div class="form-group col-md-6">
                    <label for="inputState">Round</label>
                    <select id="inputState" class="form-control" name="round">
                      <option selected >Choose...</option>
                      <option value="Round 1"> Round 1 </option>
                      <option value="Round 2"> Round 2 </option>
                      <option value="Round 3"> Round 3 </option>
                      <option value="Round 4"> Round 4 </option>
                      <option value="Round 5"> Round 5 </option>
                      <option value="Round 6"> Round 6 </option>
                    </select>
                  </div>                
                
                <!-- Individaul/Group -->
                  <div class="form-group col-md-6">

                    <div class="custom-control custom-radio mb-3">
                      <input name="eventtype" class="custom-control-input" id="customRadio5" type="radio" value="individual">
                      <label class="custom-control-label" for="customRadio5">Individual</label>
                    </div>
                    <div class="custom-control custom-radio mb-3">
                      <input name="eventtype" class="custom-control-input" id="customRadio6" checked="" type="radio" value="group">
                      <label class="custom-control-label" for="customRadio6">Group</label>
                    </div>
                  </div>
              
                  <!-- no of participants -->
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Number of Participants</label>
                    <input type="number" class="form-control" id="inputEmail4" placeholder="NUmber" name="no">
                  </div>

                  <button class="btn btn-icon btn-3 btn-primary" type="submit" >
                        
                     <span class="btn-inner--text">Next</span>
                    
                  </button>

              </form>
            </div>
          </div>
        </div>
        </div>
        <div class="col-xl-4">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Publish News</h6>
                  <h2 class="mb-0">Research Article Repository</h2>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart" style="text-align: center;">
                <!-- Publish News -->
              <form action="/news/add" method ="post">
              @csrf
                    <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title" name="title">
                    </div>
                    </div>
                    <div class="col-md-12">
                              <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input class="form-control datepicker" placeholder="Select date" type="text" value="{{ date('d-m-Y')}}" name="date">
                                </div>
                        </div>
                        <!--<div class="form-group">
                            <input type="text" placeholder="Date" class="form-control" name="date"/>
                        </div>-->
                    </div> 
                    <div class="col-md-12">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Markup" name="body"></textarea>              
                    </div> 
                    <button type="submit" class="btn btn-icon btn-3 btn-primary" type="button" style="margin-top: 40px;">
                        
                        <span class="btn-inner--text">Publish</span>
                    
                    </button>
                </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
      
        
      <!-- Footer -->

    </div>
  </div>

@endsection
