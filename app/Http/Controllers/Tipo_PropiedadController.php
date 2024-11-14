<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use App\Models\Tipo_Propiedad;
use Illuminate\Http\Request;

class Tipo_PropiedadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipo_propiedades = Propiedad::all();
        return view('tipo_propiedad.index', compact('tipo_propiedades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipo_propiedad.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_propiedad' => 'required|string|max:80'
        ]);

        $tipo_propiedad = new Propiedad;
        $tipo_propiedad->tipo_propiedad = $request->input('tipo_propiedad');
        $tipo_propiedad->save();

        return redirect()->route('Tipos_Propiedad.index')->with('success', 'nuevo tipo de propiedad generado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipo_Propiedad $tipo_propiedad)
    {
        return view('tipo_propiedad.show', compact('tipo_propiedad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tipo_propiedad = Tipo_propiedad::findOrFail($id);

        return view('tipo_propiedad.edit', compact('tipo_propiedad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo_propiedad' => 'required|string|max:80'
        ]);

        $tipo_propiedad = Tipo_propiedad::findOrFail($id);
        $tipo_propiedad->tipo_propiedad = $request->tipo_propiedad;

        return redirect()->route('Tipos_Propiedad.index')->with('success', 'Tipo de propiedad actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipo_Propiedad $tipo_propiedad)
    {
        $tipo_propiedad->delete();
        return view('tipo_propiedad.index')->with('success', 'Tipo de propiedad removido exitosamente.');
    }
}
