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
        $request->validate([
            "maker" => "required|numeric"
        ]);

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
        $request->validate([
            "name" => "required",
            "makers" => "required|numeric",
            "transmissions" => "required|numeric",
            "bodyTypes" => "required|numeric",
            "fuels" => "required|numeric",
            "colors" => "required|numeric"
        ]);

        $newCar = new Car([
            "name"=> $request->name,
            "maker_id" => $request->makers,
            "transmission_id" => $request->transmissions,
            "body_type_id" => $request->bodyTypes,
            "fuel_id" => $request->fuels,
            "color_id" => $request->colors,
        ]);

        $newCar->save();

        return redirect()->route("listCars", ["maker" => $newCar->maker_id, "#".$newCar->id])->with("success","Autó sikeresen létrehozva");
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
        $makers = Maker::all();
        $transmissions = Transmission::all();
        $bodyTypes = BodyType::all();
        $fuels = Fuel::all();
        $colors = Color::all();

        $car = Car::find($id);

        $carData = [
            "makers" => $makers,
            "transmissions" => $transmissions,
            "bodyTypes" => $bodyTypes,
            "fuels" => $fuels,
            "colors" => $colors,
            "car" => $car,
        ];
        return view ("cars/edit", compact("carData"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            "name" => "nullable",
            "makers" => "nullable|numeric",
            "transmissions" => "nullable|numeric",
            "bodyTypes" => "nullable|numeric",
            "fuels" => "nullable|numeric",
            "colors" => "nullable|numeric"
        ]);

        if($request->makers == 0){
            $makers = null;
        }
        else{
            $makers = $request->makers;
        }

        if($request->transmissions == 0){
            $transmissions = null;
        }
        else{
            $transmissions = $request->transmissions;
        }

        if($request->bodyTypes == 0){
            $bodyTypes = null;
        }
        else{
            $bodyTypes = $request->bodyTypes;
        }

        if($request->fuels == 0){
            $fuels = null;
        }
        else{
            $fuels = $request->fuels;
        }

        if($request->colors == 0){
            $colors = null;
        }
        else{
            $colors = $request->makers;
        }


        $car = Car::find($id);
        $car->name = $request->name;
        $car->maker_id = $request->makers;
        $car->body_type_id = $request->bodyTypes;
        $car->transmission_id = $request->transmissions;
        $car->fuel_id = $request->fuels;
        $car->color_id = $request->colors;
        // $car->maker_id = $makers;
        // $car->body_type_id = $bodyTypes;
        // $car->transmission_id = $transmissions;
        // $car->fuel_id = $fuels;
        // $car->color_id = $colors;
        $car->save();

        return redirect()->route("listCars", ["maker" => $car->maker_id, "#".$car->id])->with("success","Autó sikeresen frissítve");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::find($id)->delete();

        return redirect()->route("getCarIndex")->with("success","Autó sikeresen törölve");

    }

    public function home(){
        return view ("home");
    }
}
