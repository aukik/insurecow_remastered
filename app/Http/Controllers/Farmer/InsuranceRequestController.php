<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\company\InsuranceRequest;
use App\Http\Controllers\Controller;
use App\Models\Insured;
use App\Models\Order;
use App\Models\Package;
use App\Models\User;

class InsuranceRequestController extends Controller
{

//    ------------------------ requesting for insurance from farmer side ------------------------
    public function request_for_insurance()
    {
        auth()->user()->farmer_req_for_ins()->create([
            'cattle_id' => request('cattle_id'),
            'package_id' => request('package_id'),
            'company_id' => request('company_id'),
            'insurance_status' => 'requested',
            'package_insurance_period' => request('package_insurance_period'),
        ]);

        session()->flash('success', 'Request sent successfully');
        return redirect()->route('farmer_insurance_request');
    }

//    ------------------------ requesting for insurance from farmer side ------------------------

//    ------------------------ View Insurance History ------------------------

    public function view_insurance_history()
    {
        $insurance_history = auth()->user()->farmer_req_for_ins()->orderBy('id', 'desc')->get();
        return view('farmer.admin-content.insurance_history.view', compact('insurance_history'));
    }

//    ------------------------ View Insurance History ------------------------


//    ------------------------ Package Data ------------------------
    public static function package_id($id)
    {
        $package = Package::find($id);

        return $package->package_name ?? '<span style="color: red">No package found</span>';
    }


//    ------------------------ Package Data ------------------------

//    ------------------------ Company Data ------------------------
    public static function company_data($id)
    {
        $user = User::find($id);
        return $user->name ?? '<span style="color: red">Company information not found</span>';
    }


//    ------------------------ Company Data ------------------------


//    ------------------------ Package Policy ------------------------
    public static function package_policy($id)
    {
        $package = Package::find($id);

        return $package->policy ?? '<span style="color: red">No policy found</span>';
    }

//    ------------------------ Package Policy ------------------------

//    ------------------------ Farmer Name ------------------------
    public static function farmer_name($id)
    {
        $user = User::find($id);
        return $user->name ?? '<span style="color: red">Farmer information not found</span>';
    }

//    ------------------------ Farmer Name ------------------------

//    ------------------------ Insurance status check bought by farmer ------------------------

    public static function insurance_buy_status($cattle_id)
    {
       $insured = Insured::where('cattle_id',$cattle_id)->orderBy('id', 'desc')->first();

        $currentDate = now();

        if (!$insured) {
            return true;
        }

        if ($insured && $insured->package_expiration_date > $currentDate) {
            return false;
        }

        return true;
    }


//    ------------------------ Insurance status check bought by farmer ------------------------

//    ------------------------ Insurance status check bought by company ------------------------

    public static function insurance_buy_company($cattle_id)
    {
        $insured = Insured::where('cattle_id',$cattle_id)->orderBy('id', 'desc')->first();

        $currentDate = now();

        if (!$insured) {
            return "Not Paid";
        }else{
            return "paid";
        }


    }


//    ------------------------ Insurance status check bought by company ------------------------

//    ------------------------ Insurance status check bought by farmer ------------------------

//    public static function insurance_recent_attempt($id)
//    {
//        $order = Order::where('insurance_request_id', $id)->orderBy('id', 'desc')->first();
//
//        if (!$order) {
//            return "No Transaction status";
//        }
//
//        return $order->status;
//
//
//    }


//    ------------------------ Insurance status check bought by farmer ------------------------


}
