@extends('layout')

@section('title', 'Главная')

@section('content')
    <h1>Новости</h1>

    <table border="1" cellpadding="10">
        <tr>
            <th>Дата</th>
            <th>Название</th>
            <th>Картинка</th>
            <th>Описание</th>
        </tr>

        @foreach($items as $index => $item)
            <tr>
                <td>{{ $item['date'] }}</td>
                <td>{{ $item['name'] }}</td>
                <td>
                    <a href="/gallery/{{ $index }}">
                        <img src="{{ asset($item['preview_image']) }}" width="120">
                    </a>
                </td>
                <td>
                    {{ $item['shortDesc'] ?? $item['desc'] }}
                </td>
            </tr>
        @endforeach
    </table>
@endsection