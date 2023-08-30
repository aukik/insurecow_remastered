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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = auth()->user()->companyPackage()->get();

        return view("company.admin-content.create-package.view", compact('packages'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("company.admin-content.create-package.index");
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
            'package_name' => 'required',
            'insurance_period' => 'required|numeric',
            'coverage' => 'required',
            'quotation' => 'required',
            'policy' => 'required|mimes:pdf',
            'discount' => 'required|integer',
            'rate' => 'required|integer',
            'vat' => 'required|integer',
        ]);

        $inputs['coverage'] = Json::encode($request->coverage);

        if (request('policy')) {
            $inputs['policy'] = \request('policy')->store('policy');
        }

        session()->flash("success","Package Added Successfully");

        auth()->user()->companyPackage()->create($inputs);

        return back();
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
     * @return \Illuminate\Http\Response
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

        $inputs['coverage'] = Json::encode($request->coverage);

        if (request('policy')) {
            $inputs['policy'] = \request('policy')->store('policy');
        }else{
            $inputs['policy'] = $package->policy;
        }

        session()->flash("success","Package Added Successfully");

//        auth()->user()->companyPackage()->create($inputs);

        if($package->user_id == auth()->user()->id){
            $package->update($inputs);
        }else{
            abort(404);
        }

        session()->flash("success","Package Updated Successfully");

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Package $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
    }
}
