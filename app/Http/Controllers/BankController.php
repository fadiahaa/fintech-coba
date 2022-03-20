<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function get_transaction() {
        $transactions = Transaction::all();
        return view('pages.bank.index', compact('transactions'));
    }
    public function acc_transaction() {

    }
}
