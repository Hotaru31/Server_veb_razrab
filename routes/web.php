<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// страница о нас
Route::get('/about', function () {
    return view('about');
});

// страница контактов
Route::get('/contacts', function () {
    $contacts = [
        'email' => 'example@mail.com',
        'phone' => '+7 999 123-45-67',
        'address' => 'Москва, ул. Примерная, 1',
    ];

    return view('contacts', ['contacts' => $contacts]);
});