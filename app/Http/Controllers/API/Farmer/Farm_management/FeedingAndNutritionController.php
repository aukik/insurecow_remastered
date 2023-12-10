<?php

namespace App\Http\Controllers\API\Farmer\Farm_management;

use App\Http\Controllers\Controller;
use App\Models\Farm_management\FeedingAndNutrition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class FeedingAndNutritionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $animalData = auth()->user()->feeding_and_nutrition;

        // Assuming $animalData is a collection or an array
        $formattedAnimalData = $animalData->map(function ($animal) {
            // Modify the data as needed
            // For example, you can add a prefix to the medical_history property
            $animal['feed_consumption_records'] = asset('storage/' . $animal['feed_consumption_records']);

            return $animal;
        });

        // Assuming $formattedAnimalData is a collection or an array
        return response()->json(['animal_data' => $formattedAnimalData], 200);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'cattle_id' => 'required',
                'schedule_date' => 'required',
                'feeding_schedule' => 'required',
                'nutrition_plans' => 'required',
                'feed_consumption_records' => 'required|mimes:jpeg,jpg,png,pdf',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $inputs = $validator->validated();

            if ($request->hasFile('feed_consumption_records')) {
                $inputs['feed_consumption_records'] = $request->file('feed_consumption_records')->store('images');
            }

            $cattleData = auth()->user()->cattleRegister->where('id', $inputs['cattle_id'])->first();

            if (!$cattleData) {
                return response()->json(['error' => 'Cattle data does not exist'], 404);
            }

            auth()->user()->feeding_and_nutrition()->create($inputs);

            return response()->json(['message' => 'Feeding and nutrition data added successfully'], 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->validator->errors()], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {

        $feeding_and_nutrition = FeedingAndNutrition::find($id);

        if (!$feeding_and_nutrition) {
            return response()->json(['message' => 'Feeding and nutrition data does not exists'], 200);
        }

        if ($feeding_and_nutrition->user_id != auth()->user()->id) {
            return response()->json(['error' => 'Invalid request'], 403); // 403 Forbidden
        }

        $feeding_and_nutrition->delete();

        return response()->json(['message' => 'Feeding and nutrition data deleted successfully'], 200);

    }
}
