<!doctype html>
<html class="antialiased" lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @include('panels.styles')

    @include('panels.scripts')

    <title>Рога и Сила - @yield('title')</title>
    <link href="/public/assets/favicon.ico" rel="shortcut icon" type="image/x-icon">

</head>
<body class="bg-white text-gray-600 font-sans leading-normal text-base tracking-normal flex min-h-screen flex-col">
<div class="wrapper flex flex-1 flex-col">

    @include('panels.header')

    <main class="flex-1 container mx-auto bg-white">

        @yield('content')

    </main>

    @include('panels.footer')
</div>
</body>
</html>
