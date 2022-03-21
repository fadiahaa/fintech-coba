<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function get_transaction() {
        $transactions = Transaction::all();
        return view('pages.bank.index', compact('transactions'));
    }

    public function acc_transaction($transaction_id) {
        $subs = Transaction::where("type", 1)
                        ->where("status", 2)
                        ->get();

        return view('bank', compact("subs"));
    }
}
