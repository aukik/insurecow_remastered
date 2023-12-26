<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;
use Illuminate\Http\Request;

class InsuranceRequest extends Controller
{
    //    ------------------------ View Insurance History ------------------------

    public function view_insurance_history()
    {
        $insurance_history = \App\Models\InsuranceRequest::where('company_id', auth()->user()->id)->orderBy('id', 'desc')->get();

        return view('company.admin-content.insurance_history.view', compact('insurance_history'));
    }

//    ------------------------ View Insurance History ------------------------

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

}
