<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Department;
use Illuminate\Support\Str;
use App\Rules\PasswordCheck;
use Illuminate\Http\Request;
use App\Helpers\ShowRepository;
use Illuminate\Validation\Rule;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified'])->except('index');
    }


    public function index(Request $request,$slug)
    {   
        $departments = Department::all();
        $user= null;
        if(Auth::user() && Auth::user()->slug == $slug ){

            $user=Auth::user();

        }
        else{

            
            $user=User::where('slug',$slug)->first();

            if($user == null){

                Alert::warning('warning','No Faculty Profile');
                return back();

            }
        }
        
            $showrepository = new ShowRepository();

            if(!$request->category){
        
                $repository = $showrepository->makeAuthRepository($user);

            }
            elseif($request->category == 'journals'){

                $repository =$showrepository->makeJournalsRepository($user);

            }
            elseif($request->category == 'books'){

                $repository =$showrepository->makeBooksRepository($user);

            }
            elseif($request->category == 'research'){

                $repository =$showrepository->makeResearchRepository($user);

            }
            
        $repositorycount = $showrepository->countRepository($user);

        
        // dd($repositorycount);
        return view('profile.view',compact('repository','repositorycount','departments','slug','user'));
    }


    public function update(Request $request)
    { 

        $user=Auth::user();

        $validatedData = $request->validate([
            
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id.'|ends_with:@kristujayanti.com',
            'facultyid' => 'required|string|max:255|unique:users,fac_id,'.$user->id,
            'department' => 'required',
            'password' => 'required|string|min:8|'

        ]);
        $request->validate([

            'passoword' => [new PasswordCheck],
        ]);
            
       $user->name = $request->name;
       $user->email = $request->email;
       $user->fac_id = $request->facultyid;
       $user->department_id = $request->department;
       $user->slug = Str::slug($request->name.$request->facultyid);

       $user->save();

       return redirect('/profile/'.$user->slug);
       
     }


}
