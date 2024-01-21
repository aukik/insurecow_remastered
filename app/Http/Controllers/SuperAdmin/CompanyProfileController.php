<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index($id)
    {
        $user = User::find($id);

        if (!$user) {
            return "Information does not exists";
        }

        if ($user->role != "c") {
            return "User is not a company";
        }

        return view("company.admin-content.account-profile.update", compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CompanyProfile $companyProfile
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyProfile $companyProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\CompanyProfile $companyProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyProfile $companyProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompanyProfile $companyProfile
     * @return string
     */
    public function update(Request $request, $id)
    {

        $inputs = \request()->validate([
            'ac_info' => 'nullable',
            'account' => 'nullable',
            'bank_name' => 'nullable',
            'branch_name' => 'nullable',
            'routing_no' => 'nullable',
            'instruction' => 'nullable',
            'company_logo' => 'nullable|mimes:jpeg,jpg,png',
            'name' => 'nullable',
            'password' => 'nullable',
        ]);


        $company = User::find($id);

        if (request()->hasFile('company_logo')) {
            $inputs['company_logo'] = \request('company_logo')->store('images');
        }

        if (!$company) {
            return "Company information does not exists";
        }

        $inputs['password'] = Hash::make($inputs['password']);

        $company->update($inputs);

        session()->flash("success", "Information updated successfully");
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CompanyProfile $companyProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyProfile $companyProfile)
    {
        //
    }
}
