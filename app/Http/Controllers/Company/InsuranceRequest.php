<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;
use App\Models\InsuranceCashRequest;
use App\Models\Insured;
use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InsuranceRequest extends Controller
{
    //    ------------------------ View Insurance History [Digital] ------------------------

    public function view_insurance_history()
    {
        $insurance_history = \App\Models\InsuranceRequest::where('company_id', auth()->user()->id)->orderBy('id', 'desc')->get();

        return view('company.admin-content.insurance_history.view', compact('insurance_history'));
    }

//    ------------------------ View Insurance History [Digital] ------------------------

    //    ------------------------ View Insurance History [Cash] ------------------------

    public function view_insurance_history_cash()
    {
        $insurance_history = \App\Models\InsuranceCashRequest::where('company_id', auth()->user()->id)->orderBy('id', 'desc')->get();

        return view('company.admin-content.company-insurance-farmer.insurance_history.insurance_requested_company_cash_requests', compact('insurance_history'));
    }

//    ------------------------ View Insurance History [Cash] ------------------------


    //    ------------------------ View Cattle Info ------------------------

    public function view_cattle_info($id)
    {
//        $insurance_history = \App\Models\InsuranceRequest::where('company_id', auth()->user()->id)->orderBy('id','desc')->get();


        $insurance_request_info = \App\Models\InsuranceRequest::findOrFail($id);

        $cattle = CattleRegistration::findOrFail($insurance_request_info->cattle_id);

        if ($cattle != null) {
            return view('company.admin-content.cattle_info.view_single_cattle_info', compact('cattle'));
        } else {
            return "Information does not exists";
        }
    }

//    ------------------------ View Cattle Info ------------------------

//    ------------------------ View cattle, package and other Info - Insurance Cash Request ------------------------

    public function view_other_info($id)
    {
        $insurance_request_info = \App\Models\InsuranceCashRequest::findOrFail($id);

        $cattle = CattleRegistration::find($insurance_request_info->cattle_id);
        $package = Package::find($insurance_request_info->package_id);
        $farmer = User::find($insurance_request_info->user_id);


        return view('company.admin-content.cash_insurance_full_info.view_single_cattle_info', compact('insurance_request_info', 'cattle', 'package', 'farmer'));
    }


//    ------------------------ View cattle, package and other Info - Insurance Cash Request ------------------------

//    ------------------------ View cattle, package and other Info - Company with inc package - Insurance Cash Request ------------------------

    public function view_other_info_2($id)
    {
        $insurance_request_info = \App\Models\InsuranceCashRequest::findOrFail($id);

        $cattle = CattleRegistration::find($insurance_request_info->cattle_id);
        $package = Package::find($insurance_request_info->package_id);
        $farmer = User::find($insurance_request_info->user_id);


        return view('company.admin-content.cash_insurance_full_info.view_single_cattle_info', compact('insurance_request_info', 'cattle', 'package', 'farmer'));
    }


//    ------------------------ View cattle, package and other Info - Company with inc package - Insurance Cash Request ------------------------

//    ------------------------ Send policy to farmer ------------------------


    public function send_request($id)
    {
        $insurance_request_info = \App\Models\InsuranceRequest::findOrFail($id);
        $insurance_request_info->update([
            "insurance_status" => "received"
        ]);

        session("status", "Policy successfully sent to farmer");
        return back();
    }


//    ------------------------ Send policy to farmer ------------------------


//    ------------------------ View Insurance Acceptance Form [Cash] ------------------------

    public function view_insurance_acceptance_form($id)
    {
        $insurance_request = InsuranceCashRequest::find($id);
        $package = Package::find($insurance_request->package_id);
        return view("company.admin-content.company-insurance-farmer.insurance_premium_side.insurance_animal_single_cash_payment_update_premium_side", compact('insurance_request', 'package'));
    }
//    ------------------------ View Insurance Acceptance Form [Cash] ------------------------

//    ------------------------------------------------- View Insurance Acceptance Form Update [Cash] -------------------------------------------------------

    public function view_insurance_acceptance_form_update($id)
    {

        $insurance_cash_request = InsuranceCashRequest::find($id);

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
            'insurance_date' => 'nullable|date',
            'insurance_expiration_date' => 'nullable|date',
            'transaction_attachment' => 'nullable|mimes:jpeg,jpg,png,pdf',
        ]);

        $insurance_cash_request->update($inputs);

        $transaction_acceptation = \request('transaction_acceptation');

        if ($transaction_acceptation == "a") {
            $this->company_insurance_request_acceptance($insurance_cash_request->id, 'a');
        } elseif ($transaction_acceptation == "r") {
            $this->company_insurance_request_acceptance($insurance_cash_request->id, 'r');
        }

        return redirect()->route("company_view_insurance_history_cash");

    }

//    ------------------------------------------------- View Insurance Acceptance Form Update [Cash] ------------------------------------------------------


//    ------------------------ Insurance Acceptance or rejection from Insurance company - with package ------------------------
    public function company_insurance_request_acceptance($id, $acceptance)
    {

        $insurance_request = \App\Models\InsuranceRequest::find($id);

        $package = Package::find($insurance_request->package_id);

        if (!$package){
            return "Package information not found";
        }

        $expiration_date = User::addYearsAndMonths($package->insurance_period);


        if ($acceptance == 'a') {
            $insurance_request->update([
                'insurance_request_status' => "accepted"
            ]);

            if (!$insurance_request) {
                return "The data does not exists";
            }

            if ($insurance_request->company_id != auth()->user()->id) {
                return "The data does not belongs to this company";
            }


            // ---------------------------- Checking if animal is insured ----------------------------

            $animal_insured_status = Insured::where('cattle_id', $insurance_request->cattle_id)->first();

            if ($animal_insured_status) {
                return "The animal is already insured";
            }

            // ---------------------------- Checking if animal is insured ----------------------------

            // ---------------------------- Cash transaction state to orders table ----------------------------


            $order = Order::create([
                'name' => User::find($insurance_request->insurance_requested_company_id)->name ?? "Name not found",
                'email' => User::find($insurance_request->insurance_requested_company_id)->email ?? "Email not found",
                'phone' => User::find($insurance_request->insurance_requested_company_id)->phone ?? "Number not found",
                'amount' => $insurance_request->amount,
                'status' => $insurance_request->transaction_type,
                'transaction_id' => Str::random(16),
                'currency' => 'BDT',
                'insurance_type' => 'single',
                "cattle_id" => $insurance_request->cattle_id,
                "package_id" => $insurance_request->package_id,
                "company_id" => $insurance_request->company_id,
                "insurance_request_id" => $insurance_request->id,
                "insurance_requested_company_id" => $insurance_request->insurance_requested_company_id,
                "user_id" => $insurance_request->user_id,
                "package_expiration_date" => $expiration_date,
                "created_at" => now(),
                "updated_at" => now(),

            ]);

            // ---------------------------- Cash transaction state to orders table ----------------------------

            // ---------------------------- Pushing the data to Insured table ----------------------------

            $insured = Insured::create([
                "cattle_id" => $insurance_request->cattle_id,
                "package_id" => $insurance_request->package_id,
                "company_id" => $insurance_request->package_id,
                "user_id" => $insurance_request->user_id,
                "order_id" => $order->id,
                "insurance_status" => "insured",
                "insurance_type" => "single",
                "insurance_request_id" => $insurance_request->id,
                "insurance_requested_company_id" => $insurance_request->insurance_requested_company_id,
                "package_expiration_date" => $expiration_date,
            ]);

            // ---------------------------- Pushing the data to Insured table ----------------------------

            session()->flash("success", "Animal Insured Successfully");
            return redirect()->route("company_view_insurance_history");
        } elseif ($acceptance == 'r') {

            $insurance_request->update([
                'insurance_request_status' => "rejected"
            ]);

            session()->flash("success", "Animal Insurance Unapproved");
            return redirect()->route("company_view_insurance_history");

        }

    }


//    ------------------------ Insurance Acceptance or rejection from Insurance company - with package ------------------------

}
