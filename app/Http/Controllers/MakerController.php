<?php

namespace App\Http\Controllers;

use App\Models\Maker;
use Illuminate\Http\Request;

class MakerController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sort_by = request()->query("sort_by", "name");
        $sort_dir = request()->query("sort_dir", "asc");
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
            "name" => "required|min:3"
        ]);

        $maker = new Maker();
        $maker->name = $request->name;
        $maker->save();

        return redirect()->route("getMakers");
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
        //
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
