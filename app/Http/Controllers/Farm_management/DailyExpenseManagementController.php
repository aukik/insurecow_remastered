<?php

namespace App\Http\Controllers\Farm_management;

use App\Http\Controllers\Controller;
use App\Models\Farm_management\DailyExpenseManagement;
use Illuminate\Http\Request;

class DailyExpenseManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $animal_data = auth()->user()->daily_expense;
        return view("farm-management.admin-content.financial.daily-expense.index", compact('animal_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view("farm-management.admin-content.financial.daily-expense.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $inputs = \request()->validate([
            'expense_date' => 'required',
            'description' => 'required',
            'amount' => 'required',

        ]);


        auth()->user()->daily_expense()->create($inputs);
        session()->flash("success", "Daily expense data added successfully");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Farm_management\DailyExpenseManagement  $dailyExpenseManagement
     * @return \Illuminate\Http\Response
     */
    public function show(DailyExpenseManagement $dailyExpenseManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Farm_management\DailyExpenseManagement  $dailyExpenseManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(DailyExpenseManagement $dailyExpenseManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Farm_management\DailyExpenseManagement  $dailyExpenseManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DailyExpenseManagement $dailyExpenseManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return string
     */
    public function destroy($id)
    {

        $dailyExpenseManagement = DailyExpenseManagement::findOrFail($id);

        if ($dailyExpenseManagement->user_id != auth()->user()->id){
            return "Invalid request";
        }

        $dailyExpenseManagement->delete();
        session()->flash("success", "Daily expense data deleted successfully");
        return back();
    }
}
