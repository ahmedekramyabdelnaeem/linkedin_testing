<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'LinkedIn Clone') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background-color: #F3F2F1; color: #2D2D2D; }
        .btn-primary { background-color: #2557A7; color: #FFFFFF; }
        .btn-primary:hover { background-color: #164081; }
        .card { background-color: #FFFFFF; border: 1px solid #E4E2E0; }
    </style>
</head>
<body class="font-sans antialiased">
    @include('layouts.navbar')

    <main class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>
</body>
</html>
