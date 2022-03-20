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
        $carts = Transaction::where("user_id", Auth::user()->id)->where("status", 1)->where("type", 2)->get();
        $checkouts = Transaction::where("user_id", Auth::user()->id)->where("status", 2)->where("type", 2)->get();
        $balance = Balance::where("user_id", Auth::user()->id)->first();

        $total_cart = 0;
        $total_checkout = 0;

        foreach($carts as $cart){
            $total_cart += ($cart->barang->price * $cart->jumlah);
        }

        foreach($checkouts as $checkout){
            $total_checkout += ($checkout->barang->price * $checkout->jumlah);
        }

        return view("pages.user.transaction", compact("items", "carts", "checkouts", "balance"));
    }

    public function store(Request $request){
        if($request->type == 1){
            $invoice_id = "SAL_" . Auth::user()->id . now()->timestamp;

            Transaction::create([
                "user_id" => Auth::user()->id,
                "amount" => $request->amount,
                "invoice_id" => $invoice_id,
                "type" => $request->type,
                "status" => 2
            ]);

            return redirect()->back()->with("status", "Top Up on Proccess");
        }
    }
}
