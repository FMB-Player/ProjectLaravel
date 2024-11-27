<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use App\Models\ingresos;

class ClientesController extends Controller
{
    public function index(){
        $clientes = Clientes::all();
        return view('inicio', compact('clientes'));

    }
    public function create(){
        $categorias = ingresos::all();
        return view('clientes.crear', compact('categorias'));

    }

    public function store(Request $request)
    {
        $request->merge([
            // Convertir el telefono del cliente a un número sin formato.
            'telefono' => preg_replace('/\D/', '', $request->telefono),

            // Aplicar Title en el nombre para que cada palabra empiece con Mayúscula.
            'nombre_cli' => ucwords(strtolower($request->nombre_cli)),

            // Convertir el checked de seguro a un booleano.
            'seguro' => $request->has('seguro'),
        ]);

        $request->validate([
            'nombre_cli' => 'required|string|max:80',
            'edad' => 'required|integer|gte:18',
            'seguro' => 'required|boolean',
            'telefono' => 'required|string|regex:/^\d{11}$/',
            'email' => 'required|string|email|max:120',
            'fecha_ingreso' => 'required|date|before_or_equal:today',
            'categoria_id' => 'required|exists:ingresos,id',
        ], [
            'nombre_cli.required' => 'El campo Nombre es obligatorio.',
            'edad.required' => 'El campo Edad es obligatorio.',
            'edad.gte' => 'La edad debe ser mayor de edad (18+).',
            'telefono.regex' => 'El teléfono debe tener 11 dígitos (Ej: 012 1234 5678).',
            'telefono.required' => 'El teléfono debe tener 11 dígitos (Ej: 012 1234 5678).',
            'email.required' => 'El campo Email es obligatorio.',
            'email.email' => 'El campo Email debe ser un correo electrónico válido.',
            'fecha_ingreso.required' => 'El campo Fecha de Ingreso es obligatorio.',
            'fecha_ingreso.before_or_equal' => 'La fecha de ingreso no puede ser posterior a la actual.',
            'categoria_id.required' => 'Se debe seleccionar una categoría de ingreso.',
        ]);

        $cliente = new Clientes();
        $cliente->nombre_cli = $request->nombre_cli;
        $cliente->edad = $request->edad;
        $cliente->seguro = $request->seguro;
        $cliente->telefono = $request->telefono;
        $cliente->email = $request->email;
        $cliente->fecha_ingreso = $request->fecha_ingreso;
        $cliente->categoria_id = $request->categoria_id;
        $cliente->save();



        return redirect()->route('inicio')->with('success', 'Cliente guardado con éxito');

    }

    public function edit($id){
        $cliente = Clientes::findOrFail($id);
        $categorias = ingresos::all();
        return view('clientes.editar', compact('cliente', 'categorias'));
    }

    public function update(Request $request, $id){
        $request->merge([
            // Convertir el telefono del cliente a un número sin formato.
            'telefono' => preg_replace('/\D/', '', $request->telefono),

            // Aplicar Title en el nombre para que cada palabra empiece con Mayúscula.
            'nombre_cli' => ucwords(strtolower($request->nombre_cli)),

            // Convertir el checked de seguro a un booleano.
            'seguro' => $request->has('seguro'),
        ]);

        $request->validate([
            'nombre_cli' => 'required|string|max:80',
            'edad' => 'required|integer|gte:18',
            'seguro' => 'required|boolean',
            'telefono' => 'required|string|regex:/^\d{11}$/',
            'email' => 'required|string|email|max:120',
            'fecha_ingreso' => 'required|date|before_or_equal:today',
            'categoria_id' => 'required|exists:ingresos,id',
        ], [
            'nombre_cli.required' => 'El campo Nombre es obligatorio.',
            'edad.required' => 'El campo Edad es obligatorio.',
            'edad.gte' => 'La edad debe ser mayor de edad (18+).',
            'telefono.regex' => 'El teléfono debe tener 11 dígitos (Ej: 012 1234 5678).',
            'telefono.required' => 'El teléfono debe tener 11 dígitos (Ej: 012 1234 5678).',
            'email.required' => 'El campo Email es obligatorio.',
            'email.email' => 'El campo Email debe ser un correo electrónico válido.',
            'fecha_ingreso.required' => 'El campo Fecha de Ingreso es obligatorio.',
            'fecha_ingreso.before_or_equal' => 'La fecha de ingreso no puede ser posterior a la actual.',
            'categoria_id.required' => 'Se debe seleccionar una categoría de ingreso.',
        ]);

        $cliente = Clientes::findOrFail($id);
        $cliente->nombre_cli = $request->nombre_cli;
        $cliente->edad = $request->edad;
        $cliente->seguro = $request->seguro;
        $cliente->telefono = $request->telefono;
        $cliente->email = $request->email;
        $cliente->fecha_ingreso = $request->fecha_ingreso;
        $cliente->categoria_id = $request->categoria_id;
        $cliente->save();

        return redirect()->route('inicio')->with('success', 'Cliente actualizado con éxito');
    }

    public function destroy($id){
        $cliente = Clientes::findOrFail($id);
        $cliente->delete();
        return redirect()->route('inicio')->with('success', 'Cliente dado de baja con éxito');
    }
}
