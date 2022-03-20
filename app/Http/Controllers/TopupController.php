<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopupController extends Controller
{
    public function index(){
        return view("pages.user.topup");
    }
    public function check(){
        return view("pages.bank.index");
    }
}
