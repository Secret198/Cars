<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BodyType;
use Illuminate\Http\Request;

class BodyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sort_by = request()->query("sort_by", "name");
        $sort_dir = request()->query("sort_dir", "asc");
        // $makers = CarDB::select("id_trim", "make")->distinct()->orderBy($sort_by, $sort_dir)->paginate(5);
        $bodyTypes = BodyType::orderBy($sort_by, $sort_dir)->paginate(5);
        return view('bodytypes/list', compact("bodyTypes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("bodytypes/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
        ]);

        $bodyType = new BodyType();
        $bodyType->name = $request->name;
        $bodyType->save();

        return redirect()->route("getBodyTypes")->with("success", "Karosszéria sikeresen hozzáadva");
    
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
        $bodyType = BodyType::find($id);
        return view("bodytypes/edit", compact("bodyType"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required",
        ]);

        $bodyType = BodyType::find($id);
        $bodyType->name = $request->name;
        $bodyType->save();

        return redirect()->route("getBodyTypes")->with("success", "Karosszéria sikeresen frissítve");
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bodyType = BodyType::find($id);
        $bodyType->delete();

        return redirect()->route("getBodyTypes")->with("success", "Karosszéria sikeresen törölve");

    }
}
