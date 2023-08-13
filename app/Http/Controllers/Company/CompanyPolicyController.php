<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\CompanyPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CompanyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policy = auth()->user()->companyPolicy()->orderBy('id', 'desc')->first();

        return view("company.admin-content.policy.index", compact('policy'));

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
        $inputs = \request()->validate([

            'file' => 'required|mimes:pdf',
        ]);


        if (request('file')) {
            $inputs['file'] = \request('file')->store('policy');
        }

        auth()->user()->companyPolicy()->create($inputs);
        session()->flash('policy', 'Policy Updated Successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\CompanyPolicy $companyPolicy
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyPolicy $companyPolicy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\CompanyPolicy $companyPolicy
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyPolicy $companyPolicy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CompanyPolicy $companyPolicy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyPolicy $companyPolicy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CompanyPolicy $companyPolicy
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyPolicy $companyPolicy)
    {
        //
    }
}
