@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto">
    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-[#2557A7] px-8 py-6 text-center">
            <h3 class="text-2xl font-black text-white tracking-tight">تسجيل الدخول</h3>
            <p class="text-blue-100 text-sm mt-1">مرحباً بك مجدداً في LinkedIn Clone</p>
        </div>

        <div class="p-8">
            @if (session('status'))
                <div class="mb-6 bg-green-50 border border-green-100 text-green-700 px-4 py-3 rounded-lg text-sm font-medium">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-wider">البريد الإلكتروني</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full rounded-lg border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition-all py-3 px-4 text-sm">
                    @error('email')
                        <p class="mt-2 text-xs text-red-600 font-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-wider">كلمة المرور</label>
                    <input type="password" name="password" required
                           class="w-full rounded-lg border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition-all py-3 px-4 text-sm">
                    @error('password')
                        <p class="mt-2 text-xs text-red-600 font-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="text-xs font-bold text-gray-500 group-hover:text-gray-700 transition-colors">تذكرني</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-xs font-bold text-[#2557A7] hover:underline">نسيت كلمة المرور؟</a>
                    @endif
                </div>

                <button type="submit" 
                        class="w-full bg-[#2557A7] hover:bg-[#164081] text-white font-black py-4 rounded-full transition-all shadow-md hover:shadow-lg active:scale-[0.98]">
                    دخول
                </button>
            </form>

            <div class="mt-8 pt-8 border-t border-gray-100 text-center">
                <p class="text-sm text-gray-500 font-medium">
                    ليس لديك حساب؟ 
                    <a href="{{ route('register') }}" class="text-[#2557A7] font-bold hover:underline">أنشئ حساباً جديداً</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
