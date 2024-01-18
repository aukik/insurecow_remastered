<?php

namespace App\Http\Controllers;

use App\Models\CattleRegistration;
use App\Models\CattleRegReport;
use App\Models\InsuranceRequest;
use App\Models\Insured;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function claim_list(){

        $claim_list = CattleRegReport::join('insureds', 'cattle_reg_reports.cattle_id', '=', 'insureds.cattle_id')
            ->where('insureds.insurance_requested_company_id', auth()->user()->id)
            ->where('cattle_reg_reports.operation', 'claim')
            ->where('cattle_reg_reports.verification_report', 'success')
            ->select(
                'cattle_reg_reports.*',
                'insureds.*',
                DB::raw('DATE(cattle_reg_reports.created_at) as cattle_created_date')
            )
            ->get();


        return view('company.admin-content.claim_animal_list.claim_list', compact('claim_list'));
    }


    public function company_animal_list(){

        $cattle_list = CattleRegistration::join('users','cattle_registrations.user_id','=','users.id')
            ->where('users.company_id', auth()->user()->id)->get();


        return view('company.admin-content.cattle_list_for_dashboard.view_cattles', compact('cattle_list'));

//        return view("company.admin-content.farmer.cattle_register.view_cattles", compact('cattle_list'));

    }


}
