<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\TransmissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakerController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('makers', [MakerController::class, 'index'])->name('getMakers');
Route::get('makers/create', [MakerController::class, "create"])->name('createMakers');
Route::post("makers/create", [MakerController::class, "store"])->name("storeMakers");
Route::get("makers/edit/{id}", [MakerController::class, "edit"])->name("editMakers");
Route::patch("makers/update/{id}", [MakerController::class, "update"])->name("updateMakers");
Route::delete("makers/{id}", [MakerController::class, "destroy"])->name("deleteMakers");

Route::get("cars", [CarController::class, "index"])->name("getCarIndex");
Route::get("cars/maker", [CarController::class,"listCars"])->name("listCars");
Route::get('cars/create', [CarController::class, "create"])->name('createCars');
Route::post("cars/create", [CarController::class, "store"])->name("storeCars");
Route::get("cars/edit/{id}", [CarController::class, "edit"])->name("editCars");
Route::patch("cars/update/{id}", [CarController::class, "update"])->name("updateCars");

Route::get('transmissions', [TransmissionController::class, 'index'])->name('getTransmissions');
Route::get('transmissions/create', [TransmissionController::class, "create"])->name('createTransmissions');
Route::post("transmissions/create", [TransmissionController::class, "store"])->name("storeTransmissions");
Route::get("transmissions/edit/{id}", [TransmissionController::class, "edit"])->name("editTransmissions");
Route::patch("transmissions/update/{id}", [TransmissionController::class, "update"])->name("updateTransmissions");
Route::delete("transmissions/{id}", [TransmissionController::class, "destroy"])->name("deleteTransmissions");
