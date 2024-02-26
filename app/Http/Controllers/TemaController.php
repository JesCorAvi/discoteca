<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tema;
use App\Models\Album;
use App\Models\Artista;



class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $temas = Tema::paginate(3); // Obtén 10 temas por página

        return view("temas.index", [
            "temas" => $temas,
            "albumes" => Album::all(),
            "artistas" => Artista::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("temas.create", ["temas" => Tema::all(),"albumes" => Album::all(),"artistas" => Artista::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if($request->artista){
            $tema = Tema::create([
                "titulo"=> $request->titulo,
                "anyo"=> $request->año,
                "duracion"=> $request->duracion

            ]);
            $tema->albumes()->attach($request->album);
            $tema->artistas()->attach($request->artista);
            return redirect()->route("temas.index");
        }else{
            return redirect()->route("temas.index")->with('error', 'Se debe introducir un autor, si no existe cree uno antes');;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tema $tema)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tema $tema)
    {
        return view("temas.edit", ["tema"=>$tema]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tema $tema)
    {
        $tema->update([
            "titulo"=> $request->titulo,
            "anyo"=> $request->año,
            "duracion"=> $request->duracion
        ]);
        return redirect()->route("temas.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tema $tema)
    {
        Tema::destroy([$tema->id]);
        return redirect()->route("temas.index");
    }

    public function añadirArtista(Tema $tema)
    {
        return view("temas.añadirArtista", ["tema"=>$tema, "artistas" => Artista::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function guardarArtista(Request $request, Tema $tema)
    {
        $tema->artistas()->attach($request->artista);

        return redirect()->route("temas.index");
    }

    public function añadirAlbum(Tema $tema)
    {
        return view("temas.añadirAlbum", ["tema"=>$tema, "albumes" => Album::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function guardarAlbum(Request $request, Tema $tema)
    {
        $tema->albumes()->attach($request->album);

        return redirect()->route("temas.index");

    }
}
