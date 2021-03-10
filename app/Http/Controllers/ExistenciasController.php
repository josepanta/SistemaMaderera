<?php

namespace App\Http\Controllers;

use App\Models\Existencia;
use App\Models\Tamaño;
use Illuminate\Http\Request;

class ExistenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $existencias = Existencia::all();
        return view('existencias.index', compact('existencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $tamaños = Tamaño::all();
        
        return view('existencias.create', compact('tamaños'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Existencia::create($request->all());
        
        return redirect()->route('existencias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $existencia = Existencia::findOrFail($id);

        return view('existencias.show', compact('existencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $existencia = Existencia::findOrFail($id);
        $tamaños = Tamaño::all();
        
        return view('existencia.edit', compact('existencia','tamaños')); 
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
        $existencia = Existencia::findOrFail($id);
        $existencia->nombre = $request->nombre;
        $existencia->cantidad = $request->cantidad;
        $existencia->tamaño_id = $request->tamaño_id;
        $existencia->save();

        return redirect()->route('habitaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Existencia::destroy($id);

        return redirect()->route('existencias.index');
    }
}
