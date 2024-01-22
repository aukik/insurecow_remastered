<?php

namespace App\Http\Controllers\Company\Bulk_insurance;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class Bulk_insurance_controller extends Controller
{
    // ------------------------- bulk insurance view page -------------------------

    public function index(Package $package)
    {

        // Get the farmer list
        $farmer_list = User::where('company_id', auth()->user()->id)->get();

        // Initialize the modified farmer list
        $modified_farmer_list = [];

        // Iterate through each farmer in the list
        foreach ($farmer_list as $farmer) {
            // Get the animals for the current farmer
            $animals = \App\Models\CattleRegistration::where('user_id', $farmer->id)->get();

            // Check if any animal is not insured
            $isAnyAnimalNotInsured = false;

            foreach ($animals as $animal) {
                $insured = \App\Models\Insured::where('cattle_id', $animal->id)->orderBy('id', 'desc')->first();

                // If there is no insurance record for the current animal, set the flag to true
                if (!$insured) {
                    $isAnyAnimalNotInsured = true;
                    break; // No need to check further, as we already found one uninsured animal
                }
            }

            // If any animal is not insured, add the user to the modified farmer list
            if ($isAnyAnimalNotInsured) {
                // Add your logic here to add the user to the farmer list
                // For example, you might want to update a field in the User model or perform some other action
                // $farmer->update(['some_field' => 'some_value']);
                $modified_farmer_list[] = $farmer;
            }
        }

        // Now $modified_farmer_list contains farmers with at least one uninsured animal

        return view('company.admin-content.Bulk_insurance.view_pages.view_page', compact('package', 'modified_farmer_list'));
    }

    // ------------------------- bulk insurance view page -------------------------

    // ------------------------- bulk insurance cost view and details -------------------------

    public function info_and_cost_calculation()
    {
        return \request()->all();
    }

    // ------------------------- bulk insurance cost view and details -------------------------
}
