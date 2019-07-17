<?php

namespace App\Http\Controllers;

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

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }


    public function index(Request $request)
    {   
        $departments = Department::all();

        $showrepository = new ShowRepository();

        if(!$request->category){
     
            $repository = $showrepository->makeAuthRepository();

        }
        elseif($request->category == 'journals'){

            $repository =$showrepository->makeJournalsRepository();

        }
        elseif($request->category == 'books'){

            $repository =$showrepository->makeBooksRepository();

        }

        $repositorycount = $showrepository->countRepository();

        
        // dd($repositorycount);
        return view('profile.view',compact('repository','repositorycount','departments'));
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
