@extends('layouts.app')

@section('content')

<div class="container">
    <div class="columns is-marginless is-centered">
        <div class="column is-12">
            <div class="form-card">
                <div class="form-head">
                    <div class="form-icon"></div>
                        <div class="form-name">
                            <h4><b>{{$repository->title}}</b></h4>
                        </div>
                    </div>
                    @if($repository->upload->filename != null)  
                    <table class="table is-stripped is-fullwidth">
                       <tr> 
                       Files in This Item:
                       </tr>
                        <thead>
                            <tr>
                                <th>
                                    File Name
                                </th>
                                <th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    {{$repository->upload->filename}}
                                </td>
                                <td>
                                    39 KB
                                </td>
                                @if(Auth::user() && (Auth::user()->id == $repository->user->id || Auth::user()->role == 'admin'))                               
                                <td>
                                    <a class="control" href="{{url('/repository/'.$repository->title.'/'.$repository->upload->filename.'/download')}}">
                                        <button  class="button is-link">
                                            Download
                                        </button>
                                    </a>
                                </td>
                                @endif
                        </tbody>

                    </table>  
                    @endif        
                </div>
            </div>
    </div>
    <div class="columns is-marginless is-centered">
        <div class="column is-12">
            <div class="form-card">
                    <table class="table is-stripped is-fullwidth">                   
                        <tbody>
                            <tr>
                                <td>
                                    <b>Name</b>
                                </td>
                                @if(Auth::user() && (Auth::user()->id == $repository->user->id || Auth::user()->role == 'admin'))                               
                                <td>
                                {{$repository->user->id}}
                                </td> 
                                <td>
                                    <a href ="{{url('projects/'.$repository->id.'/edit')}}">
                                    <img src="https://img.icons8.com/ios/30/000000/edit.png">
                                    </a>
                                </td>
                                @else
                                <td>
                                    {{$repository->user->id}}
                                </td>
                                @endif 
                            </tr>
                            <tr>
                                <td>
                                    <b>Department</b> 
                                </td>
                                <td>
                                    {{$repository->department}}
                                </td>
                                <td>
                                </td>
                            <tr>
                            <tr>
                                <td>
                                    <b>Title</b>
                                </td>
                                <td>
                                    {{$repository->title}}
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Project Code</b>
                                </td>
                                <td>
                                    {{$repository->project_code}}
                                </td>
                                <td>
                                </td>
                            <tr>
                            <tr>
                                <td>
                                    <b>Research Category</b>
                                </td>
                                <td>
                                    {{$repository->research_category}}
                                </td>
                                <td>
                                </td>
                            <tr>
                            <tr>
                                <td>
                                    <b>Research Agency</b>
                                </td>
                                <td>
                                    {{$repository->agency}}
                                </td>
                                <td>
                                </td>
                            <tr>
                            <tr>
                                <td>
                                    <b>Duration</b> 
                                </td>
                                <td>
                                    {{$repository->duration}} Year
                                </td>
                                <td>
                                </td>
                            <tr>
                            <tr>
                                <td>
                                    <b>Authorship</b> 
                                </td>
                                <td>
                                    {{$repository->user_role}}
                                </td>
                                <td>
                                </td>
                            <tr>
                            <tr>
                                <td>
                                    <b>Research Status</b> 
                                </td>
                                <td>
                                    {{$repository->status}}
                                </td>
                                <td>
                                </td>
                            <tr>
                        </tbody>

                    </table>          
                </div>
            </div>
    </div>
</div>



@endsection