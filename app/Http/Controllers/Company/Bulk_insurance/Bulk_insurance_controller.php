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


        $package_info = Package::where('id', $inputs['package_id'])->first();

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

//    ------------------------ requesting for the animal for insurance from company side [ bulk ]  ------------------------


//    --------------------------------- Insurance Acceptance or rejection from Insurance company - with package -------------------------------------------
//    public function company_insurance_request_acceptance(Request $request)
//    {
//
//
//// --------------------------------- request data ---------------------------------
//
//        $inputs = $request->validate([
//            'reason_after_decision' => 'nullable',
//            'decision' => 'required',
//            "id_value" => 'required',
//        ]);
//
//
//        $insurance_request_id_value = \request("id_value");
//        $acceptance = \request("decision");
//        $reason_after_decision = \request("reason_after_decision");
//
//
//// --------------------------------- request data ---------------------------------
//
//
//        $insurance_request = \App\Models\InsuranceRequest::find($insurance_request_id_value);
//
//
//        if (!$insurance_request) {
//            return "Insurance request not found";
//        }
//
//        if ($insurance_request->company_id != auth()->user()->id){
//            return "Unauthorized entry";
//        }
//
//        if ($insurance_request->insurance_request_status != "pending") {
//            return "Insurance request expired";
//        }
//
//        $package = Package::find($insurance_request->package_id);
//
//        if (!$package) {
//            return "Package information not found";
//        }
//
//        $expiration_date = User::addYearsAndMonths($package->insurance_period, $insurance_request->created_at);
//
//
//        if ($acceptance == 'a') {
//            $insurance_request->update([
//                'insurance_request_status' => "accepted"
//            ]);
//
//            if ($insurance_request->company_id != auth()->user()->id) {
//                return "The data does not belongs to this company";
//            }
//
//
//            // ---------------------------- Checking if animal is insured ----------------------------
//
//            $animal_insured_status = Insured::where('cattle_id', $insurance_request->cattle_id)->first();
//
//            if ($animal_insured_status) {
//                return "The animal is already insured";
//            }
//
//            // ---------------------------- Checking if animal is insured ----------------------------
//
//            // ---------------------------- Cash transaction state to orders table ----------------------------
//
//
//            $order = Order::create([
//                'name' => User::find($insurance_request->insurance_requested_company_id)->name ?? "Name not found",
//                'email' => User::find($insurance_request->insurance_requested_company_id)->email ?? "Email not found",
//                'phone' => User::find($insurance_request->insurance_requested_company_id)->phone ?? "Number not found",
//                'amount' => $insurance_request->amount,
//                'status' => $insurance_request->transaction_type,
//                'transaction_id' => Str::random(16),
//                'currency' => 'BDT',
//                'insurance_type' => 'single',
//                "cattle_id" => $insurance_request->cattle_id,
//                "package_id" => $insurance_request->package_id,
//                "company_id" => $insurance_request->company_id,
//                "insurance_request_id" => $insurance_request->id,
//                "insurance_requested_company_id" => $insurance_request->insurance_requested_company_id,
//                "user_id" => $insurance_request->user_id,
//                "package_expiration_date" => $expiration_date,
//                "created_at" => $insurance_request->created_at,
//                "updated_at" => $insurance_request->updated_at,
//
//            ]);
//
//            // ---------------------------- Cash transaction state to orders table ----------------------------
//
//            // ---------------------------- Pushing the data to Insured table ----------------------------
//
//            $insured = Insured::create([
//                "cattle_id" => $insurance_request->cattle_id,
//                "package_id" => $insurance_request->package_id,
//                "company_id" => $insurance_request->company_id,
//                "user_id" => $insurance_request->user_id,
//                "order_id" => $order->id,
//                "insurance_status" => "insured",
//                "insurance_type" => "single",
//                "insurance_request_id" => $insurance_request->id,
//                "insurance_requested_company_id" => $insurance_request->insurance_requested_company_id,
//                "package_expiration_date" => $expiration_date,
//                "created_at" => $insurance_request->created_at,
//                "updated_at" => $insurance_request->updated_at,
//            ]);
//
//            // ---------------------------- Pushing the data to Insured table ----------------------------
//
//            session()->flash("success", "Animal Insured Successfully");
//            return redirect()->route("company_view_insurance_history");
//        } elseif ($acceptance == 'r') {
//
//            $insurance_request->update([
//                'insurance_request_status' => "rejected",
//                'reason_after_decision' => $reason_after_decision,
//            ]);
//
//            session()->flash("success", "Animal Insurance Unapproved");
//            return redirect()->route("company_view_insurance_history");
//
//        }
//
//    }


//    ------------------------------------ Insurance Acceptance or rejection from Insurance company - with package ---------------------------------------------
}
