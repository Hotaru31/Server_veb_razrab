<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {   //читается файл json
        $json = file_get_contents(public_path('articles.json'));
        $items = json_decode($json, true);  //конвертирует из json в php
        //передает данные в шаблон велком
        return view('welcome', ['items' => $items]);
    }
    //метод страницы галереи
    public function gallery($id)
    {   //читается файл json
        $json = file_get_contents(public_path('articles.json'));
        $items = json_decode($json, true);

        $item = $items[$id];

        return view('gallery', ['item' => $item]);
    }
}