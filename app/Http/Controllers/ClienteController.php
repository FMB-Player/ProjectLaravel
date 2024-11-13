<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Convertir el tel_cliente a número sin formato
        $request->merge([
            'tel_cliente' => preg_replace('/\D/', '', $request->input('tel_cliente')),
        ]);

        // nombre límite 80, tel límite 13
        $request->validate([
            'nombre_cliente' => 'required|string|max:80',
            'tel_cliente' => 'required|regex:/^\d{13}$/',
        ]);

        // Instanciar Cliente
        $cliente = new Cliente;
        $cliente->nombre_cliente = $request->input('nombre_cliente');
        $cliente->tel_cliente = $request->input('tel_cliente');
        $cliente->save();


        return redirect()->route('clientes.index')->with('success', 'Nuevo cliente registrado.');
        // TODO: view clientes.index
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
