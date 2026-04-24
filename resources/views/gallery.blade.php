@extends('layout')

@section('title', 'Галерея')

@section('content')
    
    <h1>{{ $item['name'] }}</h1>

    <p>{{ $item['date'] }}</p>

    <img src="{{ asset($item['full_image']) }}" width="500">

    <p>{{ $item['desc'] }}</p>

    <p>
        <a href="/">Назад на главную</a>
    </p>
@endsection