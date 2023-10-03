<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
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
            'phone' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'address' => 'required',
            'company_logo' => 'required|mimes:jpeg,jpg,png',
            'role' => 'required',
        ]);

        if($request['password'] !== $request['confirm_password']){
            session()->flash('pass_error','Passwords do not match! Please make sure they are identical.');
        }else{
            $inputs['password'] = Hash::make(\request('password'));

            if (request('company_logo')) {
                $inputs['company_logo'] = \request('company_logo')->store('images');
            }

            $registered_user = auth()->user()->create($inputs);

            Permission::create([
                'user_id' => $registered_user->id,
                'role' => $inputs['role']
            ]);

            session()->flash('register','Registration process completed successfully');
        }
        return back();


    }

//    --------------------- Company / ngo / bank / mfi registration store ---------------------

}
