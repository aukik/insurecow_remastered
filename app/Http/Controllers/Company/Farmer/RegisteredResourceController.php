<?php

namespace App\Http\Controllers\Company\Farmer;

use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;
use App\Models\User;
use Illuminate\Http\Request;

class RegisteredResourceController extends Controller
{
    public function cattle_list($id)
    {
        $user = User::findOrFail($id);

        if ($user->company_id != auth()->user()->id) {
            return "This cattle information is not belongs to this company";
        }

        $cattle_list = User::findOrFail($id)->cattleRegister;
        return view("company.admin-content.farmer.cattle_register.view_cattles", compact('cattle_list', 'user'));
    }


    //    --------------- view registered Cattle Single ---------------

    public function view_registered_cattle_single($id)
    {
        $cattle = CattleRegistration::find($id);

        if ($cattle) {
            $user = User::find($cattle->user_id);

            if (!$user) {
                return "User information not found";
            }

            if ($user->company_id != auth()->user()->id) {
                return "Cattle information does not belong to this company";
            }

            return view('company.admin-content.farmer.cattle_register.view_single_cattle_info', compact('cattle'));
        } else {
            return "Cattle information not found";
        }

    }

//    --------------- view registered Cattle Single ---------------
}
