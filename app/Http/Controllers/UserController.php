<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function config()
    {
        return view('user.config');
    }

    public function update(Request $request)
    {
        // Conseguir usuario identificado
        $user = Auth::user();
        $id = $user->id;
        
        // Validacion del formulario
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'nick' => 'required|string|max:255,|unique:users,nick,' . $id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $id
        ]);


        //Recoger los datos del formulario
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');

        // Asignar nuevos valores al objeto del usuario
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;

        // Ejecutar consulta y cambios en la base de datos
        $user->update();

        return redirect()->route('config')
                            ->with(['message' => 'Usuario actualizado correctamente']);


    }
}
