<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyRegistrationController extends Controller
{

// ------------------------------------- company registration -------------------------------------


    public function index()
    {
        return view("auth.register_company");
    }

    public function registration(Request $request)
    {

        $inputs = \request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'unique:users'],
//            'company_type' => 'required',
            'company_plan' => 'required'
        ]);

        $inputs['role'] = "c";
        $inputs['password'] = Hash::make($inputs['password']);

// ------------------------------------- working state -------------------------------------


        if ($inputs['company_plan'] == "plan_1") {
            $inputs['company_type'] = "Agritech Company";
        } elseif ($inputs['company_plan'] == "plan_2") {
            $inputs['company_type'] = "Insurance Company";
        } else {
            return "bypassed";
        }


        $user = User::create($inputs);

        Permission::create([
            'user_id' => $user->id,
            'role' => 'c',
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->route("home");
        }


// ------------------------------------- working state -------------------------------------


    }

// ------------------------------------- company registration -------------------------------------

}
