@extends('layouts.admin')
@section('title','Research Repository | Admin')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@section('content')
<!-- Header -->
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <!-- Page content -->
    <div class="container">
        <div class="columns is-marginless is-centered">
            <div class="column is-12">
                <div class="form-card">
                    <div class="form-head">
                        <div class="form-icon"></div>
                        <div class="form-name">
                            <h2>Activity Registration</h2>
                        </div>
                    </div>
                    <div class="form-body">
                        <form action="{{ url('/admin/activity/'.$researchactivity->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="field is-horizontal">
                                <div class="field-label">
                                    <label class="label">Activity Name</label>
                                </div>

                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <input class="input is-dark" id="title" type="text" name="name"
                                                value="{{$researchactivity->name}}" required >
                                        </div>
                                        @if ($errors->has('name'))
                                        <p class="help is-danger">
                                            {{ $errors->first('name') }}
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label">
                                    <label class="label">Activity Category</label>
                                </div>

                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <div class="select is-dark">
                                                <select name="activity_category" id="researchselector">
                                                    @if($researchactivity->activity_category == 'workshop')
                                                        <option value="workshop" selected>Workshop</option>
                                                        <option value="conference">Conference</option>
                                                    @elseif($researchactivity->activity_category == 'conference')
                                                        <option value="workshop" >Workshop</option>
                                                        <option value="conference"selected>Conference</option>
                                                    @else
                                                        <option value="workshop" >Workshop</option>
                                                        <option value="conference"selected>Conference</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        @if ($errors->has('activity_category'))
                                        <p class="help is-danger">
                                            {{ $errors->first('activity_category') }}
                                        </p>
                                        @endif
                                    </div>
                                    <div class="field is-horizontal">
                                        <div class="field-label">
                                            <label class="label">Activity Type</label>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <div class="control">
                                                    <div class="select is-dark">
                                                        <select name="activity_type">
                                                        @if($researchactivity->activity_type == 'national')
                                                            option value="national" selected>National</option>
                                                            <option value="international">International
                                                        @elseif($researchactivity->activity_type == 'international')
                                                             <option value="national" >National</option>
                                                            <option value="international" selected>International
                                                        @else
                                                             <option value="national" National</option>
                                                            <option value="international" s>International
                                                        @endif                                                           
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field is-horizontal">
                                        <div class="field-label">
                                            <label class="label">Date</label>
                                        </div>
                                        <div class="field-body">
                                            <div class="field">
                                                <div class="control">
                                                        <div class="input-group input-group-alternative">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="ni ni-calendar-grid-58"></i></span>
                                                            </div>
                                                            <input class="form-control datepicker" placeholder="Select date" type="text" value="{{$researchactivity->date}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($errors->has('host'))
                                                <p class="help is-danger">
                                                    {{ $errors->first('host') }}
                                                </p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label">
                                    <label class="label">Host</label>
                                </div>
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <input class="input is-dark" id="project_code" type="text" name="host"
                                                value="{{ $researchactivity->host }}">
                                        </div>
                                        @if ($errors->has('host'))
                                        <p class="help is-danger">
                                            {{ $errors->first('host') }}
                                        </p>
                                        @endif
                                    </div>
                                    <div class="field is-horizontal">
                                        <div class="field-label">
                                            <label class="label">Proof Doc</label>
                                        </div>
                                        <div class="field-body">
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
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

@endsection
