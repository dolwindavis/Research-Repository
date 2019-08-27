<?php

namespace App\Http\Controllers;

use App\Upload;
use App\Department;
use App\ResearchProject;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ResearchProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $departments = Department::all();
        return view('researches.view',compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'title' => 'required | max:255',
            'research_category' =>'required',
            'project_code' =>'required',
            'department_id' => 'required',
            'user_role' => 'required',
            'duration' =>'required',
            'amount' => 'required',
            'agency' =>'required',
            'status' => 'required',
        ]);
        
        $request->request->add(['fac_id' => Auth::user()->id,
                                'slug' => Str::slug($request->title.$request->project_code, '-')]);

        DB::transaction(function() use($request){

            $research=ResearchProject::create($request->all());

            $upload = new Upload();

            if(Input::hasFile('upload')){
            
                $file = Input::file('upload');
                $info = pathinfo(storage_path().$file->getClientOriginalName());
                $ext = $info['extension'];
                $title = Str::slug($request->title, '-');
                $file->move(public_path().'/uploads/',date('m-d-Y_H-i-s').'_'.$title.'.'.$ext);

                $upload->filename =date('m-d-Y_H-i-s').'_'.$title.'.'.$ext; 

                $upload->category = "Project";
                $upload->work_id = $research->id;
                $upload->save();
            }
            
        });
        
        return redirect('/profile/'.Auth::user()->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ResearchProject  $researchProject
     * @return \Illuminate\Http\Response
     */
    public function show(ResearchProject $researchProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ResearchProject  $researchProject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $research = ResearchProject::findOrFail($id);

        $departments = Department::all();
        return view('researches.edit',compact('research','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ResearchProject  $researchProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $validatedData = $request->validate([
            'title' => 'required | max:255',
            'research_category' =>'required',
            'project_code' =>'required',
            'department_id' => 'required',
            'user_role' => 'required',
            'duration' =>'required',
            'amount' => 'required',
            'agency' =>'required',
            'status' => 'required',
        ]);
        
        $request->request->add(['fac_id' => Auth::user()->id,
                                'slug' => Str::slug($request->title.$request->project_code, '-')]);

        DB::transaction(function() use($request,$id){

            $research = ResearchProject::findOrFail($id);

            $research->fill($request->all());

            $research->save();

            if(Input::hasFile('upload')){
                
                $upload = Upload::where('work_id',$id)->first();
                $file = Input::file('upload');

                $info = pathinfo(storage_path().$file->getClientOriginalName());
                $ext = $info['extension'];
                $title = Str::slug($request->title, '-');
                $file->move(public_path().'/uploads/',date('m-d-Y_H-i-s').'_'.$title.'.'.$ext);

                $upload->filename =date('m-d-Y_H-i-s').'_'.$title.'.'.$ext;

                $upload->category = "Project";
                $upload->work_id = $research->id;
                $upload->save();
            }
            
        });
        
        return redirect('/profile/'.Auth::user()->slug); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ResearchProject  $researchProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResearchProject $researchProject)
    {
        //
    }
}
