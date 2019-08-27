<?php

namespace App\Http\Controllers;

use App\Book;
use App\User;
use App\Journal;
use App\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\ShowRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    
    public function index(Request $request)
    {
        $showrepository = new ShowRepository();

        $repositorycount =  $showrepository->totalRepositoryCount();

        $departments = Department::all();
        $department =null;
        $faculty = null;

        if(!$request->department && !$request->faculty){

            
            $repository =$showrepository->repository();

            $faculties =User::where('role','faculty')->get();

        }
        if($request->department && $request->faculty){

            $repository =$showrepository->facultyRepository($request->faculty);

            $faculties =User::where('department_id',$request->department)->get();

            $department = $request->department;
            $faculty =$request->faculty;

        }
        if($request->department){

            $repository =$showrepository->departmentRepository($request->department);

            $faculties =User::where('department_id',$request->department)->get();

            $department = $request->department;

        }
        if($request->faculty){

            $repository =$showrepository->facultyRepository($request->faculty);

            $faculties =User::all();

            $faculty =$request->faculty;

        }
        
        return view('admin.view',compact('repository','repositorycount','departments','faculties','department','faculty'));
    
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'facultyid' => ['required', 'string','max:255', 'unique:users,fac_id'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    protected function create()
    {

        return view('admin.create');
        
    }
   /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function store(Request $request)
    {
        $this->validator($request->all())->validate();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'fac_id' => $request->facultyid,
            'department_id' => Auth::user()->id,
            'password' => Hash::make($request->password),
            'slug' => Str::slug($request->name.$request->facultyid),
            'role' => 'admin'
        ]);

        return redirect('/');
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

        return view('admin.view',compact('repository','repositorycount'));
        
    }
    public function allBooks(Request $request)
    {
        $showrepository = new ShowRepository();

        $journal = Book::all();

        $publishyears=$showrepository->getPublishedYears($journal);

        $publishyears=array_unique($publishyears);

        sort($publishyears);
    
        $publishmonths = [];

        $faculty = null; 

        $bookcategory = null;

        $year=null;

        $month = null;

        $faculties =User::where('role','faculty')->get();

        $repositorycount =  $showrepository->totalRepositoryCount();

        if($request->faculty){

            $repository =$showrepository->booksFacultyRepository($request->faculty);

            $faculty =$request->faculty;

        }
        else if($request->bookcategory){

            $repository =$showrepository->booksCategoryRepository($request->bookcategory);

            $bookcategory =$request->bookcategory;

        }
        else if($request->year && !$request->month){

            $repository =$showrepository->booksYearRepository($request->year);

            $year =$request->year;

            $publishmonths=$showrepository->getBooksPublishedMonths($request->year);

            $publishmonths=array_unique($publishmonths);

            sort($publishmonths);
        
        }
        else if($request->month){

            $repository =$showrepository->booksYearMonthRepository($request->year,$request->month);

            $year =$request->year;

            $month = $request->month;

            $publishmonths=$showrepository->getBooksPublishedMonths($request->year);

            $publishmonths=array_unique($publishmonths);

            sort($publishmonths);
        
        }
        else{

        $repository =$showrepository->bookRepository();

        }


        $data = [

            'year' => $year,
            'month' => $month,
            'bookcategory' => $bookcategory,
            'faculty' => $faculty

        ];

        return view('admin.bookview',compact('repository','repositorycount','data','faculties','publishyears','publishmonths'));
        
    }

    public function allJournals(Request $request)
    {
        $showrepository = new ShowRepository();

        $journal = Journal::all();

        $publishyears=$showrepository->getPublishedYears($journal);

        $publishyears=array_unique($publishyears);

        sort($publishyears);        

        $publishmonths = [];

        $faculty = null; 

        $journalcategory = null;

        $year=null;

        $month = null;

        $category = null;

        $faculties =User::where('role','faculty')->get();

        $repositorycount =  $showrepository->totalRepositoryCount();


        if($request->faculty){

            $repository =$showrepository->journalFacultyRepository($request->faculty);

            $faculty =$request->faculty;

        }
        else if($request->journalcategory){

            $repository =$showrepository->journalCategoryRepository($request->journalcategory);

            $journalcategory =$request->journalcategory;

            
        }
        else if($request->category){

            $repository =$showrepository->categoryJournalRepository($request->category);

            $category =$request->category;

        }
        else if($request->year && !$request->month){

            $repository =$showrepository->journalYearRepository($request->year);

            $year =$request->year;

            $publishmonths=$showrepository->getPublishedMonths($request->year);

            $publishmonths=array_unique($publishmonths);

            sort($publishmonths);
        
        }
        else if($request->month){

            $repository =$showrepository->journalYearMonthRepository($request->year,$request->month);

            $year =$request->year;

            $month = $request->month;

            $publishmonths=$showrepository->getPublishedMonths($request->year);

            $publishmonths=array_unique($publishmonths);

            sort($publishmonths);
        }
        else{

            $repository =$showrepository->journalsRepository();

        }

        $data = [

            'year' => $year,
            'month' => $month,
            'journalcategory' => $journalcategory,
            'category' => $category,
            'faculty' => $faculty

        ];

        return view('admin.journalview',compact('repository','repositorycount','publishyears','publishmonths','faculties','data'));
        
    }

    public function allResearch(Request $request)
    {
        $showrepository = new ShowRepository();

        $repositorycount =  $showrepository->totalRepositoryCount();

        $faculty = null;

        $researchcategory = null;

        $agency = null;

        $status = null; 

        $faculties =User::where('role','faculty')->get();
        
        if($request->faculty){

            $repository =$showrepository->researchFacultyRepository($request->faculty);

            $faculty =$request->faculty;
        }
        elseif($request->researchcategory){


            $repository =$showrepository->researchCategoryRepository($request->researchcategory);


            $researchcategory =$request->researchcategory;
        }
        elseif($request->status){


            $repository =$showrepository->researchStatusRepository($request->status);


            $status=$request->status;
        }
        else{

            $repository =$showrepository->researchRepository();


        }

        $data = [

            'faculty' => $faculty,

            'researchcategory' => $researchcategory,

            'status' => $status

        ];

        return view('admin.researchview',compact('repository','repositorycount','faculties','data'));
        
    }


    public function allFaculties(Request $request)
    {

        $showrepository = new ShowRepository();

        $repositorycount =  $showrepository->totalRepositoryCount();

        $departments = Department::all();

        $department = null;

        if($request->department){

            $faculties = User::with('books','journals','researchprojects','departmentDetails')->whereHas('departmentDetails',function($query) use($request){
                
                $query->where('id',$request->department);

            })->where('role','faculty')->get();

            $department=$request->department;

        }
        else{

            $faculties = User::with('books','journals','researchprojects','departmentDetails')->where('role','faculty')->get();

        }


        return view('admin.faculty',compact('faculties','departments','repositorycount','department'));

    }

}
