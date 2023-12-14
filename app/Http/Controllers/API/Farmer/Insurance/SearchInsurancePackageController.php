<?php

namespace App\Http\Controllers\API\Farmer\Insurance;

use App\Http\Controllers\Controller;
use App\Models\Insured;
use App\Models\Package;

class SearchInsurancePackageController extends Controller
{
    public function company_insurance_packages_post()
    {

        $inputs = \request()->validate([
            'cattle_info' => 'required',
            'insurance_period' => 'required',
        ]);


//        -------------------------------------- Checking if the animal is already insured ---------------------------------------------

        if (Insured::where('cattle_id', \request('cattle_info'))->count() > 0) {
            return response()->json([
                'message' => "The animal is already insured"
            ]);
        }

//        -------------------------------------- Checking if the animal is already insured ---------------------------------------------

//    --------------- Insurance Packages search by company offers ---------------


        $cattle_info = auth()->user()->cattleRegister()->where('id', \request('cattle_info'))->first();


        if (!$cattle_info == null) {
            $packages = Package::where('insurance_period', '=', \request('insurance_period'))->get();


            return response()->json([
                'packages' => $packages
            ]);

        } else {
            return "Not Applicable for the operation";
        }

//    --------------- Insurance Packages search by company offers ---------------


    }
}
