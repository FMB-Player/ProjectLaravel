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
        $request->validate([
            'nombre_cli' => 'required|string|max:255',
            'edad' => 'required|integer|min:1|max:100',
            'telefono' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'fecha_ingreso' => 'required|date|before_or_equal:today',
            'categoria_id' => 'required|exists:ingresos,id',
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
    
      
    
        return redirect()->route('clientes.crear')->with('success', 'Cliente guardado con éxito');
    
    }

    public function edit($id){
        $cliente = Clientes::findOrFail($id);
        $categorias = ingresos::all();
        return view('clientes.editar', compact('cliente', 'categorias'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre_cli' => 'required|string|max:255',
            'edad' => 'required|integer|min:1|max:100',
            'telefono' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'fecha_ingreso' => 'required|date|before_or_equal:today',
            'categoria_id' => 'required|exists:ingresos,id',
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

        return redirect()->route('clientes.edit', $id)->with('success', 'Cliente actualizado con éxito');
    }

    public function destroy($id){
        $cliente = Clientes::findOrFail($id);
        $cliente->delete();
        return redirect()->route('inicio')->with('success', 'Cliente eliminado conxito');
    }
}
