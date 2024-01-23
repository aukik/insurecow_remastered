<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Psy\Util\Json;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $packages = auth()->user()->companyPackage()->get();

        return view("company.admin-content.create-package.view", compact('packages'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view("company.admin-content.create-package.index");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $inputs = \request()->validate([
            'package_name' => 'required',
            'insurance_period' => 'required|numeric',
            'coverage' => 'required',
            'quotation' => 'required',
            'policy' => 'required|mimes:pdf',
            'discount' => 'required|integer',
            'rate' => 'required|integer',
            'vat' => 'required|integer',
        ]);

        if (request('policy')) {
            $inputs['policy'] = \request('policy')->store('policy');
        }

        session()->flash("success", "Package Added Successfully");

        auth()->user()->companyPackage()->create($inputs);

        return redirect()->route('package.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Package $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Package $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        return view("company.admin-content.create-package.edit", compact('package'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Package $package
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Package $package)
    {
        $inputs = \request()->validate([
            'package_name' => 'required',
            'insurance_period' => 'required|numeric',
            'coverage' => 'required',
            'quotation' => 'required',
            'policy' => 'mimes:pdf',
            'discount' => 'required|integer',
            'rate' => 'required|integer',
            'vat' => 'required|integer',
        ]);

        if (request('policy')) {
            $inputs['policy'] = \request('policy')->store('policy');
        } else {
            $inputs['policy'] = $package->policy;
        }

        session()->flash("success", "Package Added Successfully");

//        auth()->user()->companyPackage()->create($inputs);

        if ($package->user_id == auth()->user()->id) {
            $package->update($inputs);
        } else {
            abort(404);
        }

        session()->flash("success", "Package name - " . "'" . $inputs['package_name'] . "'" . " Updated Successfully");

        return redirect()->route('package.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Package $package
     * @return string
     */
    public function destroy(Package $package)
    {
        if (!$package) {
            return "package does not exists";
        }

        if ($package->user_id != auth()->id()) {
            return "package data does not belongs to this company";
        }

        if (\App\Models\InsuranceRequest::where('package_id', $package->id)->count() > 0) {
            return "Data is associated with the package, unable to delete";
        }

        session()->flash("success", "Package name - " . "'" . $package->package_name . "'" . " Deleted Successfully");

        $package->delete();

        return redirect()->route('package.index');


    }
}
