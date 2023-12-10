<?php

namespace App\Http\Controllers\API\Farmer\Farm_management;

use App\Http\Controllers\Controller;
use App\Models\Farm_management\ReproductionAndBreeding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class BreedingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $animalData = auth()->user()->reproduction_and_breeding;

        // Assuming $animalData is a collection or an array
        $formattedAnimalData = $animalData->map(function ($animal) {
            // Modify the data as needed
            // For example, you can add a prefix to the medical_history property
            $animal['fertility_history'] = asset('storage/' . $animal['fertility_history']);

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
                'breeding_date' => 'required',
                'fertility_history' => 'required|mimes:jpeg,jpg,png,pdf',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $inputs = $validator->validated();

            if ($request->hasFile('fertility_history')) {
                $inputs['fertility_history'] = $request->file('fertility_history')->store('images');
            }

            $cattleData = auth()->user()->cattleRegister->where('id', $inputs['cattle_id'])->first();

            if (!$cattleData) {
                return response()->json(['error' => 'Cattle data does not exist'], 404);
            }

            auth()->user()->reproduction_and_breeding()->create($inputs);

            return response()->json(['message' => 'Reproduction and breeding data added successfully'], 201);
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
        $data = ReproductionAndBreeding::find($id);

        if (!$data) {
            return response()->json(['message' => 'Reproduction and breeding data does not exists'], 200);
        }

        if ($data->user_id != auth()->user()->id) {
            return response()->json(['error' => 'Invalid request'], 403); // 403 Forbidden
        }

        $data->delete();

        return response()->json(['message' => 'Reproduction and breeding data deleted successfully'], 200);

    }
}
