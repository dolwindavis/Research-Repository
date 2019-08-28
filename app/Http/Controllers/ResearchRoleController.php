<?php

namespace App\Http\Controllers;

use App\ResearchRole;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ResearchRoleController extends Controller
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
        
        ]);
        
        
        $category =ResearchRole::create($request->all());
 
        Alert::success('Created','Research role Created Sucessfully');
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

       
        $research=ResearchRole::findOrFail($id);

        $research->delete();

         Alert::error('Deleted','Research role Deleted Sucessfully');

        return redirect('/admin/settings');

    }
}
