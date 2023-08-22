<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;
use App\Models\Package;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
    public function index()
    {
        return view('farmer.admin-content.dashboard.index');
    }

//    --------------- view registered Cattle ---------------

    public function view_registered_cattle()
    {
        $cattle_list = auth()->user()->cattleRegister()->get();
        return view('farmer.admin-content.cattle_register.view_cattles', compact('cattle_list'));
    }

//    --------------- view registered Cattle ---------------

//    --------------- Insurance Packages search by company offers ---------------

    public function company_insurance_packages()
    {
        $cattle_list = auth()->user()->cattleRegister()->where('insured_by', 0)->where('insurance_status', 0)->get();
        return view('farmer.admin-content.insurance_packages.index', compact('cattle_list'));
    }

    public function company_insurance_packages_post()
    {
//        $packages = Package::all();

        $cattle_info = auth()->user()->cattleRegister()->where('insured_by', 0)->where('insurance_status', 0)->where('id', \request('cattle_info'))->first();


        if (!$cattle_info == null) {
            $packages = Package::where('lowest_Amount', '<=', $cattle_info->current_price)->where('highest_Amount', '>=', $cattle_info->current_price)->where('insurance_period', '=', \request('insurance_period'))->get();

            return view('farmer.admin-content.insurance_packages.result', compact('packages'));


        }


    }

//    --------------- Insurance Packages search by company offers ---------------


}
