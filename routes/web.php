<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakerController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('makers', [MakerController::class, 'index'])->name('getMakers');
Route::get('makers/create', [MakerController::class, "create"])->name('createMakers');
Route::post("makers/create", [MakerController::class, "store"])->name("storeMakers");
