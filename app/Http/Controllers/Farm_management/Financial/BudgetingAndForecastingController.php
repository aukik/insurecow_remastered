<?php

namespace App\Http\Controllers\Farm_management\Financial;

use App\Http\Controllers\Controller;
use App\Models\Farm_management\financial\BudgetingAndForecasting;
use Illuminate\Http\Request;

class BudgetingAndForecastingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $animal_data = auth()->user()->budget_and_forecasting;
        return view("farm-management.admin-content.financial.budget-and-forecasting.index", compact('animal_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $animal_data = auth()->user()->cattleRegister;
        return view("farm-management.admin-content.financial.budget-and-forecasting.create", compact('animal_data'));
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
            'budget_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'total_income' => 'required',
            'total_expenses' => 'required',
            'net_profit' => 'required',
        ]);


        $cattle_data = auth()->user()->cattleRegister->where('id', $inputs['cattle_id'])->first();

        if (!$cattle_data) {
            return "Cattle data does not exists";
        }

        auth()->user()->budget_and_forecasting()->create($inputs);
        session()->flash("success", "Data added successfully");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Farm_management\financial\BudgetingAndForecasting $budgetingAndForecasting
     * @return \Illuminate\Http\Response
     */
    public function show(BudgetingAndForecasting $budgetingAndForecasting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Farm_management\financial\BudgetingAndForecasting $budgetingAndForecasting
     * @return \Illuminate\Http\Response
     */
    public function edit(BudgetingAndForecasting $budgetingAndForecasting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Farm_management\financial\BudgetingAndForecasting $budgetingAndForecasting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BudgetingAndForecasting $budgetingAndForecasting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Farm_management\financial\BudgetingAndForecasting $budgetingAndForecasting
     * @return string
     */
    public function destroy($id)
    {

        $budgetingAndForecasting = BudgetingAndForecasting::find($id);

        if ($budgetingAndForecasting->user_id != auth()->user()->id) {
            return "Invalid request";
        }

        $budgetingAndForecasting->delete();
        session()->flash("success", "Expense data deleted successfully");
        return back();
    }
}
