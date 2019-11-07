<?php

namespace App\Http\Controllers;

use App\Upload;
use Carbon\Carbon;
use App\ResearchActivity;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\ShowRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;

class ResearchActivityController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index(Request $request)
    {
        $showrepository = new ShowRepository();

        $repositorycount =  $showrepository->totalRepositoryCount();

        if($request->from && !$request->to){

            $date = date('Y-m-d', strtotime($request->from));


            $activities = ResearchActivity::whereDate('date',$request->from)->latest()->get();

        }
        else if($request->to){

            $activities = ResearchActivity::whereBetween('date',[$request->from,$request->to])->latest()->get();

        }
        else{

        $activities = ResearchActivity::latest()->get();


        }


        return view('activities.view',compact('repositorycount','activities'));


    }


    public function create()
    {
        $showrepository = new ShowRepository();

        $repositorycount =  $showrepository->totalRepositoryCount();
        return view('activities.create')->with('repositorycount');
    }


    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'name' => 'required | max:255',
            'activity_category' =>'required| max:255',
            'activity_type' =>'required| max:255',
            'date' => 'required |date',
            'host' => 'required| max:255',
        ]);


        DB::transaction(function() use($request){

            $date = str_replace('/','-',$request->date);

            $date = Carbon::parse($date);

            $activity = new ResearchActivity;

            $activity->name = $request->name;
            $activity->activity_category = $request->activity_category;
            $activity->activity_type = $request->activity_type;
            $activity->date = $date->format('Y-m-d');
            $activity->host = $request->host;

            $activity->save();

            // $activity =ResearchActivity::create($request->all());

            $upload = new Upload();

            if(Input::hasFile('upload')){

                $file = Input::file('upload');
                $info = pathinfo(storage_path().$file->getClientOriginalName());
                $ext = $info['extension'];
                $name = Str::slug($request->name, '-');
                $file->move(public_path().'/uploads/',date('m-d-Y_H-i-s').'_'.$name.'.'.$ext);

                $upload->filename =date('m-d-Y_H-i-s').'_'.$name.'.'.$ext;

                $upload->category = "Activity";
                $upload->work_id = $activity->id;
                $upload->save();
            }


        });

        Alert::success('Created','Activity Created Sucessfully');

        return redirect('/admin/activity');
    }

    public function edit($id)
    {
        $showrepository = new ShowRepository();

        $repositorycount =  $showrepository->totalRepositoryCount();

        $researchactivity = ResearchActivity::findOrFail($id);

        return view('activities.edit',compact('repositorycount','researchactivity'));

    }

    public function update(Request $request,$id)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required | max:255',
        //     'activity_category' =>'required| max:255',
        //     'activity_type' =>'required| max:255',
        //     'date' => 'required|date',
        //     'host' => 'required| max:255',
        // ]);

        DB::transaction(function() use($request,$id){

            $activity = ResearchActivity::findOrFail($id);

            $date = str_replace('/','-',$request->date);

            $date = Carbon::parse($date);

            $activity->name = $request->name;
            $activity->activity_category = $request->activity_category;
            $activity->activity_type = $request->activity_type;
            $activity->date = $date->format('Y-m-d');
            $activity->host = $request->host;

            $activity->save();

            $upload = Upload::where('work_id',$activity->id)->first();

            if(Input::hasFile('upload')){

                $file = Input::file('upload');
                $info = pathinfo(storage_path().$file->getClientOriginalName());
                $ext = $info['extension'];
                $name = Str::slug($activity->name, '-');
                $file->move(public_path().'/uploads/',date('m-d-Y_H-i-s').'_'.$name.'.'.$ext);

                $upload->filename =date('m-d-Y_H-i-s').'_'.$name.'.'.$ext;

                $upload->category = "Activity";
                $upload->work_id = $activity->id;
                $upload->save();
            }
        });
        Alert::success('Updated','Research Activity Updated Successfully');

        return redirect('/admin/activity');
    }


    public function delete($id)
    {

        DB::transaction(function() use($id){

            $research = ResearchActivity::findOrFail($id);

            if($research!= null){

                $upload = Upload::where('work_id',$research->id)->first();

                if($upload != null){

                    $upload->delete();

                }
                $research->delete();
            }


        });

    }


}
