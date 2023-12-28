<?php

namespace App\Http\Controllers\Company\Farmer;

use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;
use App\Models\InsuranceCashRequest;
use App\Models\InsuranceRequest;
use App\Models\User;

class InsuranceCashRequestController extends Controller
{

// ---------------------------------- Request for Insurance [ Cash Transaction ] ----------------------------------

    public function request_for_insurance_cash()
    {
        $inputs = \request()->validate([
            'company_name' => 'nullable',
            'from_ac' => 'nullable',
            'to_ac' => 'nullable',
            'to_ac_name' => 'nullable',
            'bank_name' => 'nullable',
            'branch_name' => 'nullable',
            'routing_no' => 'nullable',
            'instruction' => 'nullable',
            'cattle_sum_insurance' => 'nullable',
            'transaction_type' => 'nullable',
            'transaction_attachment' => 'nullable|mimes:jpeg,jpg,png,pdf',


            'cattle_id' => 'required',
            'package_id' => 'required',
            'company_id' => 'required',
            'insurance_cost' => 'required',
            'package_insurance_period' => 'required',
        ]);

        $inputs['status'] = "requested";

        $farmer_id = CattleRegistration::find($inputs['cattle_id'])->user_id;

        if (!$farmer_id) {
            return "Farmer information not found";
        }

        if (User::find($farmer_id)->company_id != auth()->user()->id) {
            return "User does not belong to the company";
        }

        $inputs['user_id'] = $farmer_id;
        $inputs['insurance_requested_company_id'] = auth()->user()->id;

        if (request('transaction_attachment')) {
            $inputs['transaction_attachment'] = \request('transaction_attachment')->store('images');
        }


        InsuranceCashRequest::create($inputs);

        session()->flash('success', 'Request sent successfully');
        return back();
    }

// ---------------------------------- Request for Insurance [ Cash Transaction ] ----------------------------------

}
