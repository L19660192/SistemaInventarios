<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Mostrar el formulario de edición
    public function edit($id)
    {
        // Recuperar el usuario por ID
        $user = User::findOrFail($id);

        // Verificar si es el usuario autenticado
        if (auth()->user()->id !== $user->id) {
            abort(403, 'No tienes permiso para editar este perfil.');
        }

        return view('users.edit', compact('user'));
    }

    // Actualizar los datos del usuario
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Obtener el usuario por ID
        $user = User::findOrFail($id);

        // Verificar si es el usuario autenticado
        if (auth()->user()->id !== $user->id) {
            abort(403, 'No tienes permiso para editar este perfil.');
        }

        // Actualizar los campos del usuario
        $user->name = $request->name;
        $user->email = $request->email;

        // Si se proporciona una nueva contraseña, actualízala
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        // Guardar los cambios
        $user->save();

        return redirect()->route('users.edit', $user->id)->with('success', 'Perfil actualizado correctamente');
    }
}
