@extends('layout')

@section('title', 'Редактировать статью')

@section('content')
    <h1>Редактировать статью</h1>

    <form action="/articles/{{ $article->id }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Название</label>
            <input type="text" name="title" value="{{ old('title', $article->title) }}">
            @error('title') <p style="color:red;">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Превью картинка</label>
            <input type="text" name="preview_image" value="{{ old('preview_image', $article->preview_image) }}">
            @error('preview_image') <p style="color:red;">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Краткое описание</label>
            <textarea name="short_description">{{ old('short_description', $article->short_description) }}</textarea>
            @error('short_description') <p style="color:red;">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Полное описание</label>
            <textarea name="description">{{ old('description', $article->description) }}</textarea>
            @error('description') <p style="color:red;">{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Дата</label>
            <input type="date" name="date" value="{{ old('date', $article->date) }}">
            @error('date') <p style="color:red;">{{ $message }}</p> @enderror
        </div>

        <button type="submit">Обновить</button>
    </form>
@endsection