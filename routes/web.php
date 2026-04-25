<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthUserController;

// Главная страница
Route::get('/', [MainController::class, 'index']);

// Страница галереи
Route::get('/gallery/{id}', [MainController::class, 'gallery']);

// Страница "О нас"
Route::get('/about', function () {
    return view('about');
});

// Страница "Контакты"
Route::get('/contacts', function () {
    $contacts = [
        'email' => 'example@mail.com',
        'phone' => '+7 999 123-45-67',
        'address' => 'Москва, ул. Примерная, 1',
    ];

    return view('contacts', ['contacts' => $contacts]);
});

// Старое задание 3: простая форма signin
Route::get('/signin', [AuthController::class, 'create']);
Route::post('/signin', [AuthController::class, 'registration']);

//регистрация 
Route::get('/register', [AuthUserController::class, 'registerForm']);
Route::post('/register', [AuthUserController::class, 'register']);

//авторизация
Route::get('/login', [AuthUserController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthUserController::class, 'login']);

//выход пользователя
Route::post('/logout', [AuthUserController::class, 'logout']);

//защищенные новости от неавториз
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('articles', ArticleController::class);
});