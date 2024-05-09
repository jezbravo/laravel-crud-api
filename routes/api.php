<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Obtain all
Route::get("/students", function () {
    return "Students List";
});

// Obtain any
Route::get("/students/{id}", function () {
    return "Student";
});

// Create
Route::post("/students", function () {
    return "Student Creation";
});

// Update
Route::patch("/students/{id}", function () {
    return "Student Update";
});

// Delete
Route::delete("/students/{id}", function () {
    return "Student Delete";
});
