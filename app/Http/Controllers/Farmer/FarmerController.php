<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;
use App\Models\Firm;
use App\Models\Insured;
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


//    --------------- view registered Cattle ---------------

    public function view_registered_cattle_with_farm($id)
    {

        $farm = Firm::findOrFail($id);

        if (auth()->user()->role == "f") {
            if ($farm->user_id != auth()->user()->id) {
                return "Farm authentication failed";
            }
        }

        if (auth()->user()->role == "f") {
            $cattle_list = auth()->user()->cattleRegister()->where('farm', $id)->get();
        } else {
            $cattle_list = CattleRegistration::where('farm', $id)->get();

        }


        return view('farmer.admin-content.cattle_register.view_cattles', compact('cattle_list'));
    }

//    --------------- view registered Cattle ---------------

//    --------------- view registered Cattle Single ---------------

    public function view_registered_cattle_single($id)
    {
        $cattle = auth()->user()->cattleRegister()->where('id', $id)->first();

        if ($cattle != null) {
            return view('farmer.admin-content.cattle_register.view_single_cattle_info', compact('cattle'));
        } else {
            return "Information does not exists";
        }


//        $cattle_list = auth()->user()->cattleRegister()->get();
//        return view('farmer.admin-content.cattle_register.view_cattles', compact('cattle_list'));
    }

//    --------------- view registered Cattle Single ---------------

//    --------------- Insurance Packages search by company offers ---------------

    public function company_insurance_packages()
    {
        $cattle_list = auth()->user()->cattleRegister()->where('insured_by', 0)->where('insurance_status', 0)->get();
        return view('farmer.admin-content.insurance_packages.index', compact('cattle_list'));
    }

    public function company_insurance_packages_post()
    {


        $inputs = \request()->validate([
            'cattle_info' => 'required',
            'insurance_period' => 'required',
        ]);


//        -------------------------------------- Checking if the animal is already insured ---------------------------------------------

        if (Insured::where('cattle_id', \request('cattle_info'))->count() > 0) {
            session()->flash('insured', "The animal is already insured");
            return back();
        }

//        -------------------------------------- Checking if the animal is already insured ---------------------------------------------

//    --------------- Insurance Packages search by company offers ---------------


        $cattle_info = auth()->user()->cattleRegister()->where('insured_by', 0)->where('insurance_status', 0)->where('id', \request('cattle_info'))->first();


        if (!$cattle_info == null) {
            $packages = Package::where('insurance_period', '=', \request('insurance_period'))->get();


            return view('farmer.admin-content.insurance_packages.result', compact('packages', 'cattle_info'));
        } else {
            return "Not Applicable for the operation";
        }

//    --------------- Insurance Packages search by company offers ---------------


    }


    public function company_insurance_packages_single($package_id, $cattle_info)
    {

        $cattle_info = auth()->user()->cattleRegister()->where('insured_by', 0)->where('insurance_status', 0)->where('id', $cattle_info)->first();


        if (!$cattle_info == null) {
            if ($cattle_info->user_id == auth()->user()->id) {
                $package = Package::findOrFail($package_id);
                $company = User::where('id', $package->user_id)->first();
                return view("farmer.admin-content.insurance_packages.single-result", compact('cattle_info', 'package', 'company'));
            } else {
                return "Invalid request";
            }
        } else {
            return "Invalid Information";
        }


    }

//    --------------- View insurance Package by company offers ---------------

//    --------------- Insurance History ---------------


    public function insurance_history()
    {
        $insurance_history = auth()->user()->insuranceHistory()->where('status', 'Processing')->orWhere('status', 'Complete')->get();
        return view("farmer.admin-content.insurance_payment_history.view", compact('insurance_history'));
    }


//    --------------- Insurance History ---------------

//    --------------- Cattle registration verification reports ---------------

    public function cattle_reg_ver_reports()
    {
        $cattle_reg_verification_reports = auth()->user()->cattle_registration_verification_report()->orderBy('id', 'desc')->get();
        return view("farmer.admin-content.cattle_reg_verification_reports.view", compact('cattle_reg_verification_reports'));
    }

//    --------------- Cattle registration verification reports ---------------


}
