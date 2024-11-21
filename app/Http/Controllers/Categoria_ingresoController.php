<?php

namespace App\Http\Controllers;

use App\Models\Categoria_ingreso;
use Illuminate\Http\Request;

class Categoria_ingresoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria_ingreso::all();

        return view('Categoria.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:80'
        ]);

        $categoria = new Categoria_ingreso;
        $categoria->nombre = $request->input('nombre');
        $categoria->save();

        return redirect()->route('Categoria.index')->with('success', 'Nueva categoria guardada.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categoria_ingreso::findOrFail($id);

        return view('Categoria.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria = Categoria_ingreso::findOrFail($id);

        return view('Categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:80'
        ]);

        $categoria = Categoria_ingreso::findOrFail($id);
        $categoria->nombre = $request->input('nombre');
        $categoria->save();

        return redirect()->route('Categoria.index')->with('success', 'Categoría actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria_ingreso::findOrFail($id);
        $categoria->delete();

        return redirect()->route('Categoria.index')->with('success', 'Categoría eliminada.');
    }
}
