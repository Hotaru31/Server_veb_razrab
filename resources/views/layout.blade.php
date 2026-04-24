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
        <a href="/contacts">Контакты</a>
        <a href="/signin">Регистрация</a>
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