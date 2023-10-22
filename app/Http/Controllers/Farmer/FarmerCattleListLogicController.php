<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\CattleRegReport;
use App\Models\Insured;
use App\Models\Order;
use Illuminate\Http\Request;

class FarmerCattleListLogicController extends Controller
{
    public static function claim_detection($id)
    {
        $cattle_reg_report_count = CattleRegReport::where('cattle_id', $id)->Where('verification_report', 'success')->Where('operation', 'claim')->count();

        if ($cattle_reg_report_count > 0) {
            return false;
        } elseif ($cattle_reg_report_count == 0) {
            return true;
        }

        return null;
    }

    public static function insurance_detection($cattle_id){
//        $insurance_claim_detection = Order::where('cattle_id', $id)->Where('status','Processing')->orWhere('status','Complete')->count();
//
//        if ($insurance_claim_detection > 0) {
//            return true;
//        } elseif ($insurance_claim_detection == 0) {
//            return false;
//        }
//
//        return null;

        $insured = Insured::where('cattle_id',$cattle_id)->orderBy('id', 'desc')->first();

        $currentDate = now();

        if (!$insured) {
            return false;
        }

        if ($insured && $insured->package_expiration_date > $currentDate) {
            return true;
        }

        return true;
    }
}
