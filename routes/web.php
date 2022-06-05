<?php

use App\Http\Controllers\Email\EmailController;
use Illuminate\Support\Facades\Route;
use App\Models\EmailSignature;
use Illuminate\Support\Facades\DB;


Route::get('/', function () {

    return view('welcome');
});
Route::post('/email',[EmailController::class,'send']);
Route::post('/send_sms',[EmailController::class,'sendEmail']);
