<?php

namespace App\Http\Controllers\API\Farmer\Farm_management;

use App\Http\Controllers\Controller;
use App\Models\Farm_management\financial\IncomeAndSell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class IncomeAndSellsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $animalData = auth()->user()->income_and_sells;

        // Assuming $formattedAnimalData is a collection or an array
        return response()->json(['data' => $animalData], 200);
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
                'record_date' => 'required',
                'description' => 'required',
                'amount' => 'required',
                'type' => 'required',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $inputs = $validator->validated();

            $cattleData = auth()->user()->cattleRegister->where('id', $inputs['cattle_id'])->first();

            if (!$cattleData) {
                return response()->json(['error' => 'Cattle data does not exist'], 404);
            }

            auth()->user()->income_and_sells()->create($inputs);

            return response()->json(['message' => 'Income and sells data added successfully'], 201);
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
        $data = IncomeAndSell::find($id);

        if (!$data) {
            return response()->json(['message' => 'Income and sells data does not exists'], 200);
        }

        if ($data->user_id != auth()->user()->id) {
            return response()->json(['error' => 'Invalid request'], 403); // 403 Forbidden
        }

        $data->delete();

        return response()->json(['message' => 'Income and sells data deleted successfully'], 200);
    }
}
