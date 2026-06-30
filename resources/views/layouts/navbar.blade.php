<nav class="bg-white border-b border-[#E4E2E0] sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center gap-8">
                <a href="/" class="text-[#2557A7] font-black text-2xl tracking-tight">LinkedIn Clone</a>
                @auth
                    <a href="{{ route('posts.index') }}" 
                       class="text-sm font-bold {{ request()->routeIs('posts.*') ? 'text-[#2557A7]' : 'text-gray-500' }} hover:text-[#2557A7] transition-colors">
                        المنشورات
                    </a>
                @endauth
            </div>

            <div class="flex items-center gap-4">
                @auth
                    @if (auth()->user() && auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}"
                           class="text-sm font-bold text-[#D93025] hover:bg-[#FDECEC] px-3 py-2 rounded-lg transition-all">
                            لوحة الإدارة
                        </a>
                    @endif

                    <div class="flex items-center gap-3 ml-4 border-l border-gray-100 pl-4">
                        <span class="text-sm font-medium text-gray-700">{{ auth()->user()->name ?? 'مستخدم' }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm font-bold text-gray-500 hover:text-red-600 transition-colors">
                                تسجيل الخروج
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-[#2557A7] text-sm font-bold px-4 py-2 rounded-lg hover:bg-[#EEF4FF] transition-all">
                        تسجيل الدخول
                    </a>
                    <a href="{{ route('register') }}" class="bg-[#2557A7] text-white text-sm font-bold px-5 py-2 rounded-full hover:bg-[#164081] transition-all shadow-sm">
                        إنشاء حساب
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
