<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fuel;
use App\ValidationRules;
use Illuminate\Http\Request;

class FuelController extends Controller
{
    use ValidationRules;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sort_by = request()->query("sort_by", "name");
        $sort_dir = request()->query("sort_dir", "asc");
        // $makers = CarDB::select("id_trim", "make")->distinct()->orderBy($sort_by, $sort_dir)->paginate(5);
        $fuels = Fuel::orderBy($sort_by, $sort_dir)->paginate(5);
        return view('fuels/list', compact("fuels"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("fuels/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
        ], $this->GetErrorMessages());

        $fuel = new Fuel();
        $fuel->name = $request->name;
        $fuel->save();

        return redirect()->route("getFuels")->with("success", "Üzemanyag sikeresen hozzáadva");
    
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
        $fuel = Fuel::find($id);
        return view("fuels/edit", compact("fuel"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required",
        ], $this->GetErrorMessages());

        $fuel = Fuel::find($id);
        $fuel->name = $request->name;
        $fuel->save();

        return redirect()->route("getFuels")->with("success", "Üzemanyag sikeresen frissítve");
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fuel = Fuel::find($id);
        $fuel->delete();

        return redirect()->route("getFuels")->with("success", "Üzemanyag sikeresen törölve");

    }
}
