<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); 
        return view('users.listausuarios', compact('users'));
    }

    public function edit(User $user)
    {
        return view('users.editarusuarios', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'rol' => ['required', 'string', 'in:empleado,gerente'],
        ]);

        $user->update($request->only(['name', 'email', 'rol']));

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
