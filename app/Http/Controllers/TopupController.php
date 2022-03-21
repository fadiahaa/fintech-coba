<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopupController extends Controller
{
    public function index(){
        $balance = Balance::where("user_id", Auth::user()->id)->first();
        return view("pages.user.topup", compact("balance"));
    }



    public function store(Request $request){
        // dd(Balance::where("user_id", Auth::user()->id)->first()->balance);
        if($request->type == 1){
            $invoice_id = "SAL_" . Auth::user()->id . now()->timestamp;

            Transaction::create([
                "user_id" => Auth::user()->id,
                "quantity" => $request->quantity,
                "amount" => $request->amount,
                "invoice_id" => $invoice_id,
                "type" => $request->type,
                "status" => 2
            ]);

            return redirect()->back();
        }
    }

    public function acc_topup($transaction_id){
        $transaction    = Transaction::find($transaction_id);
        $balance        = Balance::where("user_id", $transaction->user_id)->first();

        Balance::where("user_id", $transaction->user_id)->update([
            "balance" => $balance->balance + $transaction->amount   
        ]);
        
        $transaction->update([
            "status"    => 3
        ]);

        return redirect()->back()->with("status", "TopUp Successfully");
    }
}
