<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', User::class);  

        $usuarios = User::all();  
        return view('usuarios.ListaUsuarios', compact('usuarios'));  
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);  

        return view('usuarios.EditarUsuarios', compact('user'));  
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);  

        // Valida los datos del formulario
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'rol' => 'required|string|in:empleado,gerente',
        ]);

        // Actualiza los datos del usuario
        $user->update($data);

        return redirect()->route('usuarios.edit', $user);  // Redirige a la vista de edición del usuario
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);  // Autoriza la eliminación del usuario

        $user->delete();  // Elimina el usuario
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');  // Redirige con un mensaje de éxito
    }
}
