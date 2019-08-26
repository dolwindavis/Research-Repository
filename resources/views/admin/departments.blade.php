@extends('layouts.admin')
@section('title','Research Repository | Admin')

@section('content')
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                <a href="{{ url('admin/faculties') }} ">

                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Faculties</h5>
                      <span class="h2 font-weight-bold mb-0">{{$repositorycount[3]}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
</a>
                  <!-- <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p> -->
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                <a href="{{ url('admin/books') }} ">

                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Books</h5>
                      <span class="h2 font-weight-bold mb-0">{{$repositorycount[0]}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
</a>
                  <!-- <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">Since last week</span>
                  </p> -->
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                    <a href="{{ url('admin/journals') }} ">

                      <h5 class="card-title text-uppercase text-muted mb-0">Publicaions</h5>
                      <span class="h2 font-weight-bold mb-0">{{$repositorycount[1]}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
</a>
                  <!-- <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span class="text-nowrap">Since yesterday</span>
                  </p> -->
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                <a href="{{ url('admin/research') }} ">

                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Research Projects</h5>
                      <span class="h2 font-weight-bold mb-0">{{$repositorycount[2]}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
</a>
                  <!-- <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p> -->
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
           <div class="card-header bg-transparent">
              <h3 class="mb-0">Add New Department</h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples">
                <div class="col-lg-5 col-md-6 center">
                  <!-- <button type="button" class="btn-icon-clipboard" data-clipboard-text="active-40" title="Copy to clipboard">
                    <div>
                      <i class="ni ni-active-40"></i>
                      <span>active-40</span>
                    </div>
                  </button> -->
                  @if($department == null)
                  <form class="login-form" method="POST" action="{{ route('addDepartment') }}">
                  @else
                  <form class="login-form" method="POST" action="{{url('/admin/department/update/'.$department->id)}}">
                  @endif
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="input-group input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"></span>
                                </div>
                                <input class="form-control" placeholder="Department Name" type="text" name="departmentName" value="{{ $department == null?old('departmentName'):$department->name }}">
                            </div>
                        </div>
                        @if ($errors->has('departmentName'))
                                        <p class="help is-danger">
                                            {{ $errors->first('departmentName') }}
                                        </p>
                                    @endif
                        <button class="btn btn-icon btn-3 btn-primary" type="submit" >
                          @if($department == null)
                            <span class="btn-inner--text">Add</span>
                          @else
                            <span class="btn-inner--text">Update</span>
                          @endif
                        </button>
                    </form>
                </div>
                <!-- <div class="col-lg-3 col-md-6">
                  <button type="button" class="btn-icon-clipboard" data-clipboard-text="air-baloon" title="Copy to clipboard">
                    <div>
                      <i class="ni ni-air-baloon"></i>
                      <span>air-baloon</span>
                    </div>
                  </button>
                </div> -->
                <!-- <div class="col-lg-3 col-md-6">
                  <button type="button" class="btn-icon-clipboard" data-clipboard-text="album-2" title="Copy to clipboard">
                    <div>
                      <i class="ni ni-album-2"></i>
                      <span>album-2</span>
                    </div>
                  </button>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div> 
  @endsection
      