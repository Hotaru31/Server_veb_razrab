<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
//главная страница
Route::get('/', [MainController::class, 'index']);
//страница галереи
Route::get('/gallery/{id}', [MainController::class, 'gallery']);
//страница о нас
Route::get('/about', function () {
    return view('about');
});
Route::resource('articles', ArticleController::class);
//регистрация
Route::get('/signin', [AuthController::class, 'create']);
Route::post('/signin', [AuthController::class, 'registration']);
//страница контакты
Route::get('/contacts', function () {
    $contacts = [
        'email' => 'example@mail.com',
        'phone' => '+7 999 123-45-67',
        'address' => 'Москва, ул. Примерная, 1',
    ];
    //передача данныхъ
    return view('contacts', ['contacts' => $contacts]);
});