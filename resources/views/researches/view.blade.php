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
                    <form action="/projects" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Title</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input class="input is-dark" id="title" type="text" name="title"
                                            value="{{old('title')}}" required autofocus>
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
                                                <option value="internal" selected>Internal Projects</option>
                                                <option value="external">External Projects</option>
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
                                                    value="{{ old('project_code') }}"
                                                    onkeyup="addHyphen(this)" maxlength=9 minlength=9>
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
                                                <option value="KJC" selected>KJC</option>
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
                                                        <option value="{{$department->id }} "> {{ $department->name}}
                                                        </option>
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
                                                    <option value="Principal Investigator" selected>Principal Investigator</option>
                                                    <option value="Co-Investigator" >Co-Investigator</option>

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
                                            value="{{old('duration')}}">
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
                                                    name="amount" value="{{old('amount')}}">
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
                                                <option value="Applied" selected>Applied</option>
                                                <option value="Ongoing" selected>Ongoing</option>
                                                <option value="Completed" selected>Completed</option>
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
