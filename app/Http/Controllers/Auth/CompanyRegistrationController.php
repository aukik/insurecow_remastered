<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyRegistrationController extends Controller
{

// ------------------------------------- company registration -------------------------------------


    public function index()
    {
        return view("auth.register_company");
    }

    public function registration()
    {
        $inputs = \request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'unique:users'],
            'company_type' => 'required',
            'company_plan' => 'required'
        ]);

        $inputs['role'] = "c";

// ------------------------------------- working state -------------------------------------

        User::create($inputs);

// ------------------------------------- working state -------------------------------------


        return $inputs;
    }

// ------------------------------------- company registration -------------------------------------

}
