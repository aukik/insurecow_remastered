<?php

namespace App\Http\Controllers\Company\Bulk_insurance;

use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;
use App\Models\InsuranceRequest;
use App\Models\Insured;
use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Bulk_insurance_controller extends Controller
{
    // ------------------------- bulk insurance view page -------------------------

    public function index($id)
    {

        $package = Package::find($id);

        if (!$package) {
            return "package data not found";
        }

        $farmer_list = User::where('company_id', auth()->user()->id)->get();

        $modified_farmer_list = [];

        foreach ($farmer_list as $farmer) {

            $animals = \App\Models\CattleRegistration::where('user_id', $farmer->id)->get();

            $isAnyAnimalNotInsured = false;

            foreach ($animals as $animal) {
                $insured = \App\Models\Insured::where('cattle_id', $animal->id)->orderBy('id', 'desc')->first();

                if (!$insured) {
                    $isAnyAnimalNotInsured = true;
                    break; // No need to check further, as we already found one uninsured animal
                }
            }

            if ($isAnyAnimalNotInsured) {
                $modified_farmer_list[] = $farmer;
            }
        }

        return view('company.admin-content.Bulk_insurance.view_pages.view_page', compact('package', 'modified_farmer_list'));
    }

    // ------------------------- bulk insurance view page -------------------------

    // ------------------------- bulk insurance cost view and details -------------------------

    public function info_and_cost_calculation()
    {


        $inputs = \request()->validate([
            'farmer_checkbox' => 'nullable',
            'cattle_checkbox' => 'nullable',
            'package_id' => 'nullable',
        ]);

        $package = Package::find($inputs['package_id']);

        if (!$package) {
            return "package data not found";
        }

        $farmer_checkbox_data = json_encode($inputs['farmer_checkbox']);
        $cattle_checkbox_data = json_encode($inputs['cattle_checkbox']);


        $cattle_data = CattleRegistration::whereIn('id', request('cattle_checkbox'))->get();

        return view("company.admin-content.Bulk_insurance.view_pages.insurance_table_and_req_for_inc", compact('cattle_data', 'package', 'cattle_checkbox_data', 'farmer_checkbox_data'));
    }

    // ------------------------- bulk insurance cost view and details -------------------------


    //    ------------------------ requesting for the animal for insurance from company side [ bulk ] ------------------------
    public function request_for_insurance_bulk()
    {


        $inputs = \request()->validate([
            'cattle_checkbox_data' => 'required',
            'farmer_checkbox_data' => 'required',
            'package_id' => 'required',
//            'company_id' => 'required',
            'insurance_cost' => 'required',
//            'package_insurance_period' => 'required',
        ]);


        $cattle_data_array = json_decode($inputs['cattle_checkbox_data']);
        $farmer_data_array = json_decode($inputs['farmer_checkbox_data']);

        foreach ($cattle_data_array as $cattle_ids) {
            $cattle_data = CattleRegistration::find($cattle_ids);

// ------------------------- checking if animal not exists -------------------------

            if (!$cattle_data) {
                return "Animal data does not exists";
            }

// ------------------------- checking if animal not exists -------------------------

// ------------------------- checking if the farmers is under the insurance company, ex : wegro  -------------------------

            $farmer = User::find($cattle_data->user_id);

            if (!$farmer) {
                return "Farmer does not exists";
            }

            if ($farmer->company_id != auth()->id()) {
                return response()->json([
                    'message' => 'Farmer does not belongs to this company',
                    'farmer_info' => $farmer
                ]);
            }

// ------------------------- checking if the farmers is under the insurance company, ex : wegro -------------------------

// ------------------------- checking if animal is insured -------------------------

            $insured = Insured::where('cattle_id', $cattle_data->id)->orderBy('id', 'desc')->first();

            if ($insured) {
                if (!$insured->package_expiration_date < now()) {
                    return $cattle_data . "is already insured";
                }
            }


// ------------------------- checking if animal is insured -------------------------


        }


        // ------------------------- checking if one of the farmer does not exist under company, ex:wegro -------------------------

        foreach ($farmer_data_array as $farmer_ids) {

            $farmer = User::find($farmer_ids);

            if (!$farmer) {
                return "Farmer does not exists";
            }

            if ($farmer->company_id != auth()->id()) {
                return response()->json([
                    'message' => 'Farmer does not belongs to this company',
                    'farmer_info' => $farmer
                ]);
            }

        }

        // ------------------------- checking if one of the farmer does not exist under company, ex:wegro -------------------------


        $package_info = Package::where('id', $inputs['package_id'])->first();

        if (!$package_info) {
            return "package info does not exists";
        }

        $company_info = User::find($package_info->user_id);

        if (!$company_info) {
            return "Company does not exits";
        }

        if (!$company_info->role == "c" && !$company_info->permission->c_insurance == 1) {
            return "Invalid operation, company operations bypassing";
        }


        //  ------------------------------ Checking if company exists and company provides insurance ------------------------------

        //  ------------------------------ Insurance cost calculation ------------------------------------------------------------------

        $sum_insured_data = CattleRegistration::wherein('id',$cattle_data_array)->sum("sum_insured");

        $insurance_cost_calculation =  User::calculateTotalCost($sum_insured_data, $package_info->rate, $package_info->discount, $package_info->vat);

        $insurance_cost_calculation_round_value = round($insurance_cost_calculation);

        //  ------------------------------ Insurance cost calculation ------------------------------


//  ------------------------------ Checking if company exists and company provides insurance ------------------------------

        $inputs['insurance_cost'] = $insurance_cost_calculation_round_value;
        $inputs['company_id'] = $package_info->user_id;
        $inputs['package_insurance_period'] = $package_info->insurance_period;


        $inputs['insurance_status'] = "requested";
        $inputs['insurance_request_type'] = "bulk";

        $user_id = $inputs['farmer_checkbox_data'];
        $cattle_id = $inputs['cattle_checkbox_data'];

        $inputs['insurance_requested_company_id'] = auth()->user()->id;


        InsuranceRequest::create([
            'cattle_id' => $cattle_id,
            'user_id' => $user_id,
            'package_id' => $inputs['package_id'],
            'company_id' => $inputs['company_id'],
            'insurance_cost' => $inputs['insurance_cost'],
            'package_insurance_period' => $inputs['package_insurance_period'],
            'insurance_status' => 'requested',
            'insurance_request_type' => 'bulk',
            'insurance_requested_company_id' => auth()->user()->id
        ]);

        session()->flash('success', 'Request sent successfully');
        return back();

    }

}
