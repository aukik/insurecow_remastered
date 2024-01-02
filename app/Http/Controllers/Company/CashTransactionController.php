<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CashTransactionController extends Controller
{
// -------------------------- Add Attachment -----------------------------

    public function attachment_page($id)
    {
        $insurance_request = \App\Models\InsuranceRequest::find($id);
        return view("company.admin-content.insurance_cash_pay.index", compact('insurance_request'));
    }

// -------------------------- Add Attachment -----------------------------


// -------------------------- Update Attachment -----------------------------

    public function attachment_page_update(Request $request, $id)
    {

        return $id;
        $insuranceRequest->update(\request()->all());

    }

// -------------------------- Update Attachment -----------------------------
}
