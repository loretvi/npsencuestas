<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncuestasController extends Controller
{
    public function index()
    {
       
        return view('encuestas.index');
    }



     public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'nombre_encuesta' =>'required|string|unique:encuestas,nombre_encuesta|max:255',
            'email' => 'required|string|email|unique:encuestas,email|max:255',
            'contraseña' => 'required|string|min:4',
        ]);

        $encuesta = new Encuesta();
        $encuesta->nombre = $request->nombre;
        $encuesta->nombre_encuesta = $request->nombre_encuesta;
        $encuesta->email = $request->email;
        $encuesta->contraseña = $request->contraseña; 
        $encuesta->remember_token = \Illuminate\Support\Str::random(60);

        $encuesta->save();

        return redirect()->back()->with('success', 'Registro creado correctamente.');
    }

    public function edit($id)
    {
        $encuesta = Encuesta::findOrFail($id);
        return view('encuestas.editar', compact('encuesta'));
    }

    public function update(Request $request, $id)
    {
        // Validación de la solicitud
        $request->validate([
            'nombre' => 'required|string|max:255',
            'nombre_encuesta' => 'required|string|unique:encuestas,nombre_encuesta,' . $id . '|max:255',
            'email' => 'required|string|email|unique:encuestas,email,' . $id . '|max:255',
            'contraseña' => 'sometimes|nullable|string|min:4', // La contraseña es opcional
        ]);

        $encuesta = encuesta::findOrFail($id);
        $data = $request->except(['contraseña']); 
        if ($request->filled('contraseña')) {
            $encuesta->contraseña = $request->input('contraseña'); 
        }
        $encuesta->update($data);

        return redirect()->back()->with('success', 'Registro actualizado correctamente.');
    }

    public function destroy($id)
    {
        $encuesta = encuesta::findOrFail($id);
        $encuesta->delete();
        return redirect()->back()->with('success', 'Registro eliminado correctamente.');
    }


}
