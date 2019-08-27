<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use App\Upload;
use App\Bibliography;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = collect();
        $book->title = null;
        return view('books.view',compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required',
            'month' =>'required|numeric',
            'year' => 'required|numeric',
            'book_category' => 'required',
            'chaptertitle' => Rule::requiredIf($request->book_category == 'chapter'),
            'issn_isbn_no' => 'required|size:9',
            'vol' => 'numeric',
            'issue' =>'numeric',
            'page' => 'string',
            'authorship' => 'required|string',
            'url' => 'required_without:upload|url',
            'upload' => 'required_without:url',
            'publish_detail' => 'required'
        ]);

        $book = new Book();

        $book->title = $request->title;
        $book->book_category = $request->book_category;
        if($request->chaptertitle){$book->chapter_title = $request->chaptertitle;}
        $book->issn_isbn_no = $request->issn_isbn_no;
        $book->publication_details = $request->publish_details;
        $book->slug= Str::slug($request->title.$request->issn_isbn_no, '-');
        $book->faculty_id    = Auth::user()->fac_id;
        if($request->vol){$book->bibliography_vol = $request->vol;}
        if($request->issue){$book->bibliography_issue = $request->issue;}
        if($request->page){$book->bibliography_pages = $request->page;}
        if($request->date){$book->date = $request->date;}
        if($request->month){$book->month = $request->month;}
        $book->year=$request->year;
        $book->authorship=$request->authorship;
        $book->user_id=Auth::user()->id;

        $book->save();

        $upload = new Upload();
            if($request->url){

                $upload->url = $request->url;

            }
            if(Input::hasFile('upload')){
            
                $file = Input::file('upload');
                $info = pathinfo(storage_path().$file->getClientOriginalName());
                $ext = $info['extension'];
                // // return $ext;
                $title = Str::slug($request->title, '-');
                $file->move(public_path().'/uploads/',date('m-d-Y_H-i-s').'_'.$title.'.'.$ext);

                $upload->filename =date('m-d-Y_H-i-s').'_'.$title.'.'.$ext; 

            }
        $upload->category = "book";
        $upload->work_id = $book->id;
        $upload->save();

        return redirect('/profile/'.Auth::user()->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $book->upload = Upload::where('work_id',$book->id)->first();
        return view('books.view',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'month' =>'required|numeric',
            'year' => 'required|numeric',
            'book_category' => 'required',
            'chaptertitle' => Rule::requiredIf($request->book_category == 'chapter'),
            'issn_isbn_no' => 'required|size:9',
            'vol' => 'numeric',
            'issue' =>'numeric',
            'page' => 'string',
            'authorship' => 'required|string',
            'url' => 'required_without:upload|url',
            'upload' => 'required_without:url',
            'publish_detail' => 'required'
        ]);
        $book->title = $request->title;
        $book->book_category = $request->book_category;
        if($request->chaptertitle){$book->chapter_title = $request->chaptertitle;}
        $book->issn_isbn_no = $request->issn_isbn_no;
        $book->publication_details = $request->publish_detail;
        $book->slug= Str::slug($request->title.$request->issn_isbn_no, '-');
        $book->faculty_id    = Auth::user()->fac_id;
        if($request->vol){$book->bibliography_vol = $request->vol;}
        if($request->issue){$book->bibliography_issue = $request->issue;}
        if($request->page){$book->bibliography_pages = $request->page;}
        if($request->date){$book->date = $request->date;}
        if($request->month){$book->month = $request->month;}
        $book->year=$request->year;
        $book->authorship=$request->authorship;
        $book->user_id=Auth::user()->id;

        $book->save();

        $upload=Upload::where('work_id',$book->id)->first();

            if($request->url){

                $upload->url = $request->url;

            }
            if(Input::hasFile('upload')){
            
                $file = Input::file('upload');
                $info = pathinfo(storage_path().$file->getClientOriginalName());
                $ext = $info['extension'];
                // // return $ext;
                $title = Str::slug($request->title, '-');
                $file->move(public_path().'/uploads/',date('m-d-Y_H-i-s').'_'.$title.'.'.$ext);

                $upload->filename =date('m-d-Y_H-i-s').'_'.$title.'.'.$ext; 

            }
        $upload->category = "book";
        $upload->work_id = $book->id;
        $upload->save();

        return redirect('/profile/'.Auth::user()->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
