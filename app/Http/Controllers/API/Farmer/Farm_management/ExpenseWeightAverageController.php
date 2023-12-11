<?php

namespace App\Http\Controllers\API\Farmer\Farm_management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ExpenseWeightAverageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $animalData = auth()->user()->expense;

        // Assuming $formattedAnimalData is a collection or an array
        return response()->json(['expense_data' => $animalData], 200);
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
                'item_name' => 'required',
                'expense_date' => 'required',
                'description' => 'required',
                'amount' => 'required',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $inputs = $validator->validated();

            $animal_data = auth()->user()->cattleRegister;
            $sum_of_animals_weight = auth()->user()->cattleRegister->sum('weight');

            $calculated_data = $inputs['amount'] / $sum_of_animals_weight;

            foreach ($animal_data as $data) {

                $inputs['amount'] = $data->weight * $calculated_data;
                $inputs['category'] = "Expense Weight Average";
                $inputs['cattle_id'] = $data->id;

                auth()->user()->expense()->create($inputs);
            }


            return response()->json(['message' => 'Expense weight average data added successfully'], 201);
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
