<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //метод показывает страницу с регистрации
    public function create()
    {
        return view('auth.signin');
    }

    //метод обрабатывает данные формы
    public function registration(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'name' => 'required|min:2|max:50',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Возвращаем данные в формате JSON
        return response()->json([
            'message' => 'Регистрация прошла успешно',
            'data' => $validated,
        ]);
    }
}