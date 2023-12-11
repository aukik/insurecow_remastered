<?php

namespace App\Http\Controllers\API\Farmer\Farm_management;

use App\Http\Controllers\Controller;
use App\Models\Farm_management\financial\BudgetingAndForecasting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class BudgetAndForecastingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $animal_data = auth()->user()->budget_and_forecasting;

        return response()->json(['data' => $animal_data], 200);
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
                'budget_name' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'total_income' => 'required',
                'total_expenses' => 'required',
                'net_profit' => 'required',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $inputs = $validator->validated();

            $cattleData = auth()->user()->cattleRegister->where('id', $inputs['cattle_id'])->first();

            if (!$cattleData) {
                return response()->json(['error' => 'Cattle data does not exist'], 404);
            }

            auth()->user()->budget_and_forecasting()->create($inputs);

            return response()->json(['message' => 'Budget and forecasting data added successfully'], 201);
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
        $data = BudgetingAndForecasting::find($id);

        if (!$data) {
            return response()->json(['message' => 'Budget and forecasting data does not exists'], 200);
        }

        if ($data->user_id != auth()->user()->id) {
            return response()->json(['error' => 'Invalid request'], 403); // 403 Forbidden
        }

        $data->delete();

        return response()->json(['message' => 'Budget and forecasting data deleted successfully'], 200);
    }
}
