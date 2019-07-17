@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-marginless is-centered">
        <div class="column is-12">
            <div class="form-card">
                <div class="form-head">
                    <div class="form-icon"></div>
                    <div class="form-name">
                        <h2>Book Registration</h2>
                    </div>
                </div>
                <div class="form-body">
                    <form action="/books" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Title</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input class="input is-dark" id="title" type="text" name="title"
                                            value="{{ old('title') }}" required autofocus>
                                    </div>

                                    @if ($errors->has('title'))
                                    <p class="help is-danger">
                                        {{ $errors->first('title') }}
                                    </p>
                                    @endif
                                </div>
                              
                            </div>
                        </div>
                        {{-- <input type="date" data-display-mode="inline" data-is-range="true" data-close-on-select="false"> --}}
                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Book Category</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <div class="select is-dark">
                                            <select name="book_category" id="bookselector" >
                                                <option value="Book" selected>Book</option>
                                                <option vlaue="Chaptor">Chapter</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="field is-horizontal" id="chaptertitle" style="display:none">
                                    <div class="field-label">
                                        <label class="label">Chapter Title</label>
                                    </div>

                                    <div class="field-body">
                                        <div class="field">
                                            <div class="control" >
                                                    <input class="input is-dark" id="publish_detail" type="text" name="chaptertitle">                                               
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">ISSN/ISBN</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input class="input is-dark" id="issn_isbn_no" type="text"
                                                    name="issn_isbn_no" value="{{ old('issn_isbn_no') }}" onkeyup="addHyphen(this)" maxlength=9 minlength=9>
                                    </div>
                                </div>
                                <div class="field is-horizontal">
                                    <div class="field-label">
                                        <label class="label">Publication Details</label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <div class="control">
                                                    <input class="input is-dark" id="publish_detail" type="text" name="publish_detail">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Authorship</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <div class="select is-dark">
                                            <select name="authorship">
                                                <option value="First Author">First Author</option>
                                                <option vlaue="Second Author">Second Author</option>
                                                <option vlaue="Thrid Author">Third Author</option>
                                            </select>
                                        </div>
                                    </div>
                                    @if ($errors->has('authorship'))
                                        <p class="help is-danger">
                                            {{ $errors->first('authorship') }}
                                        </p>
                                    @endif  
                                </div>
                                <div class="field is-horizontal">
                                    <div class="field-label">
                                        <label class="label">Publish Date</label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <div class="control">
                                                <input class="input is-dark" id="issn_isbn_no" type="number"
                                                    name="date" value="{{ old('date') }}" placeholder="Date" min=1 max=31>
                                            </div>   
                                        </div>
                                        @if ($errors->has('date'))
                                        <p class="help is-danger">
                                            {{ $errors->first('date') }}
                                        </p>
                                        @endif
                                        <div class="field">
                                            <div class="control">
                                                <input class="input is-dark" id="issn_isbn_no" type="number"
                                                    name="month" value="{{ old('month') }}" placeholder="Month" min=1 max=12>
                                            </div>   
                                        </div>
                                        @if ($errors->has('month'))
                                        <p class="help is-danger">
                                            {{ $errors->first('month') }}
                                        </p>
                                        @endif
                                        <div class="field">
                                            <div class="control">
                                                <input class="input is-dark" id="issn_isbn_no" type="number"
                                                    name="year" value="{{ old('year') }}" placeholder="Year" min=2010 max=2025>
                                            </div>   
                                        </div>
                                        @if ($errors->has('year'))
                                        <p class="help is-danger">
                                            {{ $errors->first('year') }}
                                        </p>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>        
                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Bibliography</label>
                            </div>
                            <div class="field-body">
                                <div class="field is-grouped">
                                    <div class="control">
                                        <input class="input is-dark" id="vol" type="text" name="vol"
                                            placeholder="Volume No.">
                                    </div>
                                    <div class="control">
                                        <input class="input is-dark" id="issue" type="text" name="issue"
                                            placeholder="Issue No.">
                                    </div>
                                    <div class="control">
                                        <input class="input is-dark" id="page" type="text" name="page"
                                            placeholder="Page No.">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">URL</label>
                            </div>
                            <div class="field-body">
                                <div class="field is-grouped">
                                    <div class="control">
                                        <input class="input is-dark" id="url" type="text" name="url" placeholder="">
                                    </div>
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
                        {{-- <div class="field is-horizontal" v-show="cat === 'journal'">
                            <div class="field-label">
                                <label class="label">Impact Factor</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input class="input is-dark" id="impact_factor" type="text"
                                            name="impact_factor" value="{{ old('impact_factor') }}">
                                    </div>

                                </div>
                            </div>
                        </div> --}}
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