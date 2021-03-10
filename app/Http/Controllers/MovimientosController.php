<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\User;
use Illuminate\Http\Request;

class MovimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movimientos = Movimiento::all(); 
        return view('movimientos.index', compact('movimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::all();
        $tipos = ['ENTRADA', 'SALIDA'];

        return view('movimientos.create', compact('usuarios', 'tipos')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Movimiento::create($request->all());
        
        return redirect()->route('movimientos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movimiento = Movimiento::findOrFail($id);

        return view('movimientos.show', compact('movimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movimiento = Movimiento::findOrFail($id);
        $usuarios = User::all();
        $tipos = ['ENTRADA', 'SALIDA'];
        
        return view('movimientos.edit', compact('movimiento', 'usuarios', 'tipos')); 
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
        $movimiento = Movimiento::findOrFail($id);
        $movimiento->fecha = $request->fecha;
        $movimiento->tipo_movimiento = $request->tipo_movimiento;
        $movimiento->usuario_id = $request->usuario_id;
        $movimiento->save();

        return redirect()->route('movimientos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Movimiento::destroy($id);

        return redirect()->route('movimientos.index');
    }
}
