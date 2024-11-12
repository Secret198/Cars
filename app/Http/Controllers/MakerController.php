<?php

namespace App\Http\Controllers;

use App\Models\CarDB;
use App\Models\Maker;
use App\ValidationRules;
use Illuminate\Http\Request;

class MakerController
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
        $makers = Maker::orderBy($sort_by, $sort_dir)->paginate(5);
        return view('makers/list', compact("makers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('makers/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "logo" => "nullable"
        ], $this->GetErrorMessages());

        // $maker = new CarDB();
        $maker = new Maker();
        $maker->name = $request->name;
        $maker->save();

        return redirect()->route("getMakers")->with("success", "Gyártó sikeresen hozzáadva");
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
        // $maker = CarDB::find($id);
        $maker = Maker::find($id);
        return view("makers/edit", compact("maker"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required",
            "logo" => "nullable"
        ], $this->GetErrorMessages());

        // $maker = CarDB::findOrFail($id);
        $maker = Maker::find($id);
        $maker->name = $request->name;
        $maker->save();
        return redirect()->route("getMakers")->with("success", "Gyártó sikeresen szerkesztve");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $maker = CarDB::find($id);
        $maker = Maker::find($id);
        $maker->delete();
        return redirect()->route("getMakers")->with("success", "Gyártó sikeresen törölve");
    }
}
