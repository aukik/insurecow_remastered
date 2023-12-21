<?php

namespace App\Http\Controllers\Company\Farmer;

use App\Http\Controllers\API\Farmer\Insurance\InsuranceController;
use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;
use App\Models\Insured;
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

//    ------------------------------------------ Single package result view from packages ------------------------------------------

    public function single_package_result_view(Package $package)
    {
        return view("company.admin-content.company-insurance-farmer.single-result", compact('package'));
    }


//    ------------------------------------------ Single package result view from packages ------------------------------------------

//    ------------------------------------------ Single animal select with farmers list ------------------------------------------

    public function single_animal_select(Package $package)
    {

        $farmer_list = User::where('company_id', auth()->user()->id)->get();

        return view("company.admin-content.company-insurance-farmer.insurance_animal_single", compact('package', 'farmer_list'));


    }


//    ------------------------------------------ Single animal select with farmers list ------------------------------------------

//    ------------------------------------------ farmers user list filter from company side ------------------------------------------

    public function animal_list_filter($cattle_id)
    {

        $cattle_list = CattleRegistration::where('user_id', $cattle_id)->get();

        return response()->json([
            'data' => $cattle_list
        ]);

    }

//    ------------------------------------------ farmers user list filter from company side ------------------------------------------

//    ------------------------------------------ total Insurance calculation of the animal ------------------------------------------

    public function insurance_calculation($cattle_id, $package_id)
    {

        $cattle_list = CattleRegistration::find($cattle_id);
        $package = Package::find($package_id);


        return response()->json([
            'data' => $cattle_list,
            'cattle_name' => $cattle_list->cattle_name ?? "Not Found",
            'sum_insured' => $cattle_list->sum_insured ?? 0,
            'insurance_cost' => User::calculateTotalCost($cattle_list->sum_insured, $package->rate, $package->discount, $package->vat) ?? 0
        ]);

    }

//    ------------------------------------------ total Insurance calculation of the animal ------------------------------------------


}
