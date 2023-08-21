<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
    public function index()
    {
        return view('farmer.admin-content.dashboard.index');
    }

//    --------------- view registered Cattle ---------------

    public function view_registered_cattle()
    {
        $cattle_list = auth()->user()->cattleRegister()->get();
        return view('farmer.admin-content.cattle_register.view_cattles', compact('cattle_list'));
    }

//    --------------- view registered Cattle ---------------

//    --------------- Insurance Packages search by companies ---------------

    public function company_insurance_packages()
    {
        $packages = Package::all();
        return view('farmer.admin-content.insurance_packages.index', compact('packages'));
    }

//    --------------- Insurance Packages search by companies ---------------


}
