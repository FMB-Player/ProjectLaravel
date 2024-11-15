<?php

namespace App\Http\Controllers;

use App\Models\Renta;
use Illuminate\Http\Request;

class RentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rentas = Renta::all();
        return view('renta.index', compact('rentas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('renta.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_renta' => 'nullable|date|after:today',
            'precio_renta' => 'required|numeric|gt:0',
            'id_propiedad' => 'required|integer|exists:propiedad,id_propiedad',
            'id_cliente' => 'required|integer|exists:cliente,id_cliente',
        ]);

        $renta = new Renta;
        $renta->fecha_renta = $request->input('fecha_renta');
        $renta->precio_renta = $request->input('precio_renta');
        $renta->id_propiedad = $request->input('id_propiedad');
        $renta->id_cliente = $request->input('id_cliente');
        $renta->save();

        return redirect()->route('Rentas.index')->with('success', 'Nueva renta registrada.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Renta $renta)
    {
        return view('renta.show', compact('renta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $renta = Renta::findOrFail($id);

        return view('renta.edit', compact('renta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'fecha_renta' => 'nullable|date|after:today',
            'precio_renta' => 'required|numeric|gt:0',
            'id_propiedad' => 'required|integer|exists:propiedad,id_propiedad',
            'id_cliente' => 'required|integer|exists:cliente,id_cliente',
        ]);

        $renta = Renta::findOrFail($id);
        $renta->fecha_renta = $request->input('fecha_renta');
        $renta->precio_renta = $request->input('precio_renta');
        $renta->id_propiedad = $request->input('id_propiedad');
        $renta->id_cliente = $request->input('id_cliente');
        $renta->save();

        return redirect()->route('Rentas.index')->with('success', 'Renta modificada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Renta $renta)
    {
        $renta->delete();
        return redirect()->route('Rentas.index')->with('success', 'Renta borrada.');
    }
}
