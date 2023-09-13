<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyRequest extends Controller
{
    public function index(){
        return view("super-admin.admin-content.company-request.index");
    }

    public function history(){
        $users = User::all();
        return view("super-admin.admin-content.history.index", compact('users'));
    }

    public function registered_companies(){
        $users = User::where('role', 'c')->get();
        return $users;
    }
}
