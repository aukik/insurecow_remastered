<?php

namespace App\Http\Controllers\Company\Bulk_insurance;

use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class Bulk_insurance_controller extends Controller
{
    // ------------------------- bulk insurance view page -------------------------

    public function index($id)
    {

        $package = Package::find($id);

        if (!$package){
            return "package data not found";
        }

        $farmer_list = User::where('company_id', auth()->user()->id)->get();

        $modified_farmer_list = [];

        foreach ($farmer_list as $farmer) {

            $animals = \App\Models\CattleRegistration::where('user_id', $farmer->id)->get();

            $isAnyAnimalNotInsured = false;

            foreach ($animals as $animal) {
                $insured = \App\Models\Insured::where('cattle_id', $animal->id)->orderBy('id', 'desc')->first();

                if (!$insured) {
                    $isAnyAnimalNotInsured = true;
                    break; // No need to check further, as we already found one uninsured animal
                }
            }

            if ($isAnyAnimalNotInsured) {
                $modified_farmer_list[] = $farmer;
            }
        }

        return view('company.admin-content.Bulk_insurance.view_pages.view_page', compact('package', 'modified_farmer_list'));
    }

    // ------------------------- bulk insurance view page -------------------------

    // ------------------------- bulk insurance cost view and details -------------------------

    public function info_and_cost_calculation()
    {


        $inputs = \request()->validate([
            'farmer_checkbox' => 'nullable',
            'cattle_checkbox' => 'nullable',
            'package_id' => 'nullable',
        ]);

        $package = Package::find($inputs['package_id']);

        if (!$package){
            return "package data not found";
        }


        $cattle_data = CattleRegistration::whereIn('id', request('cattle_checkbox'))->get();

        return view("company.admin-content.Bulk_insurance.view_pages.insurance_table_and_req_for_inc", compact('cattle_data','package'));
    }

    // ------------------------- bulk insurance cost view and details -------------------------
}
