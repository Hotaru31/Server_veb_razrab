@extends('layout')

@section('title', 'Вход')

@section('content')
    <h1>Авторизация</h1>

    <form action="/login" method="POST">
        @csrf

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email') <p style="color:red;">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Пароль</label>
            <input type="password" name="password">
            @error('password') <p style="color:red;">{{ $message }}</p> @enderror
        </div>

        <button type="submit">Войти</button>
    </form>
@endsection