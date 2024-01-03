<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CashTransactionController extends Controller
{
// -------------------------- Add Attachment -----------------------------

    public function transaction_view($id, $type)
    {
        $insurance_request = \App\Models\InsuranceRequest::find($id);
        $type_data = $type;

        return view("company.admin-content.cart_and_payment.transaction_page", compact('insurance_request','type_data'));
    }

// -------------------------- Add Attachment -----------------------------


// -------------------------- Transaction view -----------------------------

    public function attachment_page_update(Request $request, $id)
    {
        return $id;
        $insuranceRequest->update(\request()->all());


    }

// -------------------------- Transaction view -----------------------------
}
