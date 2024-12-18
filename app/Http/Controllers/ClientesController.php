<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::paginate(8);
        return view('clientes.index', compact('clientes'));
    }



     public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'nombre_cliente' =>'required|string|unique:clientes,nombre_cliente|max:255',
            'email' => 'required|string|email|unique:clientes,email|max:255',
            'contraseña' => 'required|string|min:4',
        ]);

        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->nombre_cliente = $request->nombre_cliente;
        $cliente->email = $request->email;
        $cliente->contraseña = $request->contraseña; 
        $cliente->remember_token = \Illuminate\Support\Str::random(60);

        $cliente->save();

        return redirect()->back()->with('success', 'Registro creado correctamente.');
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.editar', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        // Validación de la solicitud
        $request->validate([
            'nombre' => 'required|string|max:255',
            'nombre_cliente' => 'required|string|unique:clientes,nombre_cliente,' . $id . '|max:255',
            'email' => 'required|string|email|unique:clientes,email,' . $id . '|max:255',
            'contraseña' => 'sometimes|nullable|string|min:4', // La contraseña es opcional
        ]);

        $cliente = Cliente::findOrFail($id);
        $data = $request->except(['contraseña']); 
        if ($request->filled('contraseña')) {
            $cliente->contraseña = $request->input('contraseña'); 
        }
        $cliente->update($data);

        return redirect()->back()->with('success', 'Registro actualizado correctamente.');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->back()->with('success', 'Registro eliminado correctamente.');
    }


}
