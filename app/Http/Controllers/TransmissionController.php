<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transmission;
use Illuminate\Http\Request;

class TransmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sort_by = request()->query("sort_by", "name");
        $sort_dir = request()->query("sort_dir", "asc");
        // $makers = CarDB::select("id_trim", "make")->distinct()->orderBy($sort_by, $sort_dir)->paginate(5);
        $transmissions = Transmission::orderBy($sort_by, $sort_dir)->paginate(5);
        return view('transmissions/list', compact("transmissions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("transmissions/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
        ]);

        $transmission = new Transmission();
        $transmission->name = $request->name;
        $transmission->save();

        return redirect()->route("getTransmissions")->with("success", "Gyártó sikeresen hozzáadva");
    
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
        $transmission = Transmission::find($id);
        return view("transmissions/edit", compact("transmission"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required",
        ]);

        $transmission = Transmission::find($id);
        $transmission->name = $request->name;
        $transmission->save();

        return redirect()->route("getTransmissions")->with("success", "Gyártó sikeresen hozzáadva");
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
