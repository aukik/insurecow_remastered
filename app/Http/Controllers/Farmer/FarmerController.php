<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;
use App\Models\Package;
use App\Models\User;
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


        $inputs = \request()->validate([
            'cattle_info' => 'required',
            'insurance_period' => 'required',
        ]);


//        return $inputs['cattle_info'];

        $cattle_info = auth()->user()->cattleRegister()->where('insured_by', 0)->where('insurance_status', 0)->where('id', \request('cattle_info'))->first();


        if (!$cattle_info == null) {
            $packages = Package::where('insurance_period', '=', \request('insurance_period'))->get();


            return view('farmer.admin-content.insurance_packages.result', compact('packages', 'cattle_info','user'));
        } else {
            return "Not Applicable for the operation";
        }


    }

//    --------------- Insurance Packages search by company offers ---------------


//    --------------- View insurance Package by company offers ---------------
    public function company_insurance_packages_single($package_id, $cattle_info)
    {

        $cattle_info = auth()->user()->cattleRegister()->where('insured_by', 0)->where('insurance_status', 0)->where('id', $cattle_info)->first();


        if (!$cattle_info == null){
            if ($cattle_info->id == auth()->user()->id) {
                $package = Package::findOrFail($package_id);
                $company = User::where('id',$package->user_id)->first();
                return view("farmer.admin-content.insurance_packages.single-result", compact('cattle_info', 'package','company'));
            } else {
                return "Invalid request";
            }
        }else{
            return "Invalid Information";
        }



    }

//    --------------- View insurance Package by company offers ---------------


}
