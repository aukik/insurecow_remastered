<?php

namespace App\Http\Controllers\Farm_management;

use App\Http\Controllers\Controller;
use App\Models\Farm_management\Animal_information;
use Illuminate\Http\Request;

class AnimalInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animal_data = auth()->user()->animal_health;
        return view("farm-management.admin-content.animal-information.index", compact('animal_data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $animal_data = auth()->user()->cattleRegister;
        return view("farm-management.admin-content.animal-information.create", compact('animal_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function store(Request $request)
    {


        $inputs = \request()->validate([
            'cattle_id' => 'required',
            'health_status' => 'required',
            'last_vaccination_date' => 'required',
            'is_pregnant' => 'required|boolean',
            'medical_history' => 'required|mimes:jpeg,jpg,png,pdf',

        ]);

        if (request('medical_history')) {
            $inputs['medical_history'] = \request('medical_history')->store('images');
        }


        $cattle_data = auth()->user()->cattleRegister->where('id', $inputs['cattle_id'])->first();

        if (!$cattle_data) {
            return "Cattle data does not exists";
        }

        auth()->user()->animal_health()->create($inputs);
        session()->flash("success", "Animal health data added successfully");
        return back();

//
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Farm_management\Animal_information $animal_information
     * @return \Illuminate\Http\Response
     */
    public function show(Animal_information $animal_information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Farm_management\Animal_information $animal_information
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal_information $animal_information)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Farm_management\Animal_information $animal_information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal_information $animal_information)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Farm_management\Animal_information $animal_information
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Animal_information $animal_information): \Illuminate\Http\RedirectResponse
    {

        if ($animal_information->user_id != auth()->user()->id){
            return "Invalid request";
        }

        $animal_information->delete();
        session()->flash("success", "Animal health data deleted successfully");
        return back();

    }
}
