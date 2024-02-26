<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("albumes.index", ["albumes" => Album::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("albumes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Album::create([
            "titulo"=> $request->titulo,
            "anyo"=> $request->año
        ]);
        return redirect()->route("albumes.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        return view("albumes.show", ["album"=>$album]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view("albumes.edit", ["album"=>$album]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Album $album)
    {

        $album->update([
            "titulo"=> $request->titulo,
            "anyo"=> $request->año
        ]);
        return redirect()->route("albumes.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        Album::destroy([$album->id]);
        return redirect()->route("albumes.index");
    }
}
