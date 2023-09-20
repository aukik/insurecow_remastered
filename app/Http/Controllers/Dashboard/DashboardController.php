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
        return view("dashboard.super_admin", compact('company_count','total_user_count'));
    }

    public function company()
    {
        return view("dashboard.view");
    }

    public function farmer()
    {
        return view("dashboard.view");
    }

    public function field_agent()
    {
        return view("dashboard.view");
    }
}
