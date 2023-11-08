<?php

namespace App\Http\Controllers\Farm_management;

use App\Http\Controllers\Controller;
use App\Models\Farm_management\FeedingAndNutrition;
use Illuminate\Http\Request;

class FeedingAndNutritionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $animal_data = auth()->user()->feeding_and_nutrition;
        return view("farm-management.admin-content.food-and-nutrition.index", compact('animal_data'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $animal_data =  $animal_data = auth()->user()->cattleRegister;;
        return view("farm-management.admin-content.food-and-nutrition.create", compact('animal_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = \request()->validate([
            'cattle_id' => 'required',
            'schedule_date' => 'required',
            'feeding_schedule' => 'required',
            'nutrition_plans' => 'required',
            'feed_consumption_records' => 'required|mimes:jpeg,jpg,png,pdf',

        ]);

        if (request('feed_consumption_records')) {
            $inputs['feed_consumption_records'] = \request('feed_consumption_records')->store('images');
        }


        $cattle_data = auth()->user()->cattleRegister->where('id', $inputs['cattle_id'])->first();

        if (!$cattle_data) {
            return "Cattle data does not exists";
        }

        auth()->user()->feeding_and_nutrition()->create($inputs);
        session()->flash("success", "Animal health data added successfully");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Farm_management\FeedingAndNutrition  $feedingAndNutrition
     * @return \Illuminate\Http\Response
     */
    public function show(FeedingAndNutrition $feedingAndNutrition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Farm_management\FeedingAndNutrition  $feedingAndNutrition
     * @return \Illuminate\Http\Response
     */
    public function edit(FeedingAndNutrition $feedingAndNutrition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Farm_management\FeedingAndNutrition  $feedingAndNutrition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeedingAndNutrition $feedingAndNutrition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Farm_management\FeedingAndNutrition  $feedingAndNutrition
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeedingAndNutrition $feedingAndNutrition)
    {

        if ($feedingAndNutrition->user_id != auth()->user()->id){
            return "Invalid request";
        }

        $feedingAndNutrition->delete();
        session()->flash("success", "Feeding and nutrition data deleted successfully");
        return back();
    }
}
