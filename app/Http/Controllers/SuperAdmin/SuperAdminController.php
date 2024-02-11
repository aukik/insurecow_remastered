<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function profile(){
        return view('super-admin.admin-content.profile.profile');
    }

    public function delete_company_request(Request $request){
        return $request->all();


    }
}
