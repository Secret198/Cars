<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sort_by = request()->query("sort_by", "name");
        $sort_dir = request()->query("sort_dir", "asc");
        // $makers = CarDB::select("id_trim", "make")->distinct()->orderBy($sort_by, $sort_dir)->paginate(5);
        $colors = Color::orderBy($sort_by, $sort_dir)->paginate(5);
        return view('colors/list', compact("colors"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("colors/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "hexCode" => "required",
        ]);

        $color = new Color();
        $color->name = $request->name;
        $color->hexa_code = $request->hexCode;
        $color->save();

        return redirect()->route("getColors")->with("success", "Üzemanyag sikeresen hozzáadva");
    
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
        $color = Color::find($id);
        return view("colors/edit", compact("color"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required",
            "hexCode" => "required",
        ]);

        $color = Color::find($id);
        $color->name = $request->name;
        $color->hexa_code = $request->hexCode;
        $color->save();

        return redirect()->route("getColors")->with("success", "Üzemanyag sikeresen frissítve");
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $color = Color::find($id);
        $color->delete();

        return redirect()->route("getColors")->with("success", "Üzemanyag sikeresen törölve");

    }
}
