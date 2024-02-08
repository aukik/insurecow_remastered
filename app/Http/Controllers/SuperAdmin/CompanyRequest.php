<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyRequest extends Controller
{
    public function index()
    {
        $users = User::where('role','c')->get();

        return view("super-admin.admin-content.company-request.index", compact('users'));
    }

    public function history()
    {
        $users = User::all();
        return view("super-admin.admin-content.history.index", compact('users'));
    }

    public function company_history()
    {
        $users = User::where('company_id', auth()->user()->id)->get();
        return view("company.admin-content.enlisted-permission.index", compact('users'));
    }

//    ----------------------------- Registered Resources -----------------------------


    public function registered_companies()
    {
        $users = User::where('role', 'c')->get();
        return view("super-admin.admin-content.registered_resources.company", compact('users'));
    }

    public function farmers($id)
    {
        $user = User::findOrFail($id);
        $users = User::where('company_id', $id)->where('role', 'f')->get();
        return view("super-admin.admin-content.registered_resources.farmer", compact('users', 'user'));
    }


    public function all_farmers()
    {
        if (auth()->user()->role == "c") {
            $users = User::where('role', 'f')->where('company_id', auth()->user()->id)->get();
            return view("company.admin-content.registered_resources.farmer", compact('users'));

        } else {
            $users = User::where('role', 'f')->get();
            return view("super-admin.admin-content.registered_resources.farmer", compact('users'));
        }

    }


    public function cattle_list($id)
    {
        $user = User::findOrFail($id);
        $cattle_list = User::findOrFail($id)->cattleRegister;
        return view("farmer.admin-content.cattle_register.view_cattles", compact('cattle_list', 'user'));
    }


//    ----------------------------- Registered Resources -----------------------------

}
