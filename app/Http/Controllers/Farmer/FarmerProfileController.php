<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\FarmerProfile;
use Illuminate\Http\Request;

class FarmerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        if (auth()->user()->farmerProfile()->orderBy('id', 'desc')->count() == 0) {
            return view('farmer.admin-content.profile.index');
        } else {
            $profile = auth()->user()->farmerProfile()->orderBy('id', 'desc')->first();
            return view('farmer.admin-content.profile.update', compact('profile'));
        }
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
            'fathers_name' => 'required',
            'mothers_name' => 'required',
            'present_address' => 'required',
            'dob' => 'required',
            'nid' => 'required',
            'source_of_income' => 'required',
            'bank_account_no' => 'required',
            'farmer_address' => 'required',
            'thana' => 'required',
            'upazilla' => 'required',
            'union' => 'required',
            'city' => 'required',
            'district' => 'required',
            'zip_code' => 'required',
            'village' => 'required',
            'loan_amount' => 'required',
            'num_of_livestock' => 'required',
            'type_of_livestock' => 'required',
//            'sum_insured' => 'required',
            'nationality' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        if (request('image')) {
            $inputs['image'] = \request('image')->store('images');
        }

        auth()->user()->farmerProfile()->create($inputs);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\FarmerProfile $farmerProfile
     * @return \Illuminate\Http\Response
     */
    public function show(FarmerProfile $farmerProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\FarmerProfile $farmerProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(FarmerProfile $farmerProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FarmerProfile $farmerProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FarmerProfile $farmerProfile)
    {


        $inputs = \request()->validate([
            'fathers_name' => 'required',
            'mothers_name' => 'required',
            'present_address' => 'required',
            'dob' => 'required',
            'nid' => 'required',
            'source_of_income' => 'required',
            'bank_account_no' => 'required',
            'farmer_address' => 'required',
            'thana' => 'required',
            'upazilla' => 'required',
            'union' => 'required',
            'city' => 'required',
            'district' => 'required',
            'zip_code' => 'required',
            'village' => 'required',
            'loan_amount' => 'required',
            'num_of_livestock' => 'required',
            'type_of_livestock' => 'required',
//            'sum_insured' => 'required',
            'nationality' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);

        if (request('image')) {
            $inputs['image'] = \request('image')->store('images');
        } else {
            $inputs['image'] = $farmerProfile->image;
        }

        auth()->user()->farmerProfile()->where('id', $farmerProfile->id)->update($inputs);
        session()->flash('update', 'Farmer Profile Updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\FarmerProfile $farmerProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(FarmerProfile $farmerProfile)
    {
        //
    }
}
