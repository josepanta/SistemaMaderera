<?php

namespace App\Http\Controllers;

use App\Models\Tamaño;
use Illuminate\Http\Request;

class TamañosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tamaños = Tamaño::all();
        return view('tamaños.index', compact('tamaños')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tamaños.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tamaño::create($request->all());
        
        return redirect()->route('tamanos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tamaño = Tamaño::findOrFail($id);

        return view('tamaños.show', compact('tamaño'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tamaño = Tamaño::findOrFail($id);
        
        return view('tamaños.edit', compact('tamaño')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tamaño = Tamaño::findOrFail($id);
        $tamaño->nombre = $request->nombre;
        $tamaño->ancho = $request->ancho;
        $tamaño->alto = $request->alto;
        $tamaño->grueso = $request->grueso;
        $tamaño->save();

        return redirect()->route('tamanos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tamaño::destroy($id);

        return redirect()->route('tamanos.index');
    }
}
