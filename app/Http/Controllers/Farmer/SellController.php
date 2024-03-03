<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;
use Illuminate\Http\Request;

class SellController extends Controller
{
    // --------------------------- sell page view ---------------------------

    public function sell_page_view($id){

        $animal = CattleRegistration::find($id);


        if (!$animal){
            return "Animal information not found";
        }

        if ($animal->user_id != auth()->user()->id){
            return "Animal does not belongs to the farmer";

        }

        return view('farmer.admin-content.cattle_register.sell_cattle', compact('animal'));
    }

    // --------------------------- sell page view ---------------------------
}
