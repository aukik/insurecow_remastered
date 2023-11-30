<?php

namespace App\Http\Controllers\API\Farmer\Farm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $farms = auth()->user()->farm()->orderBy('id', 'desc')->get();

        $farm_count = auth()->user()->farm()->count();


        if ($farms->isEmpty()) {

            $defaultFarmData = (object)[
                'id' => 1,
                'farm_name' => 'No Farm',
            ];

            return response()->json(['farm_count' => $farm_count, 'message' => 'No farms found for this user', 'data' => [$defaultFarmData]], 404);
        }

        return response()->json(['farm_count' => $farm_count, 'message' => 'Farms retrieved successfully', 'data' => $farms], 200);
    }


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

        return response()->json(['test_data',$request->all()],200);

        $inputs = [];
        $inputs['farm_name'] = $request->input('farm_name');
        $inputs['cattle'] = $request->input('cattle');
        $inputs['goat'] = $request->input('goat');
        $inputs['buffalo'] = $request->input('buffalo');
        $inputs['farm_address'] = $request->input('farm_address');

//
//        $missingFields = [];
//
//        foreach ($inputs as $field => $value) {
//            if (empty($value)) {
//                $missingFields[] = $field;
//            }
//        }
//
//        if (!empty($missingFields)) {
//            $response = [
//                'error' => 'Missing required fields',
//                'missing_fields' => $missingFields
//            ];
//
//            return response()->json($response, 400); // Return a JSON error response with a 400 status code
//        }


        $missingFields = [];

        foreach ($inputs as $field => $value) {
            if (!isset($value) || $value === '') {
                $missingFields[] = $field;
            }
        }

        if (!empty($missingFields)) {
            $response = [
                'error' => 'Missing required fields',
                'missing_fields' => $missingFields
            ];

            return response()->json($response, 400); // Return a JSON error response with a 400 status code
        }


        // Check if the input values for cattle, goat, and buffalo are either 0 or 1
        if ($inputs['cattle'] != 0 && $inputs['cattle'] != 1
            || $inputs['goat'] != 0 && $inputs['goat'] != 1
            || $inputs['buffalo'] != 0 && $inputs['buffalo'] != 1) {
            return response()->json(['message' => 'value should be between 0 and 1 for cattle, goat, buffalo'], 400);
        }

        // Check if the 'farm_name' already exists in the database
        $existingFarm = auth()->user()->farm()->where('farm_name', $inputs['farm_name'])->first();

        if ($existingFarm) {
            return response()->json(['message' => 'Farm with this name already exists'], 400);
        }

        // If the input values are valid and 'farm_name' is unique, create the farm
        $newFarm = auth()->user()->farm()->create($inputs);

        return response()->json(['message' => 'Farm created successfully', 'data' => $newFarm], 201);

    }

    public function show($id)
    {
        $farm = auth()->user()->farm()->find($id);

        if (!$farm) {
            // If the farm with the given ID is not found, return a response with an error message.
            return response()->json(['message' => 'Farm not found'], 404);
        }

        // If the farm is found, return it with a success message.
        return response()->json(['message' => 'Farm retrieved successfully', 'data' => $farm], 200);
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


    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
