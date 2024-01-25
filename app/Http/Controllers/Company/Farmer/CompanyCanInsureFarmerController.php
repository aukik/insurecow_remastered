<?php

namespace App\Http\Controllers\Company\Farmer;

use App\Http\Controllers\API\Farmer\Insurance\InsuranceController;
use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;
use App\Models\InsuranceCashRequest;
use App\Models\InsuranceRequest;
use App\Models\Insured;
use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyCanInsureFarmerController extends Controller
{


//   ------------------------------------------ Search company ------------------------------------------

    public function search_company()
    {
        $companies = User::where('role', 'c')->get();
        return view("company.admin-content.company-insurance-farmer.search_company", compact('companies'));
    }



//   ------------------------------------------ Search company ------------------------------------------

//    ------------------------------------------ Total insurance packages ------------------------------------------

    public function total_insurance_packages()
    {
        $packages = Package::where('user_id', \request('company_id'))->get();
        return view('company.admin-content.company-insurance-farmer.list_of_packages', compact('packages'));
    }

//    ------------------------------------------ Total insurance packages ------------------------------------------

//    ------------------------------------------ Single package result view from packages ------------------------------------------

    public function single_package_result_view(Package $package)
    {
        return view("company.admin-content.company-insurance-farmer.single-result", compact('package'));
    }


//    ------------------------------------------ Single package result view from packages ------------------------------------------

//    ------------------------------------------ Single animal select with farmers list [ Digital Payment ] ------------------------------------------

    public function single_animal_select(Package $package)
    {

        $farmer_list = User::where('company_id', auth()->user()->id)->get();

        return view("company.admin-content.company-insurance-farmer.insurance_animal_single", compact('package', 'farmer_list'));


    }


//    ------------------------------------------ Single animal select with farmers list [ Digital Payment ] ------------------------------------------

//    ------------------------------------------ Single animal select with farmers list [ Cash Payment ], rest is on Insurance Cash request controller ------------------------------------------

    public function single_animal_select_cash(Package $package)
    {
//
        $farmer_list = User::where('company_id', auth()->user()->id)->get();

        return view("company.admin-content.company-insurance-farmer.insurance_animal_single_cash_payment", compact('package', 'farmer_list'));


    }

//    ------------------------------------------ Single animal select with farmers list [ Cash Payment ], rest is on Insurance Cash request controller ------------------------------------------

//    ------------------------------------------ farmers animal list filter from company side ------------------------------------------

    public function animal_list_filter($cattle_id)
    {

        $cattle_list = CattleRegistration::where('user_id', $cattle_id)->get();


        $filtered_data = [];

        foreach ($cattle_list as $cattle) {

// ------------------- company/single_animal_insurance_package_form/* animal list condition -------------------

            $insured = Insured::where('cattle_id', $cattle->id)->orderBy('id', 'desc')->first();

            if (!$insured || $insured->package_expiration_date < now()) {
                $filtered_data[] = $cattle;
            }

// ------------------- company/single_animal_insurance_package_form/* animal list condition -------------------

        }

        return response()->json([
            'data' => $filtered_data
        ]);

    }



//    ------------------------------------------ farmers animal list filter from company side ------------------------------------------

//    ------------------------------------------ total Insurance calculation of the animal ------------------------------------------

    public function insurance_calculation($cattle_id, $package_id)
    {

        $cattle_list = CattleRegistration::find($cattle_id);
        $package = Package::find($package_id);


        return response()->json([
            'data' => $cattle_list,
            'cattle_name' => $cattle_list->cattle_name ?? "Not Found",
            'sum_insured' => $cattle_list->sum_insured ?? 0,
            'insurance_cost' => User::calculateTotalCost($cattle_list->sum_insured, $package->rate, $package->discount, $package->vat) ?? 0
        ]);

    }

//    ------------------------------------------ total Insurance calculation of the animal ------------------------------------------

//    --------------------------------------------------------------------- requesting for the animal for insurance from company side ---------------------------------------------------------------------------

    public function request_for_insurance()
    {

        $inputs = \request()->validate([
            'cattle_id' => 'required',
            'package_id' => 'required',
            'company_id' => 'required',
            'insurance_cost' => 'required',
            'package_insurance_period' => 'required',
        ]);

        $inputs['insurance_status'] = "requested";
        $inputs['insurance_request_type'] = "single";

//  ------------------------------ Checking if cattle exists ------------------------------

        $cattle_data_check = CattleRegistration::find($inputs['cattle_id']);

        if (!$cattle_data_check) {
            return "Cattle data does not exists";
        }


//  ------------------------------ Checking if cattle exists ------------------------------

//  ------------------------------ Checking if farmer exists and if the farmer belongs to that company ------------------------------

        $farmer_id = $cattle_data_check->user_id;

        if (!$farmer_id) {
            return "Farmer information not found";
        }

        if (User::find($farmer_id)->company_id != auth()->user()->id) {
            return "User does not belong to the company";
        }


//  ------------------------------ Checking if farmer exists and if the farmer belongs to that company ------------------------------

//  ------------------------------ Checking if company exists and company provides insurance ------------------------------

        $company_info = User::find($inputs['company_id']);

        if (!$company_info) {
            return "Company does not exits";
        }

        if (!$company_info->role == "c" && !$company_info->permission->c_insurance == 1) {
            return "Invalid operation, company operations bypassing";
        }


//  ------------------------------ Checking if company exists and company provides insurance ------------------------------

//  ------------------------------ Checking if the package belongs to that company and testing insurance calculation ------------------------------

        $package = Package::where('user_id', $company_info->id)->first();

        if (!$package) {
            return "Package does not exists";
        }

        $inputs['package_insurance_period'] = $package->insurance_period;


//  ------------------------------ Checking if the package belongs to that company insurance calculation ------------------------------

//  ------------------------------ Insurance cost calculation and verification --------------------------------------------------------

        $insurance_cost_verification_calculation = User::calculateTotalCost($cattle_data_check->sum_insured, $package->rate, $package->discount, $package->vat);

        if (ceil($insurance_cost_verification_calculation) != $inputs['insurance_cost']) {
            return "Insurance cost bypassed, more attempts might ban the animal from getting insurance";
        }

//  ------------------------------ Insurance cost calculation and verification --------------------------------------------------------


        $inputs['user_id'] = $farmer_id;
        $inputs['insurance_requested_company_id'] = auth()->user()->id;

        InsuranceRequest::create($inputs);

        session()->flash('success', 'Request sent successfully');
        return back();
    }

//    --------------------------------------------------------------------- requesting for the animal for insurance from company side ---------------------------------------------------------------------------

//    ------------------------------------------------------- View Insurance History - Insurance Requested Company - [Digital Transactions] ---------------------------------------------------------------------

    public function view_insurance_history()
    {
        $insurance_history = InsuranceRequest::where('insurance_requested_company_id', auth()->id())->orderBy('id', 'desc')->get();
        return view('company.admin-content.company-insurance-farmer.insurance_history.view', compact('insurance_history'));
    }

//    ----------------------------------------------------- View Insurance History - Insurance Requested Company - [Digital Transactions] -----------------------------------------------------------------------

//    ------------------------ View Insurance History - Insurance Requested Company - [Cash Transactions] ------------------------

    public function view_insurance_history_cash()
    {
        $insurance_history = InsuranceCashRequest::where('insurance_requested_company_id', auth()->id())->get();
        return view('company.admin-content.company-insurance-farmer.insurance_history.insurance_requested_company_cash_requests', compact('insurance_history'));
    }

//    ------------------------ View Insurance History - Insurance Requested Company - [Cash Transactions] ------------------------

//    --------------- Insurance Transaction History ---------------


    public function insurance_transaction_history()
    {
        $insurance_history = Order::where('insurance_requested_company_id', auth()->id())->where('status', 'Processing')->orWhere('status', 'Complete')->orWhere('status', 'cash')->orWhere('status', 'bank')->orWhere('status', 'cheque')->get();
        return view("farmer.admin-content.insurance_payment_history.view", compact('insurance_history'));
    }


//    --------------- Insurance Transaction History ---------------

//    --------------- Insurance Transaction History With Package ---------------


    public function insurance_transaction_history_with_package()
    {
        $insurance_history = Order::where('company_id', auth()->id())->where('status', 'Processing')->orWhere('status', 'Complete')->orWhere('status', 'cash')->orWhere('status', 'bank')->orWhere('status', 'cheque')->get();
        return view("company.admin-content.insurance_payment_history.view", compact('insurance_history'));
    }


//    --------------- Insurance Transaction History With Package ---------------


}
