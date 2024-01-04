<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class CashTransactionController extends Controller
{
// -------------------------- Detailed View - Insurance with package -----------------------------

    public function detailed_view($id){
        $insurance_request_info = \App\Models\InsuranceRequest::find($id);
        $cattle = CattleRegistration::find($insurance_request_info->cattle_id);
        $package  = Package::find($insurance_request_info->package_id);
        $farmer  = User::find($insurance_request_info->user_id);


        return view("company.admin-content.cash_insurance_full_info.view_single_cattle_info_v2", compact('insurance_request_info','cattle','package','farmer'));
    }


// -------------------------- Detailed View - Insurance with package -----------------------------

// -------------------------- Add Attachment -----------------------------

    public function transaction_view($id, $type)
    {
        $insurance_request = \App\Models\InsuranceRequest::find($id);
        $type_data = $type;

        return view("company.admin-content.cart_and_payment.transaction_page", compact('insurance_request', 'type_data'));
    }

// -------------------------- Add Attachment -----------------------------


// -------------------------- Transaction view -----------------------------

    public function attachment_page_update(Request $request, $id)

    {

        $insurance_request = \App\Models\InsuranceRequest::find($id);

        if (!$insurance_request) {
            return "Insurance request data not found";
        }

        $inputs = \request()->validate([
            'cash_agent_name' => 'nullable',
            'cash_agent_branch_name' => 'nullable',
            'cash_agent_id' => 'nullable',
            'cash_amount' => 'nullable',
            'cash_phone' => 'nullable',
            'cheque_bank_name' => 'nullable',
            'cheque_branch_name' => 'nullable',
            'amount' => 'nullable',
            'bank_ac_name' => 'nullable',
            'bank_ac_number' => 'nullable',
            'bank_name' => 'nullable',
            'transaction_number' => 'nullable',
            'insured_to_ac_info' => 'nullable',
            'insured_to_account' => 'nullable',
            'insured_to_bank_name' => 'nullable',
            'insured_to_branch_name' => 'nullable',
            'insured_to_routing_no' => 'nullable',
            'insured_to_instruction' => 'nullable',
            'transaction_type' => 'nullable',
            'insurance_request_status' => 'nullable',
            'attachment' => 'required|mimes:pdf,jpg,jpeg,png,webp',
        ]);


        $inputs['insurance_request_status'] = "pending";

        if (request('attachment')) {
            $inputs['attachment'] = \request('attachment')->store('inc_attachment');
        }

//  ----------------------- Package with insurance company instruction -----------------------

        $insurance_package_with_company = User::find($insurance_request->company_id);


        if (!$insurance_package_with_company) {
            return "Company which you requested to insurance does not exists";
        }


        $inputs['insured_to_ac_info'] = $insurance_package_with_company->ac_info ?? "Data not found";
        $inputs['insured_to_account'] = $insurance_package_with_company->account ?? "Data not found";
        $inputs['insured_to_bank_name'] = $insurance_package_with_company->account ?? "Data not found";
        $inputs['insured_to_branch_name'] = $insurance_package_with_company->account ?? "Data not found";
        $inputs['insured_to_routing_no'] = $insurance_package_with_company->routing_no ?? "Data not found";
        $inputs['insured_to_instruction'] = $insurance_package_with_company->instruction ?? "Data not found";


//  ----------------------- Package with insurance company instruction -----------------------


        $insurance_request->update($inputs);
        session()->flash("success","insurance requested successfully");
        return redirect()->route("company.view_insurance_history");


    }
// -------------------------- Transaction view -----------------------------
}
