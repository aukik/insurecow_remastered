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

//    ------------------------------------------ farmers user list filter from company side ------------------------------------------

    public function animal_list_filter($cattle_id)
    {

        $cattle_list = CattleRegistration::where('user_id', $cattle_id)->get();

        return response()->json([
            'data' => $cattle_list
        ]);

    }

//    ------------------------------------------ farmers user list filter from company side ------------------------------------------

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

//    ------------------------ requesting for the animal for insurance from company side ------------------------
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

        $farmer_id = CattleRegistration::find($inputs['cattle_id'])->user_id;

        if (!$farmer_id) {
            return "Farmer information not found";
        }

        if (User::find($farmer_id)->company_id != auth()->user()->id) {
            return "User does not belong to the company";
        }

        $inputs['user_id'] = $farmer_id;
        $inputs['insurance_requested_company_id'] = auth()->user()->id;

        InsuranceRequest::create($inputs);

        session()->flash('success', 'Request sent successfully');
        return back();
    }

//    ------------------------ requesting for the animal for insurance from company side ------------------------

//    ------------------------ View Insurance History - Insurance Requested Company - [Digital Transactions] ------------------------

    public function view_insurance_history()
    {
        $insurance_history = InsuranceRequest::where('insurance_requested_company_id', auth()->id())->get();
        return view('company.admin-content.company-insurance-farmer.insurance_history.view', compact('insurance_history'));
    }

//    ------------------------ View Insurance History - Insurance Requested Company - [Digital Transactions] ------------------------

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
