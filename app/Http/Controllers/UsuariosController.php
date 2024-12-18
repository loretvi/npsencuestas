<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::with('area')->paginate(8);
        return view('usuarios.index', compact('usuarios'));
    }



     public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'usuario' => 'required|string|unique:usuarios,usuario|max:255',
            'correo' => 'required|string|email|unique:usuarios,correo|max:255',
            'rol_id' => 'required|integer|exists:roles,id',
            'area_id' => 'required|integer|exists:areas,id',
            'activo' => 'required|boolean',
            'contraseña' => 'required|string|min:4',
        ]);

        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->usuario = $request->usuario;
        $usuario->correo = $request->correo;
        $usuario->rol_id = $request->rol_id;
        $usuario->area_id = $request->area_id;
        $usuario->activo = $request->activo;
        $usuario->contraseña = $request->contraseña; 
        $usuario->remember_token = \Illuminate\Support\Str::random(60);

        $usuario->save();

        return redirect()->back()->with('success', 'Registro creado correctamente.');
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.editar', compact('usuario'));
    }

public function update(Request $request, $id)
{
    // Validación de la solicitud
    $request->validate([
        'nombre' => 'required|string|max:255',
        'usuario' => 'required|string|unique:usuarios,usuario,' . $id . '|max:255',
        'correo' => 'required|string|email|unique:usuarios,correo,' . $id . '|max:255',
        'rol_id' => 'required|integer|exists:roles,id',
        'area_id' => 'required|integer|exists:areas,id',
        'activo' => 'required|boolean',
        'contraseña' => 'sometimes|nullable|string|min:4', 
    ]);

    $usuario = Usuario::findOrFail($id);
    $data = $request->except(['contraseña']); 
    if ($request->filled('contraseña')) {
        $usuario->contraseña = $request->input('contraseña'); 
    }
    $usuario->update($data);

    return redirect()->back()->with('success', 'Registro actualizado correctamente.');
}

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect()->back()->with('success', 'Registro eliminado correctamente.');
    }
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
}

