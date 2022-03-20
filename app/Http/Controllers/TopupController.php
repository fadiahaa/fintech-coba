<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopupController extends Controller
{
    public function index(){
        return view("pages.user.topup");
    }
    public function check(){
        return view("pages.bank.index");
    }
}
