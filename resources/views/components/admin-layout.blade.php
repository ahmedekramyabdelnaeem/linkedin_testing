<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin' }} - {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen flex">
        <aside class="w-64 bg-gray-900 text-gray-100 flex-shrink-0">
            <div class="px-6 py-5 text-xl font-bold border-b border-gray-800">
                Admin Panel
            </div>
            <nav class="mt-4 space-y-1">
                @php
                    $links = [
                        'admin.dashboard' => 'Dashboard',
                        'admin.users.index' => 'Manage Users',
                        'admin.jobs.index' => 'Manage Jobs',
                        'admin.posts.index' => 'Manage Posts',
                        'admin.comments.index' => 'Manage Comments',
                    ];
                @endphp
                @foreach ($links as $route => $label)
                    <a href="{{ route($route) }}"
                       class="block px-6 py-2.5 rounded-r-full mr-4 {{ request()->routeIs($route) ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-800' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </nav>
        </aside>

        <div class="flex-1">
            <header class="bg-white shadow-sm">
                <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
                    <h1 class="text-lg font-semibold text-gray-800">{{ $title ?? 'Dashboard' }}</h1>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm text-gray-600 hover:text-gray-900">
                            Log Out
                        </button>
                    </form>
                </div>
            </header>

            <main class="max-w-6xl mx-auto px-6 py-8">
                @if (session('status'))
                    <div class="mb-4 rounded-md bg-green-50 px-4 py-3 text-sm text-green-700">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 rounded-md bg-red-50 px-4 py-3 text-sm text-red-700">
                        {{ session('error') }}
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
