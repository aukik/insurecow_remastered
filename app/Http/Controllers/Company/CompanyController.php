<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function registered_farmers()
    {
        $users = User::where('company_id', auth()->user()->id)->get();
        return view('company.admin-content.history.index', compact('users'));
    }
}
