<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Listar usuarios
    // Mostrar la vista con los usuarios listados
    public function listar()
    {
        $usuarios = Usuario::all();
        return view('usuarios.listar', compact('usuarios'));
    }

    // Crear un nuevo usuario
    public function guardar(Request $request)
    {
        $validatedData = $request->validate([
            'n_documento' => 'required|string|max:20|unique:usuarios',
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:150',
            'correo' => 'required|email|max:150|unique:usuarios',
            'clave' => 'required|string|min:6',
            'estado' => 'required|integer',
        ]);

        Usuario::create([
            'n_documento' => $validatedData['n_documento'],
            'nombre' => $validatedData['nombre'],
            'apellidos' => $validatedData['apellidos'],
            'correo' => $validatedData['correo'],
            'clave' => bcrypt($validatedData['clave']),
            'estado' => $validatedData['estado'],
        ]);

        return redirect()->route('usuarios.listar')->with('success', 'Usuario creado correctamente.');
    }

    // Editar un usuario
    public function editar($usuario_id)
    {
        $usuario = Usuario::findOrFail($usuario_id);
        return response()->json($usuario); // Retornamos el usuario en formato JSON
    }

    // Actualizar un usuario
    public function actualizar(Request $request, $usuario_id)
    {
        try {
            // Busca el usuario en la base de datos
            $usuario = Usuario::find($usuario_id);

            // Si no se encuentra, lanza un error
            if (!$usuario) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'Usuario no encontrado con el ID proporcionado.',
                    ],
                    404,
                );
            }

            // Actualiza el usuario
            $usuario->update([
                'n_documento' => $request->n_documento,
                'nombre' => $request->nombre,
                'apellidos' => $request->apellidos,
                'correo' => $request->correo,
                'estado' => $request->estado,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Usuario actualizado correctamente',
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Ocurrió un error al actualizar el usuario: ' . $e->getMessage(),
                ],
                500,
            );
        }
    }

    // Eliminar un usuario
    public function eliminar($usuario_id)
    {
        $usuario = Usuario::findOrFail($usuario_id);
        $usuario->delete();
        return redirect()->route('usuarios.listar')->with('success', 'Usuario eliminado correctamente.');
    }
}
