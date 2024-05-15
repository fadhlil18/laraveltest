<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    // Display the form and the transaction history
    public function index()
    {
        $transactions = Transaction::all();
        $totalIncome = $transactions->where('type', 'income')->sum('amount');
        $totalExpense = $transactions->where('type', 'expense')->sum('amount');
        $balance = $totalIncome - $totalExpense;

        return view('transactions', compact('transactions', 'balance'));
    }

    // Handle the form submission and store the transaction
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|string'
        ]);

        $transaction = new Transaction();
        $transaction->date = now()->toDateString();
        $transaction->amount = $request->input('amount');
        $transaction->type = $request->input('type');
        $transaction->save();

        return redirect('/');
    }
}
