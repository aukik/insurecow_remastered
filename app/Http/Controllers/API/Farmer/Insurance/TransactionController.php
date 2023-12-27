<?php

namespace App\Http\Controllers\API\Farmer\Insurance;

use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;
use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function insurance_transaction(){
        $transactions = Order::where('user_id', auth()->user()->id)->get();

        $modifiedTransactions = $transactions->map(function ($transaction) {
            $transaction['cattle_name'] = CattleRegistration::find($transaction['cattle_id'])->cattle_name ?? "Animal info not found";
            $transaction['package_name'] = Package::find($transaction['package_id'])->package_name ?? "Package info not found";
            $transaction['insured_to_company_name'] = User::find($transaction['company_id'])->name ?? "Company info not found";
            $transaction['insured_by_company_name'] = User::find($transaction['insurance_requested_company_id'])->name ?? "Company info not found";
            $transaction['farmer_name'] = User::find($transaction['user_id'])->name ?? "Farmer info not found";



            unset($transaction['cattle_id']); // If you want to remove the old "name" key
            unset($transaction['package_id']); // If you want to remove the old "name" key
            unset($transaction['company_id']); // If you want to remove the old "name" key
            unset($transaction['insurance_requested_company_id']); // If you want to remove the old "name" key
            unset($transaction['user_id']); // If you want to remove the old "name" key

            return $transaction;
        });

        return $modifiedTransactions;
    }
}
