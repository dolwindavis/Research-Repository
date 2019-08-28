@extends('layouts.admin')
@section('title','Research Repository | Admin')
@section('content')
@include('admin.settings-create-modals')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Journal And Book Settings</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="pl-lg-4">
                                <div class="card-header bg-white border-0">
                                    <div class="row align-items-left">
                                        <div class="col-8">
                                            <h3 class="mb-0">Journal Categories</h3>
                                        </div>
                                        <div class="col-4 text-right">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#journal-category">Add</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">SI NO</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data['journalcategories'] as $key => $journalcat)
                                            <tr>
                                                <td>
                                                    {{ $key+1 }}
                                                </td>
                                                <td>
                                                    {{ $journalcat->name}}
                                                </td>
                                                <!-- Address -->
                                                <td>
                                                    <a href=''>
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <a href="{{ url('/admin/journalcategory/delete/'.$journalcat->id) }}"
                                                        style="padding-left:40px">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <div class="pl-lg-4">
                                <div class="card-header bg-white border-0">
                                    <div class="row align-items-left">
                                        <!-- Address -->
                                        <div class="col-8">
                                            <h3 class="mb-0">Journal Types</h3>
                                        </div>
                                        <div class="col-4 text-right">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#journal-type">Add</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">SI NO</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data['journaltype'] as $key => $journalcat)
                                            <tr>
                                                <td>
                                                    {{ $key+1 }}
                                                </td>
                                                <td>
                                                    {{ $journalcat->name}}
                                                </td>
                                                <!-- Address -->
                                                <td>
                                                    <a href=''>
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <a href="{{ url('/admin/journaltype/delete/'.$journalcat->id) }}"
                                                        style="padding-left:40px">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <div class="pl-lg-4">
                                <div class="card-header bg-white border-0">
                                    <div class="row align-items-left">
                                        <!-- Address -->
                                        <div class="col-8">
                                            <h3 class="mb-0">Authorship</h3>
                                        </div>
                                        <div class="col-4 text-right">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#authorship">Add</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">SI NO</th>
                                                <th scope="col">Name</th>ournal type
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data['authorship'] as $key => $journalcat)
                                            <tr>
                                                <td>
                                                    {{ $key+1 }}
                                                </td>
                                                <td>
                                                    {{ $journalcat->name}}
                                                </td>
                                                <!-- Address -->
                                                <td>
                                                    <a href=''>
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <a href="{{ url('/admin/authorship/delete/'.$journalcat->id) }}"
                                                        style="padding-left:40px">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <!-- Description -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">Research Settings</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="pl-lg-4">
                                <div class="card-header bg-white border-0">
                                    <div class="row align-items-left">
                                        <div class="col-8">
                                            <h3 class="mb-0">Research Category</h3>
                                        </div>
                                        <div class="col-4 text-right">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#researchcategory">Add</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">SI NO</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data['researchcategory'] as $key => $research)
                                            <tr>
                                                <td>
                                                    {{ $key+1 }}
                                                </td>
                                                <td>
                                                    {{ $research->name}}
                                                </td>
                                                <!-- Address -->
                                                <td>
                                                    <a href=''>
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <a href="{{ url('/admin/researchcategory/delete/'.$research->id) }}"
                                                        style="padding-left:40px">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr class="my-4" />

                            <div class="pl-lg-4">
                                <div class="card-header bg-white border-0">
                                    <div class="row align-items-left">
                                        <!-- Address -->
                                        <div class="col-8">
                                            <h3 class="mb-0">Research Agency</h3>
                                        </div>
                                        <div class="col-4 text-right">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#researchagency">Add</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">SI NO</th>
                                                <th scope="col">Name</th>\
                                                <th scope="col">category</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data['researchagency'] as $key => $research)
                                            <tr>
                                               <!--  -->
                                               <td>
                                                    {{ $key+1 }}
                                                </td>
                                                <td>
                                                    {{ $research->name }}
                                                </td>
                                                <td>
                                                    {{ $research->category->name }}
                                                </td>
                                                <td>
                                                    <a href=''>
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <a href="{{ url('/admin/researchagency/delete/'.$research->id) }}"
                                                        style="padding-left:40px">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <div class="pl-lg-4">
                                <div class="card-header bg-white border-0">
                                    <div class="row align-items-left">
                                        <!-- Address -->
                                        <div class="col-8">
                                            <h3 class="mb-0">Research Roles</h3>
                                        </div>
                                        <div class="col-4 text-right">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#researchrole">Add</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">SI NO</th>
                                                <th scope="col">Name</th>\
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data['researchroles'] as $key => $research)
                                            <tr>
                                                <td>
                                                    {{ $key+1 }}
                                                </td>
                                                <td>
                                                    {{ $research->name }}
                                                </td>
                                                <td>
                                                    <a href=''>
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <a href="{{ url('/admin/researchroles/delete/'.$research->id) }}"
                                                        style="padding-left:40px">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <!-- Description -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">User Settings</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="pl-lg-4">
                                <div class="card-header bg-white border-0">
                                    <div class="row align-items-left">
                                        <div class="col-8">
                                            <h3 class="mb-0">Departments</h3>
                                        </div>
                                        <div class="col-4 text-right">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#department">Add</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">SI NO</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data['departments'] as $key => $dep)
                                            <tr>
                                                <td>
                                                    {{ $key+1 }}
                                                </td>
                                                <td>
                                                    {{ $dep->name}}
                                                </td>
                                                <!-- Address -->
                                                <td>
                                                    <a href=''>
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <a href="{{ url('/admin/department/delete/'.$dep->id) }}"
                                                        style="padding-left:40px">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                           <hr class="my-4" />
                            <!-- Description -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- </div> -->
@endsection
