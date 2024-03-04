<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;
use App\Models\Farm_management\sell\Sell_animal_information;
use Illuminate\Http\Request;

class SellController extends Controller
{
    // --------------------------- sell page view ---------------------------

    public function sell_page_view($id)
    {

        $animal = CattleRegistration::find($id);


        if (!$animal) {
            return "Animal information not found";
        }

        if ($animal->user_id != auth()->user()->id) {
            return "Animal does not belongs to the farmer";

        }

        return view('farmer.admin-content.cattle_register.sell_cattle', compact('animal'));
    }

    // --------------------------- sell page view ---------------------------

    // --------------------------- sell page - sell form operation ---------------------------

    public function animal_sell()
    {
        $inputs = \request()->validate([
            'selling_percentage' => 'required',
            'cattle_id' => 'required',
            'selling_cost' => 'required'
        ]);

        // ---------- cattle identification and farmer identification ----------

        $animal = CattleRegistration::find($inputs['cattle_id']);

        if (!$animal){
            return "Animal information not found";
        }

        if ($animal->user_id != auth()->id()){
            return "Animal does not belongs to farmer";
        }


        // ---------- cattle identification and farmer identification ----------

        // ---------- Animal percentage identification ----------

        $percentage = $inputs['selling_percentage'];
        $selling_cost = $inputs['selling_cost'];

        $percentage_calculation = $animal->sum_insured + ($animal->sum_insured * ($percentage / 100));

        if ($percentage_calculation != $selling_cost){
            return "Bypassing value is unappropriated";
        }

        // ---------- Animal percentage identification ----------


        $inputs['user_id'] = auth()->id();
        $inputs['status'] = "sold";

        Sell_animal_information::create($inputs);
        session()->flash("success","Animal sold successfully");
        return redirect()->route("farm.index");





    }


    // --------------------------- sell page - sell form operation ---------------------------
}
