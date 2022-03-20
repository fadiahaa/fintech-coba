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
                "amount" => $request->amount,
                "invoice_id" => $invoice_id,
                "type" => $request->type,
                "status" => 2
            ]);

            return redirect()->back();
        }
    }
}
