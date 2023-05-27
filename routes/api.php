<?php

use App\Http\Controllers\Api\CurrencyController;
use App\Http\Controllers\Api\EmailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//currency
Route::get('rate', [CurrencyController::class, 'fetchRate']);

//email
Route::post('subscribe', [EmailController::class, 'create']);
//Route::post('sendEmails', [EmailController::class, 'send']);
