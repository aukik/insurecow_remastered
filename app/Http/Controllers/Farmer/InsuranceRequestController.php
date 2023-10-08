<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
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

        session('request','Request sent successfully');
        return back();
    }

//    ------------------------ requesting for insurance from farmer side ------------------------

//    ------------------------ View Insurance History ------------------------

    public function view_insurance_history()
    {
        $insurance_history = auth()->user()->farmer_req_for_ins()->orderBy('id','desc')->get();
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

    public static function insurance_buy_status($id)
    {
        return $id;
    }


//    ------------------------ Insurance status check bought by farmer ------------------------





}
