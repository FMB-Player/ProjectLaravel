<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Propiedad;

class PropiedadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $propiedades = Propiedad::all();
        return view('propiedad.index', compact('propiedades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('propiedad.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'direccion' => 'required|string|max:80',
            'isReservada' => 'required|boolean',
            'id_tipo_propiedad' => 'required|integer|exists:tipo_propiedad,id_tipo_propiedad',
            'id_propietario' => 'required|integer|exists:propietario,id_propietario'
        ]);

        $propiedad = new Propiedad;
        $propiedad->direccion = $request->input('direccion');
        $propiedad->isReservada = $request->input('isReservada');
        $propiedad->id_tipo_propiedad = $request->input('id_tipo_propiedad');
        $propiedad->id_propietario = $request->input('id_propietario');
        $propiedad->save();

        return redirect()->route('Propiedades.index')->with('success', 'Nueva propiedad registrada.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Propiedad $propiedad)
    {
        return view('propiedad.show', compact('propiedad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $propiedad = Propiedad::findOrFail($id);

        return view('propiedad.edit', compact('propiedad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'direccion' => 'required|string|max:80',
            'isReservada' => 'required|boolean',
            'id_tipo_propiedad' => 'required|integer|exists:tipo_propiedad,id_tipo_propiedad',
            'id_propietario' => 'required|integer|exists:propietario,id_propietario'
        ]);

        $propiedad = Propiedad::findOrFail($id);
        $propiedad->direccion = $request->direccion;
        $propiedad->isReservada = $request->isReservada;
        $propiedad->id_tipo_propiedad = $request->id_tipo_propiedad;
        $propiedad->id_propietario = $request->id_propietario;

        return redirect()->route('Propiedades.index')->with('success', 'Propiedad actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Propiedad $propiedad)
    {
        $propiedad->delete();
        return redirect()->route('Propiedades.index')->with('success', 'Propiedad eliminada.');
    }
}
