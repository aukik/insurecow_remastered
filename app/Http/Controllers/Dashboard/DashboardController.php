<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function super_admin(){
        return view("dashboard.view");
    }

    public function company(){
        return view("dashboard.view");
    }

    public function farmer(){
        return view("dashboard.view");
    }

    public function field_agent(){
        return view("dashboard.view");
    }
}
