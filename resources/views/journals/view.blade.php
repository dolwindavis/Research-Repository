@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-marginless is-centered">
        <div class="column is-12">
            <div class="form-card">
                <div class="form-head">
                    <div class="form-icon"></div>
                    <div class="form-name">
                        <h2>Journal Registration</h2>
                    </div>
                </div>
                <div class="form-body">
                    @if($journal->title == null )
                        <form action="/journals" method="POST" enctype="multipart/form-data">
                    @else
                        <form action="{{url('/journals/'.$journal->id) }} " method="POST" enctype="multipart/form-data">
                        @method('PUT')
                    @endif
                        @csrf
                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Title</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input class="input is-dark" id="title" type="text" name="title"
                                            value="{{ $journal->title == null?old('title'):$journal->title }}" required autofocus>
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
                                <label class="label">Journal Category</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <div class="select is-dark">
                                            <select name="journal_category" v-model="cat">
                                                @foreach($data['journalcategory'] as $category)
                                                    @if($journal->title != null)
                                                        @if($journal->journal_category == $category->id)
                                                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                                        @else
                                                            <option value="{{ $category->id }}" >{{ $category->name }}</option>
                                                                {{--@if($journal->journal_category == "Journal")
                                                                    <option value="Journal" selected>Journal</option>
                                                                    <option vlaue="Conference Proceeding">Conference Proceeding</option>
                                                                    <option vlaue="Newsletter">Newsletter</option>
                                                                @elseif($journal->journal_category == "Conference Proceeding")
                                                                    <option value="Journal">Journal</option>
                                                                    <option vlaue="Conference Proceeding" selected>Conference Proceeding</option>
                                                                    <option vlaue="Newsletter">Newsletter</option>
                                                                @elseif($journal->journal_category == "Newsletter")
                                                                    <option value="Journal">Journal</option>
                                                                    <option vlaue="Conference Proceeding" selected>Conference Proceeding</option>
                                                                    <option vlaue="Newsletter" selected>Newsletter</option>--}}
                                                        @endif
                                                    @else
                                                    <!-- <option value="Journal" selected>Journal</option>
                                                    <option vlaue="Conference Proceeding">Conference Proceeding</option>
                                                    <option vlaue="Newsletter">Newsletter</option> -->
                                                        <option value="{{ $category->id }}" >{{ $category->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @if ($errors->has('journal_category'))
                                            <p class="help is-danger">
                                            {{ $errors->first('journal_category') }}
                                            </p>
                                    @endif
                                </div>
                                <div class="field is-horizontal">
                                    <div class="field-label">
                                        <label class="label">Journal Name</label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <div class="control">
                                                <input class="input is-dark"  type="text"
                                                    name="journalname" value="{{ ($journal->title == null)?old('journalname'):$journal->journal_name }}">
                                            </div>
                                            @if ($errors->has('journalname'))
                                                <p class="help is-danger">
                                                {{ $errors->first('journalname') }}
                                                </p>
                                            @endif
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
                                                    name="issn_isbn_no" value="{{ ($journal->title == null)?old('issn_isbn_no'):$journal->issn_isbn_no }}" onkeyup="addHyphen(this)" maxlength=9 minlength=9>
                                    </div>
                                    @if ($errors->has('issn_isbn_no'))
                                        <p class="help is-danger">
                                            {{ $errors->first('issn_isbn_no') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="field is-horizontal">
                                    <div class="field-label">
                                        <label class="label">Category</label>
                                    </div>

                                    <div class="field-body">
                                        <div class="field">
                                            <div class="control">
                                                <div class="select is-dark">
                                                    <select name="category">
                                                    @foreach($data['journaltype'] as $type)
                                                    @if($journal->title != null )
                                                        @if($journal->category == $type->id)
                                                            <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                                                        @else
                                                            <option value="{{ $type->id }}" >{{ $type->name }}</option>
                                                       {{-- @if($journal->category == "National")
                                                            <option value="National" selected>National</option>
                                                            <option vlaue="International">Inter National</option>
                                                        @elseif($journal->category == "International")
                                                            <option value="National">National</option>
                                                            <option vlaue="International" selected>Inter National</option>--}}
                                                        @endif
                                                    @else
                                                        <!-- <option value="National">National</option>
                                                        <option vlaue="International">Inter National</option> -->
                                                        <option value="{{ $type->id }}">{{ $type->name}}</option>
                                                    @endif
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            @if ($errors->has('category'))
                                                <p class="help is-danger">
                                                {{ $errors->first('category') }}
                                                </p>
                                            @endif
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
                                                @foreach($data['authorship'] as $author)   
                                                @if($journal->title != null )
                                                    @if($journal->authorship == $author->id)
                                                        <option value="{{ $author->id }}" selected>{{ $author->name }}</option>
                                                    @else
                                                        <option value="{{ $author->id }}" >{{ $author->name }}</option>
                                                        {{--@if($journal->authorship =="First Author") 
                                                            <option value="First Author" selected>First Author</option>
                                                            <option vlaue="Second Author">Second Author</option>
                                                            <option vlaue="Thrid Author">Third Author</option>
                                                        @elseif($journal->authorship =="Second Author") 
                                                            <option value="First Author">First Author</option>
                                                            <option vlaue="Second Author" selected>Second Author</option>
                                                            <option vlaue="Thrid Author">Third Author</option>
                                                        @elseif($journal->authorship =="Third Author") 
                                                            <option value="First Author">First Author</option>
                                                            <option vlaue="Second Author">Second Author</option>
                                                            <option vlaue="Thrid Author" selected>Third Author</option>--}}
                                                    @endif
                                                @else
                                                    <!-- <option value="First Author">First Author</option>
                                                    <option vlaue="Second Author">Second Author</option>
                                                    <option vlaue="Thrid Author">Third Author</option> -->
                                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                                @endif
                                                @endforeach
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
                                                    name="date" value="{{ ($journal->title == null)?old('date'):$journal->date}}" placeholder="Date" min=1 max=31>
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
                                                    name="month" value="{{ ($journal->title == null)?old('month'):$journal->month }}" placeholder="Month" min=1 max=12>
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
                                                    name="year" value="{{ ($journal->title == null)?old('year'):$journal->year }}" placeholder="Year" min=2010 max=2025>
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
                                            placeholder="Volume No." value="{{ ($journal->title == null)?old('vol'):$journal->bibliography_vol }}">
                                    </div>
                                    @if ($errors->has('vol'))
                                        <p class="help is-danger">
                                            {{ $errors->first('vol') }}
                                        </p>
                                    @endif
                                    <div class="control">
                                        <input class="input is-dark" id="issue" type="text" name="issue"
                                            placeholder="Issue No." value="{{  ($journal->title == null)?old('issue'):$journal->bibliography_issue}}">
                                    </div>
                                    @if ($errors->has('issue'))
                                        <p class="help is-danger">
                                            {{ $errors->first('issue') }}
                                        </p>
                                    @endif
                                    <div class="control">
                                        <input class="input is-dark" id="page" type="text" name="page"
                                            placeholder="Page No." value="{{  ($journal->title == null)?old('page'):$journal->bibliography_pages }}">
                                    </div>
                                    @if ($errors->has('page'))
                                        <p class="help is-danger">
                                            {{ $errors->first('page') }}
                                        </p>
                                    @endif
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
                                        <input class="input is-dark" id="url" type="text" name="url" placeholder="URL" value="{{ ($journal->title == null)?old('url'):$journal->upload->url}}">
                                    </div>
                                    @if ($errors->has('url'))
                                        <p class="help is-danger">
                                            {{ $errors->first('url') }}
                                        </p>
                                    @endif
                                    <div class="field">
                                        <div class="control">
                                            <div class="file is-right is-info ">
                                                <label class="file-label ">
                                                    <input class="file-input " type="file" name="upload" value="{{ old('upload') }}">
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
                                    @if ($errors->has('upload'))
                                        <p class="help is-danger">
                                            {{ $errors->first('upload') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="field is-horizontal" v-show="cat === 'journal'">
                            <div class="field-label">
                                <label class="label">Impact Factor</label>
                            </div>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input class="input is-dark" id="impact_factor" type="text"
                                            name="impact_factor" value="{{ ($journal->title == null)?old('impact_factor'):$journal->impact_factor}}">
                                    </div>
                                    @if ($errors->has('impact_factor'))
                                        <p class="help is-danger">
                                            {{ $errors->first('impact_factor') }}
                                        </p>
                                    @endif
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
                                <a href="{{ url('/') }}">
                                    <button type="button" class="button">
                                        Cancel
                                    </button>
                                </a>
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