<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

//    ------------- Package condition controller -------------


    public function package_status($id)
    {

        $package = Package::whereId($id)->first();

        if ($package->user_id == auth()->user()->id) {
            if ($package->package_status == "active") {
                $package->update([
                    'package_status' => "inactive"
                ]);
            } elseif ($package->package_status == "inactive") {
                $package->update([
                    'package_status' => "active"
                ]);
            }
        } else {
            abort(404);
        }

        session()->flash('package_status', 'Package Status Updated of package - ' . $package->package_name . ' - ' . $package->package_status);
        return back();
    }


//    ------------- Package condition controller -------------

//    ----------------------------- Registered Resources -----------------------------


    public function registered_farmers()
    {
        $users = User::where('company_id', auth()->user()->id)->get();
        return view('company.admin-content.history.index', compact('users'));
    }

    public function cattle_list($id)
    {



        $user = User::findOrFail($id);

        if ($user->company_id == auth()->user()->id){
            $cattle_list = User::findOrFail($id)->cattleRegister;
            return view("farmer.admin-content.cattle_register.view_cattles", compact('cattle_list', 'user'));
        }else{
            return "Invalid request";
        }


    }

//    ----------------------------- Registered Resources -----------------------------

}
