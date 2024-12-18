<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreguntasController extends Controller
{
    public function index()
    {
       
        return view('preguntas.index');
    }



     public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'nombre_preguntas' =>'required|string|unique:preguntas,nombre_preguntas|max:255',
            'email' => 'required|string|email|unique:preguntas,email|max:255',
            'contraseña' => 'required|string|min:4',
        ]);

        $preguntas = new Preguntas();
        $preguntas->nombre = $request->nombre;
        $preguntas->nombre_preguntas = $request->nombre_preguntas;
        $preguntas->email = $request->email;
        $preguntas->contraseña = $request->contraseña; 
        $preguntas->remember_token = \Illuminate\Support\Str::random(60);

        $preguntas->save();

        return redirect()->back()->with('success', 'Registro creado correctamente.');
    }

    public function edit($id)
    {
        $preguntas = Preguntas::findOrFail($id);
        return view('preguntas.editar', compact('preguntas'));
    }

    public function update(Request $request, $id)
    {
        // Validación de la solicitud
        $request->validate([
            'nombre' => 'required|string|max:255',
            'nombre_preguntas' => 'required|string|unique:preguntas,nombre_preguntas,' . $id . '|max:255',
            'email' => 'required|string|email|unique:preguntas,email,' . $id . '|max:255',
            'contraseña' => 'sometimes|nullable|string|min:4', // La contraseña es opcional
        ]);

        $preguntas = Preguntas::findOrFail($id);
        $data = $request->except(['contraseña']); 
        if ($request->filled('contraseña')) {
            $preguntas->contraseña = $request->input('contraseña'); 
        }
        $preguntas->update($data);

        return redirect()->back()->with('success', 'Registro actualizado correctamente.');
    }

    public function destroy($id)
    {
        $preguntas = preguntas::findOrFail($id);
        $preguntas->delete();
        return redirect()->back()->with('success', 'Registro eliminado correctamente.');
    }
}
