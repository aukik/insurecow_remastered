<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function super_admin()
    {
        $company_count = User::where('role', 'c')->count();
        $total_user_count = User::count();
        return view("dashboard.super_admin", compact('company_count', 'total_user_count'));
    }

    public function company()
    {
        return view("dashboard.view");
    }

    public function farmer()
    {
        $no_of_cattle = auth()->user()->cattleRegister()->count();
        $cattle_reg_verification_count = auth()->user()->cattle_registration_verification_report()->count();
        $cattle_reg_verification = auth()->user()->cattle_registration_verification_report()->orderBy('id', 'desc')->take(9)->get();

        return view("dashboard.farmer", compact('cattle_reg_verification_count', 'no_of_cattle', 'cattle_reg_verification'));
    }

    public function field_agent()
    {
        return view("dashboard.view");
    }
}
