<?php

use App\Http\Controllers\Email\EmailController;
use Illuminate\Support\Facades\Route;
use App\Models\EmailSignature;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});
Route::post('/email',[EmailController::class,'send']);
Route::post('/send_sms',[EmailController::class,'sendEmail']);
