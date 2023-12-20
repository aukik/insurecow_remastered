<?php

namespace App\Http\Controllers\Company\Farmer;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyCanInsureFarmerController extends Controller
{


//   ------------------------------------------ Search company ------------------------------------------

    public function search_company()
    {
        $companies = User::where('role', 'c')->get();
        return view("company.admin-content.company-insurance-farmer.search_company", compact('companies'));
    }



//   ------------------------------------------ Search company ------------------------------------------

//    ------------------------------------------ Total insurance packages ------------------------------------------

    public function total_insurance_packages()
    {


        $packages = Package::where('user_id', \request('company_id'))->get();
        return view('company.admin-content.company-insurance-farmer.list_of_packages', compact('packages'));
    }

//    ------------------------------------------ Total insurance packages ------------------------------------------

}
