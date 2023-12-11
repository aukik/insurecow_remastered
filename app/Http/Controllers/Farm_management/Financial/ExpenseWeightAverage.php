<?php

namespace App\Http\Controllers\Farm_management\Financial;

use App\Http\Controllers\Controller;
use App\Models\Farm_management\financial\Expense;
use Illuminate\Http\Request;

class ExpenseWeightAverage extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return redirect()->route("expense_weight_average.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view("farm-management.admin-content.financial.expense-weight-average.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $inputs = \request()->validate([
            'item_name' => 'required',
            'expense_date' => 'required',
            'description' => 'required',
            'amount' => 'required',
        ]);


        $animal_data = auth()->user()->cattleRegister;
        $sum_of_animals_weight = auth()->user()->cattleRegister->sum('weight');

        $calculated_data = $inputs['amount'] / $sum_of_animals_weight;

        foreach ($animal_data as $data) {

            $inputs['amount'] = $data->weight * $calculated_data;
            $inputs['category'] = "Expense Weight Average";
            $inputs['cattle_id'] = $data->id;

            auth()->user()->expense()->create($inputs);
        }

        session()->flash("success", "Expense data based on weight average added successfully");
        return back();


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
        $data = Expense::find($id);

        if (!$data) {
            return response()->json(['message' => 'Expense data does not exists'], 200);
        }

        if ($data->user_id != auth()->user()->id) {
            return response()->json(['error' => 'Invalid request'], 403); // 403 Forbidden
        }

        $data->delete();

        return response()->json(['message' => 'Expense weight average data deleted successfully'], 200);
    }
}
