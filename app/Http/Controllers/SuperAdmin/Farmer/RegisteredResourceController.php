<?php

namespace App\Http\Controllers\SuperAdmin\Farmer;

use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;
use App\Models\User;
use Illuminate\Http\Request;

class RegisteredResourceController extends Controller
{
    public function cattle_list($id)
    {
        $user = User::findOrFail($id);
        $cattle_list = User::findOrFail($id)->cattleRegister;
        return view("super-admin.admin-content.farmer.cattle_register.view_cattles", compact('cattle_list', 'user'));
    }


    //    --------------- view registered Cattle Single ---------------

    public function view_registered_cattle_single($id)
    {
        $cattle = CattleRegistration::where('id', $id)->first();

        if ($cattle != null) {
            return view('super-admin.admin-content.farmer.cattle_register.view_single_cattle_info', compact('cattle'));
        } else {
            return "Information does not exists";
        }


//        $cattle_list = auth()->user()->cattleRegister()->get();
//        return view('farmer.admin-content.cattle_register.view_cattles', compact('cattle_list'));
    }

//    --------------- view registered Cattle Single ---------------
}
