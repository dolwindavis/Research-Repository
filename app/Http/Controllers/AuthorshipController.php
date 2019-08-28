<?php

namespace App\Http\Controllers;

use App\Authorship;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AuthorshipController extends Controller
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
    
        
        $type =Authorship::create($request->all());
 
        Alert::success('Created','Authorship Created Sucessfully');

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

        return redirect('/admin/settings');
    }


    public function delete($id)
    {

        
        $journal=Authorship::findOrFail($id);

        $journal->delete();

        Alert::error('Deleted','Authorship Deleted Sucessfully');

        return redirect('/admin/settings');

    }
}
