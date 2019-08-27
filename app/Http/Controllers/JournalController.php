<?php

namespace App\Http\Controllers;

use App\Author;
use App\Upload;
use App\Journal;
use App\Bibliography;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;


class JournalController extends Controller
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
        $journal = collect();
        $journal->title = null;
        return view('journals.view',compact('journal'));
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
            'year' => 'required|numeric',
            'category' => 'required',
            'journal_category' => 'required',
            'issn_isbn_no' => 'required|size:9',
            'impact_factor' => 'required',
            'vol' => 'numeric',
            'issue' =>'numeric',
            'page' => 'required',
            'authorship' => 'required',
            'url' => 'required_without:upload',
            'upload' => 'required_without:url',
            'journalname' => 'required'
        ]);

        DB::transaction(function() use($request){

            $journal = new Journal();

            $journal->journal_name = $request->journalname;
            $journal->title = $request->title;
            $journal->category = $request->category;
            $journal->journal_category = $request->journal_category;
            $journal->issn_isbn_no = $request->issn_isbn_no;
            $journal->impact_factor = $request->impact_factor;
            $journal->slug= Str::slug($request->title.$request->issn_isbn_no, '-');
            $journal->faculty_id    = Auth::user()->fac_id;
            if($request->vol){$journal->bibliography_vol = $request->vol;}
            if($request->issue){$journal->bibliography_issue = $request->issue;}
            if($request->page){$journal->bibliography_pages = $request->page;}
            if($request->date){$journal->date = $request->date;}
            if($request->month){$journal->month = $request->month;}
            $journal->year=$request->year;
            $journal->authorship=$request->authorship;
            $journal->user_id=Auth::user()->id;

            $journal->save();
    

        $upload = new Upload();
            if($request->url){

                $upload->url = $request->url;

            }
            if(Input::hasFile('upload')){
            
                $file = Input::file('upload');
                $info = pathinfo(storage_path().$file->getClientOriginalName());
                $ext = $info['extension'];
                $title = Str::slug($request->title, '-');
                $file->move(public_path().'/uploads/',date('m-d-Y_H-i-s').'_'.$title.'.'.$ext);
                // $domain = $_SERVER['SERVER_NAME'];

                $upload->filename =date('m-d-Y_H-i-s').'_'.$title.'.'.$ext; 

                // $upload->filename = 'uploads/'.date('m-d-Y_H-i-s').'_'.$request->title.'.'.$ext; 
                // $path = $request->file('upload')->storeAs('upload',date('m-d-Y_H-i-s').'_'.$request->title.'.'.$ext);
            }
        $upload->category = "journal";
        $upload->work_id = $journal->id;
        $upload->save();
        
    });
        
        Alert::success('Success', 'Journal Created Succesfully');

        return redirect('/profile/'.Auth::user()->slug);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function show(Journal $journal)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function edit(Journal $journal)
    {
        $journal->upload = Upload::where('work_id',$journal->id)->first();
        return view('journals.view',compact('journal'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Journal $journal)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'year' => 'required|numeric',
            'category' => 'required',
            'journal_category' => 'required',
            'issn_isbn_no' => 'required|size:9',
            'impact_factor' => 'required',
            'vol' => 'numeric',
            'issue' =>'numeric',
            'page' => 'required',
            'authorship' => 'required',
            'url' => 'required_without:upload|url',
            'upload' => 'required_without:url',
        ]);

        DB::transaction(function() use($request,$journal){
        
            $journal->title = $request->title;
            $journal->category = $request->category;
            $journal->journal_category = $request->journal_category;
            $journal->issn_isbn_no = $request->issn_isbn_no;
            $journal->impact_factor = $request->impact_factor;
            $journal->slug= Str::slug($request->title.$request->issn_isbn_no, '-');
            $journal->faculty_id    = Auth::user()->fac_id;
            if($request->vol){$journal->bibliography_vol = $request->vol;}
            if($request->issue){$journal->bibliography_issue = $request->issue;}
            if($request->page){$journal->bibliography_pages = $request->page;}
            if($request->date){$journal->date = $request->date;}
            if($request->month){$journal->month = $request->month;}
            $journal->year=$request->year;
            $journal->authorship=$request->authorship;
            $journal->user_id=Auth::user()->id;

            $journal->save();

            $upload = Upload::where('work_id',$journal->id)->first();

            if($request->url){

                $upload->url = $request->url;

            }
            if(Input::hasFile('upload')){
            
                $file = Input::file('upload');
                $info = pathinfo(storage_path().$file->getClientOriginalName());
                $ext = $info['extension'];
                $title = Str::slug($request->title, '-');
                $file->move(public_path().'/uploads/',date('m-d-Y_H-i-s').'_'.$title.'.'.$ext);
                // $domain = $_SERVER['SERVER_NAME'];

                $upload->filename =date('m-d-Y_H-i-s').'_'.$title.'.'.$ext; 

                // $upload->filename = 'uploads/'.date('m-d-Y_H-i-s').'_'.$request->title.'.'.$ext; 
                // $path = $request->file('upload')->storeAs('upload',date('m-d-Y_H-i-s').'_'.$request->title.'.'.$ext);
            }
            $upload->category = "journal";
            $upload->work_id = $journal->id;
            $upload->save();

        });
        Alert::success('Update', 'Journal Updated Succesfully');

        return redirect('/profile/'.Auth::user()->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Journal $journal)
    {
        //
    }
}
