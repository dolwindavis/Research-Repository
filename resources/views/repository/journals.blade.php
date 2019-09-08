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
                    <table class="table is-fullwidth">
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
                    <table class="table is-fullwidth">                   
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
                                    <a href ="{{url('journals/'.$repository->id.'/edit')}}">
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
                                    <b>Published Date</b>
                                </td>
                                <td>
                                    {{$repository->publishdate}}
                                </td>
                                <td>
                                </td>
                            <tr>
                            <tr>
                                <td>
                                    <b>Journal Category</b>
                                </td>
                                <td>
                                    {{$repository->journalcategory->name}}
                                </td>
                                <td>
                                </td>
                            <tr>
                            <tr>
                                <td>
                                    <b>Category</b>
                                </td>
                                <td>
                                    {{$repository->journaltype->name}}
                                </td>
                                <td>
                                </td>
                            <tr>
                            <tr>
                                <td>
                                    <b>Authorship</b> 
                                </td>
                                <td>
                                    {{$repository->authorships->name}}
                                </td>
                                <td>
                                </td>
                            <tr>
                            <tr>
                                <td>
                                    <b>ISSN/ISBN Number</b> 
                                </td>
                                <td>
                                    {{$repository->issn_isbn_no}}
                                </td>
                                <td>
                                </td>
                            <tr>
                            <tr>
                                <td>
                                    <b>Bibliography</b>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                            <tr>
                            <tr>
                                <td>
                                    <b>Volume<b>
                                </td>
                                <td>
                                    <b>Issue</b>
                                </td>
                                <td>
                                    <b>Pages</b>
                                </td>
                            <tr>
                            <tr>
                                <td>
                                    {{$repository->bibliography_vol}}
                                </td>
                                <td>
                                    {{$repository->bibliography_issue}}   
                                </td>
                                <td>
                                    {{$repository->bibliography_pages}}
                                </td>
                            <tr>
                            <tr>
                                <td>
                                    <b>URL</b>
                                </td>
                                <td>
                                    {{$repository->upload->url}}
                                </td>
                                <td>
                                </td>
                            <tr>
                            <tr>
                                <td>
                                    <b>Impact Factor</b>
                                </td>
                                <td>
                                    {{$repository->impact_factor}}
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