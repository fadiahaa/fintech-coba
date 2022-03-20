<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Item;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(){
        $items  = Item::all();
        return view("pages.user.transaction", compact("items"));
    }

    // public function store(Request $request){
    //     if($request->type == 1){
    //         $invoice_id = "SAL_" . Auth::user()->id . now()->timestamp;

    //         Transaction::create([
    //             "user_id" => Auth::user()->id,
    //             "amount" => $request->amount,
    //             "invoice_id" => $invoice_id,
    //             "type" => $request->type,
    //             "status" => 2
    //         ]);

    //         return redirect()->back()->with("status", "Top Up on Proccess");
    //     }
    // }
}
