<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\CattleRegReport;
use App\Models\InsuranceRequest;
use App\Models\Insured;
use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function profile()
    {
        return view('super-admin.admin-content.profile.profile');
    }

    public function delete_company_request(Request $request)
    {

        $inputs = \request()->validate([
            'user_id' => 'required'
        ]);

        $company_id = $inputs['user_id'];

//  -------------------------- If any users belongs to this company --------------------------

        $user = User::where('company_id', $company_id)->count();

        if ($user > 0) {

            session()->flash("warning", "Farmers belongs to this company exists, delete request failed");
            return redirect()->route('sp.company_request');
        }

//  -------------------------- If any users belongs to this company --------------------------

//  -------------------------- If any packages belongs to this company --------------------------

        $package = Package::where('user_id', $company_id)->count();

        if ($package > 0) {

            session()->flash("warning", "Insurance package belongs to this company exists, delete request failed");
            return redirect()->route('sp.company_request');
        }


//  -------------------------- If any packages belongs to this company --------------------------

//  -------------------------- Checking from transaction list --------------------------

        $order_list_check = Order::where('company_id', $company_id)->orWhere('insurance_requested_company_id', $company_id)->count();

        if ($order_list_check > 0) {

            session()->flash("warning", "Insurance transactions belongs to this company exists, delete request failed");
            return redirect()->route('sp.company_request');
        }

//  -------------------------- Checking from transaction list --------------------------

//  -------------------------- Insured animal count check --------------------------

        $insured_check = Insured::where('company_id', $company_id)->orWhere('insurance_requested_company_id', $company_id)->count();

        if ($insured_check > 0) {

            session()->flash("warning", "Insurance record belongs to this company exists, delete request failed");
            return redirect()->route('sp.company_request');
        }

//  -------------------------- Insured animal count check --------------------------

//  -------------------------- Insurance request status check --------------------------

        $insurance_request_status = InsuranceRequest::where('company_id', $company_id)->orWhere('insurance_requested_company_id', $company_id)->count();

        if ($insurance_request_status > 0) {

            session()->flash("warning", "Insurance request record belongs to this company exists, delete request failed");
            return redirect()->route('sp.company_request');
        }

//  -------------------------- Insurance request status check --------------------------

//  -------------------------- Check from cattle reg reports and claim --------------------------

        $cattle_reg_report_and_claim_status = CattleRegReport::where('user_id', $company_id)->count();

        if ($cattle_reg_report_and_claim_status) {

            session()->flash("warning", "Claim report record belongs to this company exists, delete request failed");
            return redirect()->route('sp.company_request');
        }

//  -------------------------- Check from cattle reg reports and claim --------------------------

        User::where('company_id', $company_id)->delete();
        session()->flash("success", "Requested deleted successfully");
        return redirect()->route('sp.company_request');


    }
}
