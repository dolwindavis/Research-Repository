<?php

namespace App\Http\Controllers;

use App\Book;
use App\Department;
use Illuminate\Http\Request;
use App\Helpers\ShowRepository;

class AdminController extends Controller
{
    public function index()
    {
        $showrepository = new ShowRepository();

        $repositorycount =  $showrepository->totalRepositoryCount();

        $repository =$showrepository->repository();

        return view('admin.admin',compact('repository','repositorycount'));
        // dd($repositorycount);
    }

    public function departmentIndex(){

        $showrepository = new ShowRepository();

        $repositorycount =  $showrepository->totalRepositoryCount();
        $department =Department::all();

        return view('admin.department',compact('department','repositorycount'));

    }

    public function addDepartmentIndex(){

        $showrepository = new ShowRepository();

        $repositorycount =  $showrepository->totalRepositoryCount();

        $department = null;

        return view('admin.departments',compact('repositorycount','department'));

    }

    public function addDepartment(Request $request){


        $request->validate([

            'departmentName' => 'required',
            
        ]);

        $departmentName = $request->departmentName;

        $department =new Department;

        $department->name = $departmentName;

        $department->save();

        return back();

    }
    public function removeDepartment($id){

        $depatment=Department::where('id',$id)->delete();
        
        return redirect()->action(

            'AdminController@departmentIndex'
        );
        

    }
    public function editDepartment($id){

        $department=Department::where('id',$id)->first();

        $showrepository = new ShowRepository();

        $repositorycount =  $showrepository->totalRepositoryCount();

        return view('admin.departments',compact('repositorycount','department'));


    }
    public function updateDepartment(Request $request,$id){

        // dd($request->all());

        $department=Department::where('id',$id)->first();

        $department->name=$request->departmentName;

        $department->save();

        return redirect()->action(

            'AdminController@departmentIndex'
        );
    }
    public function allRepository(Request $request)
    {
        $showrepository = new ShowRepository();

        $repository =$showrepository->repository();

        $repositorycount =  $showrepository->totalRepositoryCount();

        return view('admin.admin',compact('repository','repositorycount'));
        
    }
    public function allBooks(Request $request)
    {
        $showrepository = new ShowRepository();

        $repository =$showrepository->bookRepository();

        $repositorycount =  $showrepository->totalRepositoryCount();

        return view('admin.admin',compact('repository','repositorycount'));
        
    }

    public function allJournals(Request $request)
    {
        $showrepository = new ShowRepository();

        $repository =$showrepository->journalsRepository();

        $repositorycount =  $showrepository->totalRepositoryCount();

        return view('admin.admin',compact('repository','repositorycount'));
        
    }

    public function allResearch(Request $request)
    {
        $showrepository = new ShowRepository();

        $repository =$showrepository->researchRepository();

        $repositorycount =  $showrepository->totalRepositoryCount();

        return view('admin.admin',compact('repository','repositorycount'));
        
    }

}
