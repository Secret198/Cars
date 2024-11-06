<?php

use App\Http\Controllers\BodyTypeController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\TransmissionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MakerController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [CarController::class,"home"])->name("home");

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
Route::delete("cars/{id}", [CarController::class, "destroy"])->name("deleteCars");

Route::get('transmissions', [TransmissionController::class, 'index'])->name('getTransmissions');
Route::get('transmissions/create', [TransmissionController::class, "create"])->name('createTransmissions');
Route::post("transmissions/create", [TransmissionController::class, "store"])->name("storeTransmissions");
Route::get("transmissions/edit/{id}", [TransmissionController::class, "edit"])->name("editTransmissions");
Route::patch("transmissions/update/{id}", [TransmissionController::class, "update"])->name("updateTransmissions");
Route::delete("transmissions/{id}", [TransmissionController::class, "destroy"])->name("deleteTransmissions");

Route::get('bodytypes', [BodyTypeController::class, 'index'])->name('getBodyTypes');
Route::get('bodytypes/create', [BodyTypeController::class, "create"])->name('createBodyTypes');
Route::post("bodytypes/create", [BodyTypeController::class, "store"])->name("storeBodyTypes");
Route::get("bodytypes/edit/{id}", [BodyTypeController::class, "edit"])->name("editBodyTypes");
Route::patch("bodytypes/update/{id}", [BodyTypeController::class, "update"])->name("updateBodyTypes");
Route::delete("bodytypes/{id}", [BodyTypeController::class, "destroy"])->name("deleteBodyTypes");

Route::get('fuels', [FuelController::class, 'index'])->name('getFuels');
Route::get('fuels/create', [FuelController::class, "create"])->name('createFuels');
Route::post("fuels/create", [FuelController::class, "store"])->name("storeFuels");
Route::get("fuels/edit/{id}", [FuelController::class, "edit"])->name("editFuels");
Route::patch("fuels/update/{id}", [FuelController::class, "update"])->name("updateFuels");
Route::delete("fuels/{id}", [FuelController::class, "destroy"])->name("deleteFuels");

Route::get('colors', [ColorController::class, 'index'])->name('getColors');
Route::get('colors/create', [ColorController::class, "create"])->name('createColors');
Route::post("colors/create", [ColorController::class, "store"])->name("storeColors");
Route::get("colors/edit/{id}", [ColorController::class, "edit"])->name("editColors");
Route::patch("colors/update/{id}", [ColorController::class, "update"])->name("updateColors");
Route::delete("colors/{id}", [ColorController::class, "destroy"])->name("deleteColors");
