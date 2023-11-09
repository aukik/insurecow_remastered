<?php

namespace App\Http\Controllers\Farm_management\Financial;

use App\Http\Controllers\Controller;
use App\Models\Farm_management\financial\IncomeAndSell;
use Illuminate\Http\Request;

class IncomeAndSellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $animal_data = auth()->user()->income_and_sells;
        return view("farm-management.admin-content.financial.incomeAndSells.index", compact('animal_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $animal_data = auth()->user()->cattleRegister;
        return view("farm-management.admin-content.financial.incomeAndSells.create", compact('animal_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = \request()->validate([
            'cattle_id' => 'required',
            'record_date' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'type' => 'required',

        ]);


        $cattle_data = auth()->user()->cattleRegister->where('id', $inputs['cattle_id'])->first();

        if (!$cattle_data) {
            return "Cattle data does not exists";
        }

        auth()->user()->income_and_sells()->create($inputs);
        session()->flash("success", "Data added successfully");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Farm_management\financial\IncomeAndSell $incomeAndSell
     * @return \Illuminate\Http\Response
     */
    public function show(IncomeAndSell $incomeAndSell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Farm_management\financial\IncomeAndSell $incomeAndSell
     * @return \Illuminate\Http\Response
     */
    public function edit(IncomeAndSell $incomeAndSell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Farm_management\financial\IncomeAndSell $incomeAndSell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IncomeAndSell $incomeAndSell)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Farm_management\financial\IncomeAndSell $incomeAndSell
     * @return string
     */
    public function destroy(IncomeAndSell $incomeAndSell)
    {
        if ($incomeAndSell->user_id != auth()->user()->id) {
            return "Invalid request";
        }

        $incomeAndSell->delete();
        session()->flash("success", "Expense data deleted successfully");
        return back();
    }
}
