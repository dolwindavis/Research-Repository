@extends('layouts.admin')
@section('title','Research Repository | Admin')
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
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
                            <a href="{{ url('admin/journals') }} ">
                                <div class="row">
                                    <div class="col">
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
                                <a>
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
                    <h3 class="mb-0">Research Activities</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="inputState">Pick A date</label>
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="ni ni-calendar-grid-58"></i></span>
                                </div>
                                <input class="form-control datepicker" id="date" placeholder="Select date" type="text"
                                    value="">
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputState">Pick Range</label>
                            <div class="input-daterange datepicker row align-items-center">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Start date" id="from-date" type="text" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="End date" id= "to-date"type="text" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row icon-examples">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">SI NO</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Category</th>
                                <th scope="col">Type</th>
                                <th scope="col">Host</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($activities as $key => $repo)
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            {{$key+1}}
                                        </div>
                                    </div>
                                </th>
                                <td>
                                    {{$repo->name}}
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        {{$repo->date}}
                                    </span>
                                </td>
                                <td>
                                    {{$repo->activity_category }}
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            {{$repo->activity_type }}
                                        </div>
                                    </div>
                                </td>
                                <td class="text-left">
                                    <div>
                                        {{ $repo->host }}
                                    </div>
                                </td>
                                <td class="text-left">
                                    <a href={{ url('/admin/activity/'. $repo->id. '/edit') }} >
                                    Edit
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- <div class="col-lg-3 col-md-6">
                  <button type="button" class="btn-icon-clipboard" data-clipboard-text="active-40" title="Copy to clipboard">
                    <div>
                      <i class="ni ni-active-40"></i>
                      <span>active-40</span>
                    </div>
                  </button>
                </div> -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script>
    $('#date').change(function () {

        var date = $(this).val();

        window.location.href = '/admin/activity?from=' + date.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3-$1-$2");

    });
    $('#to-date').change(function () {

        var from = $('#from-date').val();

        console.log(from);

        var to = $(this).val();

        if(from !== to){

        window.location.href = '/admin/activity?from=' +from.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3-$1-$2") +'&to=' + to.replace(/(\d\d)\/(\d\d)\/(\d{4})/, "$3-$1-$2")  ;

        }

    });

</script>
@endsection
