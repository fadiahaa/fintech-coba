<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix("user")->group(function(){
    Route::post("/add", [UserController::class, 'store'])->name("user.add"); // {{ route('user.latihan') }}
    Route::get("/list", [UserController::class, 'index'])->name("user.list");
    Route::put("/edit", [UserController::class, 'update'])->name("user.edit");
});
