@extends('layout')

@section('title', 'Контакты')

@section('content')
    <h1>Контакты</h1>

    <ul>
        <li>Email: {{ $contacts['email'] }}</li>
        <li>Телефон: {{ $contacts['phone'] }}</li>
        <li>Адрес: {{ $contacts['address'] }}</li>
    </ul>
@endsection