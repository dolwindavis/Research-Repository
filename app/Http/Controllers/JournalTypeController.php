<?php

namespace App\Http\Controllers;

use App\JournalType;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JournalTypeController extends Controller
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
        
        
        $type =JournalType::create($request->all());
 
        Alert::success('Created','Journal type Created Sucessfully');

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
        $journal = JournalType::find($id);

        $journal->name = $request->name;

        $journal->save();

        Alert::success('Updated','Journal Type Updated Successfully');

        return redirect('/admin/settings');
    }


    public function delete($id)
    {

        $journal=JournalType::findOrFail($id);

        $journal->delete();

         Alert::error('Deleted','Journal type Deleted Sucessfully');

        return redirect('/admin/settings');
    }
}
