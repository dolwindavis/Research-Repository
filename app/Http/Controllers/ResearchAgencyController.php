<?php

namespace App\Http\Controllers;

use App\ResearchAgency;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ResearchAgencyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    public function index(Request $request)
    {

        return view('admin.settings');

        
    }


    public function create()
    {
       
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'name' => 'required | max:255',
            'category_id' => 'required'

        ]);
        
        $category =ResearchAgency::create($request->all());
 
        Alert::success('Created','Research Agency Created Sucessfully');
        return redirect('/admin/settings');
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
        Alert::success('Updated','Research Activity Updated Successfully');

        return redirect('/admin/activity');
    }


    public function delete($id)
    {

       
        $research=ResearchAgency::findOrFail($id);

        $research->delete();

         Alert::error('Deleted','Research Agency Deleted Sucessfully');

        return redirect('/admin/settings');

    }
}
