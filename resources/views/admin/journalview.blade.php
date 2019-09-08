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
                    {{--<h3 class="mb-0">{{ $repository[0]->repositorycategory }}</h3>--}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="inputState">Faculty</label>
                            <select id="faculty" class="form-control">
                                <option value="">All faculties</option>
                                @foreach($faculties as $fac)
                                    @if($data['faculty'] == $fac->id)
                                        <option value="{{ $fac->id }}" selected> {{ $fac->name }} </option>
                                    @else
                                        <option value="{{ $fac->id }}"> {{ $fac->name }} </option>
                                    @endif  
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputState">Journal Category</label>
                            <select id="journal-category" class="form-control" >
                                <option value="" selected>All Category</option>
                                @if($data['journalcategory'] == 'Journal')
                                
                                    <option value="Journal" selected>Journal</option>
                                    <option value="Conference Proceeding">Conference Proceeding</option>
                                    <option value="Newsletter">Newsletter</option>
                                @elseif($data['journalcategory'] == 'Conference Proceeding')

                                    <option value="Journal" >Journal</option>
                                    <option value="Conference Proceeding" selected>Conference Proceeding</option>
                                    <option value="Newsletter">Newsletter</option>
                                @elseif($data['journalcategory'] == 'Newsletter')

                                    <option value="Journal" >Journal</option>
                                    <option value="Conference Proceeding">Conference Proceeding</option>
                                    <option value="Newsletter" selected>Newsletter</option>
                                @else
                                    <option value="Journal" >Journal</option>
                                    <option value="Conference Proceeding">Conference Proceeding</option>
                                    <option value="Newsletter">Newsletter</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputState">Category</label>
                            <select id="category" class="form-control" >
                                <option value="" selected>All Category</option>
                                @if($data['category'] == 'National')
                                    <option value="National" selected>National</option>
                                    <option value="International">Inter National</option>
                                @elseif($data['category'] == 'Inter National')
                                    <option value="National">National</option>
                                    <option value="International" selected>Inter National</option>
                                @else
                                    <option value="National">National</option>
                                    <option value="International">Inter National</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="publishyear">Published Year</label>
                            <select id="publishyear" class="form-control" >
                                <option value="" selected>All Published Dates</option>
                                @for($i=0;$i<count($publishyears);$i++)
                                    @if($publishyears[$i] == $data['year'])
                                        <option value="{{$publishyears[$i] }}" selected>{{$publishyears[$i] }} </option>
                                    @else
                                        <option value="{{$publishyears[$i] }}">{{$publishyears[$i] }} </option>
                                    @endif
                                @endfor
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="publishmonth">Published Month</label>
                            <select id="publishmonth" class="form-control" >
                                <option value="" selected>All Published Dates</option>
                                @for($i=0;$i<count($publishmonths);$i++)
                                    @if($publishmonths[$i] == $data['month'])
                                        <option value="{{$publishmonths[$i] }}" selected>{{$publishmonths[$i] }} </option>
                                    @else
                                        <option value="{{$publishmonths[$i] }}" >{{$publishmonths[$i] }} </option>
                                    @endif
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="row icon-examples">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">SI NO</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Published Date</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Authorship</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($repository as $key => $repo)
                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                {{$key+1}}
                                            </div>
                                        </div>
                                    </th>
                                    <td>
                                        {{$repo->repositorycategory}}
                                    </td>
                                    <td>
                                        <span class="badge badge-dot mr-4">
                                            {{$repo->publishdate}}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{url('/repository/'.$repo->repositorycategory.'/'.$repo->slug)}}">
                                        {{$repo->title }}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                {{ $repo->user->name }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div>
                                            {{ $repo->authorships->name }}
                                        </div>
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

    <script>

    $(document).ready(function () {
        
        $('#faculty').on('change', changeSitesData);
        // $('#session_year').on('select2:select', changeSessionData);
        // $('#session_month').on('select2:select', changeSessionData);

        function changeSitesData(){

                 
           var fac = $('#faculty :selected').val();
            
           if(fac != ""){

             window.location='/admin/journals?faculty=' + fac;

            }
            else{

                window.location='/admin/journals';

            }

        }
    });

    $(document).ready(function () {
        
        $('#journal-category').on('change', changeSitesData);
        // $('#session_year').on('select2:select', changeSessionData);
        // $('#session_month').on('select2:select', changeSessionData);

        function changeSitesData(){

                 
           var cat = $('#journal-category :selected').val();
        
            if(cat != ""){

                window.location='/admin/journals?journalcategory=' + cat;

            }
            else{

                window.location='/admin/journals';

            }



        }
    });
    $(document).ready(function () {
        
        $('#category').on('change', changeSitesData);
        // $('#session_year').on('select2:select', changeSessionData);
        // $('#session_month').on('select2:select', changeSessionData);

        function changeSitesData(){

                 
            var cat = $('#category :selected').val();
        
            if(cat != ""){
                window.location='/admin/journals?category=' + cat;
            }
            else{
                window.location='/admin/journals';
            }



        }
    });
    $(document).ready(function () {
        
        $('#publishyear').on('change', changeSitesData);
        // $('#session_year').on('select2:select', changeSessionData);
        // $('#session_month').on('select2:select', changeSessionData);

        function changeSitesData(){

            var year = $('#publishyear :selected').val();

            if(year != ""){     
            
                window.location='/admin/journals?year=' + year;

            }
            else{
                window.location='/admin/journals';
            }
        }
    });

    $(document).ready(function () {
        
        $('#publishmonth').on('change', changeSitesData);
        // $('#session_year').on('select2:select', changeSessionData);
        // $('#session_month').on('select2:select', changeSessionData);

        function changeSitesData(){

                 
            var month = $('#publishmonth :selected').val();
            
            var year = $('#publishyear :selected').val();

            if(year != "" && month == ""){     
            
            }
            else if(year != "" && month != ""){

                window.location='/admin/journals?month=' + month + '&year=' + year;

            }
            else{

                window.location='/admin/journals';


            }


        }
    });
</script>
    @endsection
