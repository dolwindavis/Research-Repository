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
                    @if($book->title == null )
                    <form action="/books" method="POST" enctype="multipart/form-data">
                    @else
                        <form action="{{url('/books/'.$book->id) }}" method="POST" enctype="multipart/form-data">
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
                                            value="{{ $book->title == null?old('title'):$book->title }}" required autofocus>
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
                                                @if($book->title != null)
                                                    @if($book->book_category == "Book")
                                                        <option value="Book" selected>Book</option>
                                                        <option value="Chapter">Chapter</option>
                                                    @elseif($book->book_category == "Chapter")
                                                        <option value="Book" >Book</option>
                                                        <option value="Chapter" selected>Chapter</option>
                                                    @endif
                                                @else
                                                    <option value="Book">Book</option>
                                                    <option value="Chapter">Chapter</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    @if ($errors->has('book_category'))
                                    <p class="help is-danger">
                                        {{ $errors->first('book_category') }}
                                    </p>
                                    @endif
                                </div>
                                @if($book->title == null)
                                    <div class="field is-horizontal" id="chaptertitle" style="display:none">
                                @else
                                    <div class="field is-horizontal" id="chaptertitle">
                                @endif
                                    <div class="field-label">
                                        <label class="label">Chapter Title</label>
                                    </div>

                                    <div class="field-body">
                                        <div class="field">
                                            <div class="control" >
                                                    <input class="input is-dark" id="publish_detail" type="text" name="chaptertitle"
                                                    value="{{ ($book->title == null)?old('chaptertitle'):$book->chapter_title }}">                                               
                                            </div>
                                            @if ($errors->has('chaptertitle'))
                                                <p class="help is-danger">
                                                    {{ $errors->first('chaptertitle') }}
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
                                                    name="issn_isbn_no" value="{{ ($book->title == null)?old('issn_isbn_no'):$book->issn_isbn_no }}" onkeyup="addHyphen(this)" maxlength=9 minlength=9>
                                    </div>
                                    @if ($errors->has('issn_isbn_no'))
                                        <p class="help is-danger">
                                            {{ $errors->first('issn_isbn_no') }}
                                        </p>
                                    @endif
                                </div>
                                <div class="field is-horizontal">
                                    <div class="field-label">
                                        <label class="label">Publication Details</label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <div class="control">
                                                    <input class="input is-dark" id="publish_detail" type="text" name="publish_detail" value="{{ ($book->title == null)?old('publish_details'):$book->publication_details }}">
                                            </div>
                                            @if ($errors->has('publish_detail'))
                                                <p class="help is-danger">
                                                    {{ $errors->first('publish_detail') }}
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
                                                @if($book->title != null )
                                                    @if($book->authorship == $author->id)
                                                        <option value="{{ $author->id }}" selected>{{ $author->name }}</option>
                                                    @else
                                                        <option value="{{ $author->id }}" >{{ $author->name }}</option>
                                                        {{--@if($book->authorship =="First Author") 
                                                            <option value="First Author" selected>First Author</option>
                                                            <option vlaue="Second Author">Second Author</option>
                                                            <option vlaue="Thrid Author">Third Author</option>
                                                        @elseif($book->authorship =="Second Author") 
                                                            <option value="First Author">First Author</option>
                                                            <option vlaue="Second Author" selected>Second Author</option>
                                                            <option vlaue="Thrid Author">Third Author</option>
                                                        @elseif($book->authorship =="Third Author") 
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
                                                    name="date" value="{{ ($book->title == null)?old('date'):$book->date}}" placeholder="Date" min=1 max=31>
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
                                                    name="month" value="{{ ($book->title == null)?old('month'):$book->month }}" placeholder="Month" min=1 max=12>
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
                                                    name="year" value="{{ ($book->title == null)?old('year'):$book->year }}" placeholder="Year" min=2010 max=2025>
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
                                            placeholder="Volume No." value="{{ ($book->title == null)?old('vol'):$book->bibliography_vol }}">
                                    </div>
                                    @if ($errors->has('vol'))
                                        <p class="help is-danger">
                                            {{ $errors->first('vol') }}
                                        </p>
                                    @endif
                                    <div class="control">
                                        <input class="input is-dark" id="issue" type="text" name="issue"
                                            placeholder="Issue No." value="{{  ($book->title == null)?old('issue'):$book->bibliography_issue}}">
                                    </div>
                                    @if ($errors->has('issue'))
                                        <p class="help is-danger">
                                            {{ $errors->first('issue') }}
                                        </p>
                                    @endif
                                    <div class="control">
                                        <input class="input is-dark" id="page" type="text" name="page"
                                            placeholder="Page No." value="{{  ($book->title == null)?old('page'):$book->bibliography_pages }}">
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
                                        <input class="input is-dark" id="url" type="text" name="url" placeholder="" value="{{ ($book->title == null)?old('url'):$book->upload->url}}">
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