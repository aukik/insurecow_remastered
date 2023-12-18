<?php

namespace App\Http\Controllers\Farm_management\Financial;

use App\Http\Controllers\Controller;
use App\Models\Farm_management\financial\Expense;
use App\Models\Farm_management\financial\IncomeAndSell;
use Illuminate\Http\Request;

class ProfitAndLossController extends Controller
{

// ------------------------------------------------------------- Profit of loss calculation - with daily report -------------------------------------------------------------

    public function generateReport(Request $request)
    {

        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');

        // Convert the end date to the end of the day
        $endDate = date('Y-m-d 23:59:59', strtotime($endDate));

        $income = auth()->user()->income_and_sells()->whereBetween('created_at', [$startDate, $endDate])->sum('amount');
        $expenses = auth()->user()->expense()->whereBetween('created_at', [$startDate, $endDate])->sum('amount');
        $daily_expenses = auth()->user()->daily_expense()->whereBetween('created_at', [$startDate, $endDate])->sum('amount');

        $income_data = auth()->user()->income_and_sells()->whereBetween('created_at', [$startDate, $endDate])->get();
        $expenses_data = auth()->user()->expense()->whereBetween('created_at', [$startDate, $endDate])->get();
        $daily_expenses_data = auth()->user()->daily_expense()->whereBetween('created_at', [$startDate, $endDate])->get();


        $profitOrLoss = $income - ($expenses + $daily_expenses);

        return view('farm-management.admin-content.profit-and-loss-report.index', compact('startDate', 'endDate', 'income', 'expenses', 'profitOrLoss','income_data','expenses_data','daily_expenses_data'));
    }

// ------------------------------------------------------------- Profit of loss calculation - with daily report -------------------------------------------------------------

// ------------------------------------------------------------- Profit of loss calculation -  Based on individual animal with report -------------------------------------------------------------

    public function generateReportBasedOnAnimal(Request $request)
    {

        $animal_data = auth()->user()->cattleRegister;


        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');
        $animal_data_specific = $request->get('cattle_id');

//        ---------------------------------- Specific animal name ----------------------------------

        $animal_information_name = auth()->user()->cattleRegister()->where('id', $animal_data_specific)->get();

//        ---------------------------------- Specific animal name ----------------------------------

        // Convert the end date to the end of the day
        $endDate = date('Y-m-d 23:59:59', strtotime($endDate));

        $income = auth()->user()->income_and_sells()->where('cattle_id',$animal_data_specific)->whereBetween('created_at', [$startDate, $endDate])->sum('amount');
        $expenses = auth()->user()->expense()->where('cattle_id',$animal_data_specific)->whereBetween('created_at', [$startDate, $endDate])->sum('amount');
//        $daily_expenses = auth()->user()->daily_expense()->whereBetween('created_at', [$startDate, $endDate])->sum('amount');

        $profitOrLoss = $income - $expenses;

        $income_data = auth()->user()->income_and_sells()->where('cattle_id',$animal_data_specific)->whereBetween('created_at', [$startDate, $endDate])->get();
        $expenses_data = auth()->user()->expense()->where('cattle_id',$animal_data_specific)->whereBetween('created_at', [$startDate, $endDate])->get();


//        return view('farm-management.admin-content.profit-and-loss-report.index-individual', compact('animal_data'));
        return view('farm-management.admin-content.profit-and-loss-report.index-individual', compact('startDate', 'endDate', 'income', 'expenses', 'profitOrLoss', 'animal_data', 'animal_information_name','income_data','expenses_data'));
    }


// ------------------------------------------------------------- Profit of loss calculation - Based on individual animal with report -------------------------------------------------------------


    public function generateReportViaApi(Request $request)
    {

        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');

        // Convert the end date to the end of the day
        $endDate = date('Y-m-d 23:59:59', strtotime($endDate));

        $income = auth()->user()->income_and_sells()->whereBetween('created_at', [$startDate, $endDate])->sum('amount');
        $expenses = auth()->user()->expense()->whereBetween('created_at', [$startDate, $endDate])->sum('amount');
        $daily_expenses = auth()->user()->daily_expense()->whereBetween('created_at', [$startDate, $endDate])->sum('amount');


        $profitOrLoss = $income - ($expenses + $daily_expenses);

//        return view('farm-management.admin-content.profit-and-loss-report.index', compact('startDate', 'endDate', 'income', 'expenses', 'profitOrLoss'));

        return response()->json([
            'start_date' => $startDate,
            'end_date' => $endDate,
            'income' => $income,
            'expenses' => $expenses,
            'profit_or_loss' => $profitOrLoss
        ], 200);
    }
}
