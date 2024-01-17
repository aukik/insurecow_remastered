<?php

namespace App\Http\Controllers;

use App\Models\InsuranceRequest;
use App\Models\Insured;
use Illuminate\Http\Request;

class InsuredController extends Controller
{
    public function insured(){
        $insureds = Insured::where('insurance_requested_company_id', auth()->user()->id)->get();
        return view('company.admin-content.insured_list.insured_list', compact('insureds'));
    }

    public function view_pending_insurance_history()
    {
        $insurance_history = InsuranceRequest::where('insurance_requested_company_id',auth()->user()->id)->where('insurance_status','received')->where('insurance_request_status',null)->orderBy('id','desc')->get();
        return view('company.admin-content.company-insurance-farmer.insurance_history.view', compact('insurance_history'));
    }
}
