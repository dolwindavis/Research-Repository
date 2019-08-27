@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-marginless is-centered">
        <div class="column is-12">
            <div class="form-card">
                <div class="form-head">
                    <div class="form-icon"></div>
                    <div class="form-name">
                        <h2>research Registration</h2>
                    </div>
                </div>
                <div class="form-body">
                    <form action="{{url('/projects/'.$research->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Title</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input class="input is-dark" id="title" type="text" name="title"
                                            value="{{$research->title}}" required autofocus>
                                    </div>
                                    @if ($errors->has('title'))
                                    <p class="help is-danger">
                                        {{ $errors->first('title') }}
                                    </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Research Category</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <div class="select is-dark">
                                            <select name="research_category" id="researchselector">
                                                @if($research->research_category == 'internal')
                                                    <option value="internal" selected>Internal Projects</option>
                                                    <option value="external">External Projects</option>
                                                @else
                                                    <option value="internal">Internal Projects</option>
                                                    <option value="external"selected>External Projects</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    @if ($errors->has('research_category'))
                                    <p class="help is-danger">
                                        {{ $errors->first('research_category') }}
                                    </p>
                                    @endif
                                </div>
                                <div class="field is-horizontal">
                                    <div class="field-label">
                                        <label class="label">Project Code</label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <div class="control">
                                                <input class="input is-dark" id="project_code" type="text"
                                                    name="project_code"
                                                    value="{{ $research->project_code }}"
                                                     maxlength=9 minlength=9>
                                            </div>
                                            @if ($errors->has('project_code'))
                                            <p class="help is-danger">
                                                {{ $errors->first('project_code') }}
                                            </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Research Project Agency</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <div class="select is-dark">
                                            <select name="agency" id="agency">
                                                @if($research->agency == 'KJC')
                                                    <option value="KJC" selected>KJC</option>
                                                @elseif($research->agency == 'UGC')
                                                    <option value="UGC" selected> UGC </option>
                                                @elseif($research->agency == 'DST')
                                                    <option value="DST" selected> DST </option> 
                                                @elseif($research->agency == 'VGST')
                                                    <option value="VGST" selected> VGST </option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="field is-horizontal">
                                    <div class="field-label">
                                        <label class="label">Department</label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <div class="control">
                                                <div class="select is-dark">
                                                    <select name="department_id" id="">
                                                        @foreach($departments as $department)
                                                            @if($research->department_id == $department->id)
                                                                <option value="{{$department->id }} " selected> {{ $department->name}}
                                                            </option>
                                                            @else
                                                                <option value="{{$department->id }} "> {{ $department->name}}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="field-label">
                                    <label class="label">Investigator</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <div class="select is-dark">
                                                <select name="user_role">
                                                    @if($research->user_role == "Principal Investigator")
                                                        <option value="Principal Investigator" selected>Principal Investigator</option>
                                                        <option value="Co-Investigator" >Co-Investigator</option>
                                                    @else
                                                        <option value="Principal Investigator" >Principal Investigator</option>
                                                        <option value="Co-Investigator" selected>Co-Investigator</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        @if ($errors->has('user_role'))
                                        <p class="help is-danger">
                                            {{ $errors->first('user_role') }}
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Duration</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input class="input is-dark" id="publish_detail" type="number" name="duration"
                                            value="{{$research->duration}}">
                                    </div>
                                    @if ($errors->has('duration'))
                                    <p class="help is-danger">
                                        {{ $errors->first('duration') }}
                                    </p>
                                    @endif
                                </div>
                                <div class="field is-horizontal">
                                    <div class="field-label">
                                        <label class="label">Amount</label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <div class="control">
                                                <input class="input is-dark" id="publish_detail" type="number"
                                                    name="amount" value="{{$research->amount}}">
                                            </div>
                                            @if ($errors->has('duration'))
                                            <p class="help is-danger">
                                                {{ $errors->first('duration') }}
                                            </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Status</label>
                            </div>
                            <div class="field-body">
                                <div class="field is-grouped">
                                    <div class="control">
                                        <div class="select is-dark">
                                            <select name="status">
                                                @if($research->status == "Applied")
                                                    <option value="Applied" selected>Applied</option>
                                                    <option value="Ongoing" >Ongoing</option>
                                                    <option value="Completed" >Completed</option>
                                                @elseif($research->status == "Ongoing")
                                                    <option value="Applied" >Applied</option>
                                                    <option value="Ongoing" selected>Ongoing</option>
                                                    <option value="Completed" >Completed</option>
                                                @else   
                                                    <option value="Applied" >Applied</option>
                                                    <option value="Ongoing" >Ongoing</option>
                                                    <option value="Completed" selected>Completed</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    @if ($errors->has('url'))
                                    <p class="help is-danger">
                                        {{ $errors->first('url') }}
                                    </p>
                                    @endif
                                    <div class="control">
                                        <div class="field">
                                            <div class="file is-right is-info ">
                                                <label class="file-label ">
                                                    <input class="file-input " type="file" name="upload">
                                                    <span class="file-cta">
                                                        <span class="file-icon">
                                                            <i class="fas fa-upload"></i>
                                                        </span>
                                                        <span class="file-label">
                                                            Right file…
                                                        </span>
                                                    </span>
                                                    <span class="file-name">
                                                        Upload Work File...
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="field is-grouped">
                            <p class="control">
                                <button type="submit" class="button is-link">
                                    Save changes
                                </button>
                            </p>
                            <p class="control">
                                <button type="reset" class="button">
                                    Cancel
                                </button>
                            </p>
                        </div>
                </div>
            </div>

        </div>
        </form>
    </div>
</div>
@endsection
@section('script')
{{-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
<script>
var app = new Vue({
    el: "#app",
})
</script> --}}

@endsection
