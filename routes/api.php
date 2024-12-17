<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;



Route::middleware('auth:sanctum')->group(function () {

Route::get('/user', function (Request $request) {
    return $request->user();
});

});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);


//Admin Routes
Route::middleware('auth:sanctum', 'admin')->group(function () {
Route::get('/admin/dashboard', function (Request $request) {
    return response()->json(['message' => 'Welcome to the Admin Dashboard']);
});

});




