<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.view');
    }


    public function departmentIndex(){

        return view('admin.department');

    }

    public function addDepartment(Request $request){


        $request->validate([

            'departmentName' => 'required',
            
        ]);

        $departmentName = $request->departmentName;

        $department =new Department;

        $department->name = $departmentName;

        $department->save();

    }
}
