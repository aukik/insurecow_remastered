<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;
use App\Models\Firm;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function super_admin()
    {
        $firm_count = Firm::count();
        $animal_count = CattleRegistration::count();
        $company_count = User::where('role', 'c')->count();
        $total_user_count = User::count();
        $total_farmers_count = User::where('role', 'f')->count();
        return view("dashboard.super_admin", compact('company_count', 'total_user_count','total_farmers_count','firm_count','animal_count'));
    }

    public function company()
    {
        $field_agent_count = User::where('role', 'fa')->where('company_id', auth()->user()->id)->count();
        $farmer_count = User::where('role', 'f')->where('company_id', auth()->user()->id)->count();
        return view("dashboard.company", compact('field_agent_count','farmer_count'));
    }

    public function farmer()
    {
        $no_of_cattle = auth()->user()->cattleRegister()->count();
        $cattle_reg_verification_count = auth()->user()->cattle_registration_verification_report()->count();
        $cattle_reg_verification = auth()->user()->cattle_registration_verification_report()->orderBy('id', 'desc')->take(9)->get();
        $firms_count = auth()->user()->farm()->count();

        return view("dashboard.farmer", compact('cattle_reg_verification_count', 'no_of_cattle', 'cattle_reg_verification','firms_count'));
    }


    public function farm_management(){
        $no_of_cattle = auth()->user()->cattleRegister()->count();
        $cattle_reg_verification_count = auth()->user()->cattle_registration_verification_report()->count();
        $cattle_reg_verification = auth()->user()->cattle_registration_verification_report()->orderBy('id', 'desc')->take(9)->get();
        $firms_count = auth()->user()->farm()->count();

        return view("dashboard.farm_management", compact('cattle_reg_verification_count', 'no_of_cattle', 'cattle_reg_verification','firms_count'));
    }

    public function field_agent()
    {
        return view("dashboard.view");
    }
}
