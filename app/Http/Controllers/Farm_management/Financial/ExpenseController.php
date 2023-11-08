<?php

namespace App\Http\Controllers\Farm_management\Financial;

use App\Http\Controllers\Controller;
use App\Models\Farm_management\financial\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $animal_data = auth()->user()->expense;
        return view("farm-management.admin-content.financial.expense.index", compact('animal_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $animal_data = auth()->user()->cattleRegister;
        return view("farm-management.admin-content.financial.expense.create", compact('animal_data'));
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
            'expense_date' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'category' => 'required',

        ]);


        $cattle_data = auth()->user()->cattleRegister->where('id', $inputs['cattle_id'])->first();

        if (!$cattle_data) {
            return "Cattle data does not exists";
        }

        auth()->user()->expense()->create($inputs);
        session()->flash("success", "Expense data added successfully");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Farm_management\financial\Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Farm_management\financial\Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Farm_management\financial\Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Farm_management\financial\Expense $expense
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Expense $expense)
    {

        if ($expense->user_id != auth()->user()->id){
            return "Invalid request";
        }

        $expense->delete();
        session()->flash("success", "Expense data deleted successfully");
        return back();
    }
}
