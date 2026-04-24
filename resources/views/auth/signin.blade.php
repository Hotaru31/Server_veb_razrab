@extends('layout')

@section('title', 'Регистрация')

@section('content')
    <h1>Регистрация</h1>

    <form action="/signin" method="POST">
        @csrf

        <div>
            <label>Имя:</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Пароль:</label>
            <input type="password" name="password">
            @error('password')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Зарегистрироваться</button>
    </form>
@endsection