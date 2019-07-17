<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function username()
    {   
        // $identity  = request()->get('fac_id');
        // $fieldName = 'fac_id';
        // request()->merge([$fieldName => $identity]);
        // return $fieldName;
        return 'fac_id';
    }
    /**
     * Validate the user login.
     * @param Request $request
     */
    protected function validateLogin(Request $request)
    {
        $this->validate(
            $request,
            [
                'fac_id' => 'required|string',
                'password' => 'required|string',
            ],
            [
                'fac_id.required' => 'fac_id is required',
                'password.required' => 'Password is required',
            ]
        );
    }

     /**
     * Where to redirect users after login.
     *
     */
    protected function redirectTo()
    {   

        return 'profile/'.Auth::user()->slug;

    }

    
}
