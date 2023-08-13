<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

//    --------------------- Company / ngo / bank / mfi registration view ---------------------

    public function index(){
        return view("super-admin.admin-content.registration.index");
    }

//    --------------------- Company / ngo / bank / mfi registration view ---------------------
//
//    --------------------- Company / ngo / bank / mfi registration store ---------------------


    public function store(Request $request){

        $inputs = \request()->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
            'company_logo' => 'required|mimes:jpeg,jpg,png',
            'role' => 'required',
        ]);

        $inputs['password'] = Hash::make(\request('password'));

        if (request('company_logo')) {
            $inputs['company_logo'] = \request('company_logo')->store('images');
        }

        auth()->user()->create($inputs);
        session()->flash('register','Registration process completed successfully');
        return back();

    }

//    --------------------- Company / ngo / bank / mfi registration store ---------------------

}
