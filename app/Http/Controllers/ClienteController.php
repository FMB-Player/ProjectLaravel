<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('Cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            // Convertir el telefono del cliente a un número sin formato.
            'telefono' => preg_replace('/\D/', '', $request->input('telefono')),

            // Aplicar Title en el nombre para que cada palabra empiece con Mayúscula.
            'nombre_cli' => ucwords(strtolower($request->input('nombre_cli'))),
        ]);

        $request->validate([
            'nombre_cli' => 'required|string|max:120',
            'seguro' => 'required|boolean',
            'edad' => 'required|integer|gte:18',
            'telefono' => 'required|string|regex:/^\d{13}$/',
            'email' => 'required|email|max:120',
            'fecha_ingreso' => 'required|date|lte:now',
        ]);

        $cliente = new Cliente;
        $cliente->nombre_cli = $request->input('nombre_cli');
        $cliente->seguro = $request->input('seguro');
        $cliente->edad = $request->input('edad');
        $cliente->telefono = $request->input('telefono');
        $cliente->email = $request->input('email');
        $cliente->fecha_ingreso = $request->input('fecha_ingreso');
        $cliente->save();

        return redirect()->route('Cliente.index')->with('success', 'Cliente registrado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('Cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('Cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->merge([
            // Convertir el telefono del cliente a un número sin formato.
            'telefono' => preg_replace('/\D/', '', $request->input('telefono')),

            // Aplicar Title en el nombre para que cada palabra empiece con Mayúscula.
            'nombre_cli' => ucwords(strtolower($request->input('nombre_cli'))),
        ]);

        $request->validate([
            'nombre_cli' => 'required|string|max:120',
            'seguro' => 'required|boolean',
            'edad' => 'required|integer|gte:18',
            'telefono' => 'required|string|regex:/^\d{13}$/',
            'email' => 'required|email|max:120',
            'fecha_ingreso' => 'required|date|lte:now',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->nombre_cli = $request->input('nombre_cli');
        $cliente->seguro = $request->input('seguro');
        $cliente->edad = $request->input('edad');
        $cliente->telefono = $request->input('telefono');
        $cliente->email = $request->input('email');
        $cliente->fecha_ingreso = $request->input('fecha_ingreso');
        $cliente->save();

        return redirect()->route('Cliente.index')->with('success', 'Cliente actualizado.');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('Cliente.index')->with('success', 'Cliente dado de baja.');
    }
}
