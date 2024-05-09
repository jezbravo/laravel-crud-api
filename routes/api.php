<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\studentController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Obtain all
Route::get("/students", [studentController::class, "index"]);

// Obtain any
Route::get("/students/{id}", [studentController::class, "show"]);

// Create
Route::post("/students", [studentController::class, "store"]);

// Update
Route::put("/students/{id}", [studentController::class, "update"]);

Route::patch("/students/{id}", [studentController::class, "parcialUpdate"]);

// Delete
Route::delete("/students/{id}", [studentController::class, "delete"]);
