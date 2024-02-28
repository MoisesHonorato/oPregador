<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        session(['currentPage' => 'profiles']);

        $user = Auth::user();
        $accessLevels = $user->accessLevels;

        // Iterando sobre os níveis de acesso e exibindo os IDs
        foreach ($accessLevels as $accessLevel) {
            $nivel =  $accessLevel->name;
        }

        return view('profiles.index', compact('user', 'nivel'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // ======== VALIDAÇÕES =============
        $request->validate([
            'name' => 'required|string|max:255|min:5',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => [
                'nullable',
                'min: 6',
                'max: 15',
            ]
        ]);

        $name       = $user->name;
        $email      = $user->email;
        $ddd        = $user->ddd;
        $telefone   = $user->telefone;
        $password   = $user->password;

        $user->name = $request->input('name');
        $user->ddd = $request->input('ddd');
        $user->telefone = $request->input('telefone');
        $user->email = $request->input('email');

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if (
            $name       === $request->input('name') and
            $email      === $request->input('email') and
            $ddd        === $request->input('ddd') and
            $telefone   === $request->input('telefone') and
            $password   !== ''
        ) {
            return redirect()->route('profiles.index');
        }

        $user->save();

        return redirect()->route('profiles.index')->with('success', 'Perfil atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        //
    }
}
