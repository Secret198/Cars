<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Fuel;
use App\Models\Color;
use App\Models\Maker;
use App\Models\BodyType;
use App\Models\Transmission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use SebastianBergmann\CodeCoverage\Report\Html\Colors;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $makers = Maker::all();
        return view("cars/index", compact("makers"));
    }

    public function listCars(Request $request)
    {
        $sort_by = request()->query("sort_by", "name");
        $sort_dir = request()->query("sort_dir", "asc");
        $makerId = $request->maker;
        $cars = Car::where("maker_id", $makerId)->orderBy($sort_by, $sort_dir)->paginate(5);
        return view("cars/list", compact("cars"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $makers = Maker::all();
        $transmissions = Transmission::all();
        $bodyTypes = BodyType::all();
        $fuels = Fuel::all();
        $colors = Color::all();

        $carData = [
            "makers" => $makers,
            "transmissions" => $transmissions,
            "bodyTypes" => $bodyTypes,
            "fuels" => $fuels,
            "colors" => $colors,
        ];        
        return view("cars/create", compact("carData"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $newCar = new Car([
            "name"=> $request->name,
            "maker_id" => $request->makers,
            "transmission_id" => $request->transmissions,
            "body_type_id" => $request->bodyTypes,
            "fuel_id" => $request->fuels,
            "color_id" => $request->colors,
        ]);

        $newCar->save();

        return redirect()->route("getCarIndex")->with("success","Autó sikeresen létrehozva");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::find($id);
        return view ("cars/edit", compact("car"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
