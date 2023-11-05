<?php

namespace App\Http\Controllers\Farm_management;

use App\Http\Controllers\Controller;
use App\Models\Farm_management\ReproductionAndBreeding;
use Illuminate\Http\Request;

class ReproductionAndBreedingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $animal_data = auth()->user()->reproduction_and_breeding;
        return view("farm-management.admin-content.reproduction-and-breeding.index", compact('animal_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $animal_data = auth()->user()->cattleRegister;
        return view("farm-management.admin-content.reproduction-and-breeding.create", compact('animal_data'));
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
            'cattle_id' => 'required',
            'breeding_date' => 'required',
            'fertility_history' => 'required|mimes:jpeg,jpg,png,pdf',
        ]);


        if (request('fertility_history')) {
            $inputs['fertility_history'] = \request('fertility_history')->store('images');
        }


        $cattle_data = auth()->user()->cattleRegister->where('id', $inputs['cattle_id'])->first();

        if (!$cattle_data) {
            return "Cattle data does not exists";
        }

        auth()->user()->reproduction_and_breeding()->create($inputs);
        session()->flash("success", "Reproduction and breeding data added successfully");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Farm_management\ReproductionAndBreeding $reproductionAndBreeding
     * @return \Illuminate\Http\Response
     */
    public function show(ReproductionAndBreeding $reproductionAndBreeding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Farm_management\ReproductionAndBreeding $reproductionAndBreeding
     * @return \Illuminate\Http\Response
     */
    public function edit(ReproductionAndBreeding $reproductionAndBreeding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Farm_management\ReproductionAndBreeding $reproductionAndBreeding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReproductionAndBreeding $reproductionAndBreeding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Farm_management\ReproductionAndBreeding $reproductionAndBreeding
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReproductionAndBreeding $reproductionAndBreeding)
    {
        //
    }
}
