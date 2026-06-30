<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin' }} - {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { background-color: #F3F2F1; color: #2D2D2D; }
        .sidebar { background-color: #164081; }
        .sidebar-link-active { background-color: #2557A7; color: #FFFFFF; }
        .sidebar-link:hover { background-color: #1F4F9A; }
        .header { background-color: #FFFFFF; border-bottom: 1px solid #E4E2E0; }
        .btn-primary { background-color: #2557A7; color: #FFFFFF; }
        .btn-primary:hover { background-color: #164081; }
        .text-secondary { color: #6F6F6F; }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex">

        {{-- Sidebar --}}
        <aside class="w-64 sidebar text-white flex-shrink-0 shadow-lg">
            <div class="px-6 py-6 text-xl font-bold border-b border-blue-800 text-center tracking-wide">
                لوحة التحكم
            </div>
            <nav class="mt-6 space-y-2 px-4">
                @php
                    $links = [
                        'admin.dashboard'      => ['label' => 'الرئيسية', 'icon' => 'home'],
                        'admin.users.index'    => ['label' => 'إدارة المستخدمين', 'icon' => 'users'],
                        'admin.jobs.index'     => ['label' => 'إدارة الوظائف', 'icon' => 'briefcase'],
                        'admin.posts.index'    => ['label' => 'إدارة المنشورات', 'icon' => 'file-text'],
                        'admin.comments.index' => ['label' => 'إدارة التعليقات', 'icon' => 'message-square'],
                    ];
                @endphp
                @foreach ($links as $route => $data)
                    <a href="{{ route($route) }}"
                       class="flex items-center px-4 py-3 rounded-lg text-sm transition-all duration-200 sidebar-link
                              {{ request()->routeIs($route) ? 'sidebar-link-active' : 'text-blue-100' }}">
                        <span>{{ $data['label'] }}</span>
                    </a>
                @endforeach
            </nav>
        </aside>

        {{-- Main Content --}}
        <div class="flex-1 flex flex-col">
            <header class="header h-16 flex items-center shadow-sm px-8">
                <div class="flex-1 flex justify-between items-center">
                    <h1 class="text-xl font-bold text-gray-800">{{ $title ?? 'لوحة التحكم' }}</h1>
                    <div class="flex items-center gap-6">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                                {{ auth()->user() ? substr(auth()->user()->name, 0, 1) : 'A' }}
                            </div>
                            <span class="text-sm font-medium text-gray-700">{{ auth()->user()->name ?? 'مدير النظام' }}</span>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    class="text-sm text-red-600 hover:text-red-700 font-bold transition-colors">
                                تسجيل الخروج
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-8 overflow-y-auto">

                {{-- Success Message --}}
                @if (session('status'))
                    <div class="mb-6 rounded-lg bg-green-50 border-r-4 border-green-500 px-6 py-4 shadow-sm">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="mr-3">
                                <p class="text-sm font-medium text-green-800">{{ session('status') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Error Message --}}
                @if (session('error'))
                    <div class="mb-6 rounded-lg bg-red-50 border-r-4 border-red-500 px-6 py-4 shadow-sm">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="mr-3">
                                <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="mb-6 rounded-lg bg-red-50 border-r-4 border-red-500 px-6 py-4 shadow-sm">
                        <ul class="list-disc list-inside space-y-1 text-sm text-red-800 font-medium">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
