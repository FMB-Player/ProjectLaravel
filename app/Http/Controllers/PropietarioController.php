<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $propietarios = Propietario::all();
        return view('propietario.index', compact('propietarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('propietario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_propietario' => 'required|string|max:80',
            'contacto_propietario' => 'required|email|string|max:120',
        ]);

        $propietario = new Propietario;
        $propietario->nombre_propietario = $request->input('nombre_propietario');
        $propietario->contacto_propietario = $request->input('contacto_propietario');
        $propietario->save();

        return redirect()->route('Propietarios.index')->with('success', 'Nuevo propietario registrado.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Propietario $propietario)
    {
        return view('propietario.show', compact('propietario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $propietario = Propietario::findOrFail($id);

        return view('propietario.edit', compact('propietario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_propietario' => 'required|string|max:80',
            'contacto_propietario' => 'required|email|string|max:120',
        ]);

        $propietario = Propietario::findOrFail($id);
        $propietario->nombre_propietario = $request->input('nombre_propietario');
        $propietario->contacto_propietario = $request->input('contacto_propietario');
        $propietario->save();

        return redirect()->route('Propietarios.index')->with('success', 'Propietario actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Propietario $propietario)
    {
        $propietario->delete();
        return redirect()->route('Propietarios.index')->with('success', 'Propietario dado de baja.');
    }
}
