<?php

namespace App\Http\Controllers\API\Farmer\Farm_management;

use App\Http\Controllers\Controller;
use App\Models\Farm_management\Animal_information;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AnimalInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $animalData = auth()->user()->animal_health;

        // Assuming $animalData is a collection or an array
        $formattedAnimalData = $animalData->map(function ($animal) {
            $animal['medical_history'] = asset('storage/' . $animal['medical_history']);
            return $animal;
        });

        // Assuming $animalData is a collection or an array
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
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'cattle_id' => 'required',
                'health_status' => 'required|string|max:255', // Adjust the max length as needed
                'last_vaccination_date' => 'required',
                'is_pregnant' => 'required|boolean',
                'medical_history' => 'required|mimes:jpeg,jpg,png,pdf',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $inputs = $validator->validated();

            if ($request->hasFile('medical_history')) {
                $inputs['medical_history'] = $request->file('medical_history')->store('images');
            }

            $cattleData = auth()->user()->cattleRegister->where('id', $inputs['cattle_id'])->first();

            if (!$cattleData) {
                return response()->json(['error' => 'Cattle data does not exist'], 404);
            }

            auth()->user()->animal_health()->create($inputs);

            return response()->json(['message' => 'Animal health data added successfully'], 201);
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
     * @return JsonResponse
     */
    public function destroy($id)
    {

        $animal_information = Animal_information::find($id);

        if (!$animal_information) {
            return response()->json(['message' => 'Animal health data does not exists'], 200);
        }

        if ($animal_information->user_id != auth()->user()->id) {
            return response()->json(['error' => 'Invalid request'], 403); // 403 Forbidden
        }

        $animal_information->delete();

        return response()->json(['message' => 'Animal health data deleted successfully'], 200);
    }
}
