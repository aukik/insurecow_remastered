<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\Firm;
use Illuminate\Http\Request;

class FirmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == "s") {
            $farms = Firm::orderBy('id', 'desc')->get();
        }else if (auth()->user()->role == "f"){
            $farms = auth()->user()->farm()->orderBy('id', 'desc')->get();

        }else{
            return "Unauthorized entry";
        }

        return view("farmer.admin-content.firm_management.firm.index", compact('farms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("farmer.admin-content.firm_management.firm.create");
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
            'farm_name' => 'required|unique:firms',
            'cattle' => 'required',
            'goat' => 'required',
            'buffalo' => 'required',
            'farm_address' => 'required',
        ]);

        if ($inputs['cattle'] != 0 && $inputs['cattle'] != 1
            || $inputs['goat'] != 0 && $inputs['goat'] != 1
            || $inputs['buffalo'] != 0 && $inputs['buffalo'] != 1) {
            return "Invalid request";
        }


        auth()->user()->farm()->create($inputs);
        session()->flash("success", "Farm info added successfully");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Firm $firm
     * @return \Illuminate\Http\Response
     */
    public function show(Firm $firm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Firm $firm
     * @return \Illuminate\Http\Response
     */
    public function edit(Firm $firm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Firm $firm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Firm $firm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Firm $firm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Firm $firm)
    {
        //
    }
}
