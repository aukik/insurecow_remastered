<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\InsuranceCashRequest;
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

        return view('company.admin-content.cart_and_payment.cart', compact('insurance_request'));
    }

//    --------------------- view cart ---------------------

//    --------------------- Information Adding ---------------------


//    --------------------- Information Adding ---------------------
}
