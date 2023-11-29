<?php

namespace App\Http\Controllers\API\Farmer\Insurance;

use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;
use App\Models\Insured;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function checkInsurance($cattle_id)
    {

        $insured_cattle = Insured::where('cattle_id', $cattle_id)->first();

        if ($insured_cattle === null) {
            return response()->json([
                'message' => 'Cattle is not insured',
                'insurance_status' => false
            ], 404);
        }

        if ($insured_cattle->user_id != auth()->user()->id) {
            return response()->json([
                'message' => 'Unauthorized Entry'
            ], 422);
        }

        if ($insured_cattle) {
            return response()->json([
                'message' => 'Cattle is insured',
                'insurance_status' => true,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Cattle is not insured',
                'insurance_status' => false,
            ], 200);
        }

    }
}
