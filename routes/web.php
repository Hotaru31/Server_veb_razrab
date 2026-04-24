<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
//главная страница
Route::get('/', [MainController::class, 'index']);
//страница галереи
Route::get('/gallery/{id}', [MainController::class, 'gallery']);
//страница о нас
Route::get('/about', function () {
    return view('about');
});
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