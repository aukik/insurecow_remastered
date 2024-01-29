<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\InsuranceCashRequest;
use App\Models\Insured;
use Illuminate\Http\Request;

class CartController extends Controller
{
//    --------------------- view cart ---------------------

    public function cart($id)
    {
        $insurance_request = \App\Models\InsuranceRequest::find($id);

        if (!$insurance_request) {
            return "Insurance request data not found";
        }

        $insured = Insured::where('cattle_id', $insurance_request->cattle_id)->orderBy('id', 'desc')->first();

        if (!$insured || $insured->package_expiration_date < now()) {
            return view('company.admin-content.cart_and_payment.cart', compact('insurance_request'));
        }else{
            return "The animal is already insured";
        }




    }

//    --------------------- view cart ---------------------

}
