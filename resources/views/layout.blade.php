<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
</head>
<body>

<header>
    <nav>
        <a href="/">Главная</a> |
        <a href="/about">О нас</a> |
        <a href="/contacts">Контакты</a> |
        <a href="/articles">Новости</a>

        {{-- Только для модератора --}}
        @auth
            @if(Auth::user()->isModerator())
                | <a href="/articles/create">Создать новость</a>
            @endif
        @endauth

        |

        @if(Auth::check())
            {{-- если пользователь авторизован --}}
            <form action="/logout" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Выйти</button>
            </form>
        @else
            {{-- если не авторизован --}}
            <a href="/register">Регистрация</a> |
            <a href="/login">Войти</a>
        @endif
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <p>ФИО: Усенко Никита Денисович, группа: 243-321</p>
</footer>

</body>
</html>