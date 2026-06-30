@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto">
    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-[#2557A7] px-8 py-6 text-center">
            <h3 class="text-2xl font-black text-white tracking-tight">إنشاء حساب</h3>
            <p class="text-blue-100 text-sm mt-1">انضم إلى أكبر شبكة مهنية في العالم</p>
        </div>

        <div class="p-8">
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-wider">الاسم بالكامل</label>
                    <input type="text" name="name" value="{{ old('name') }}" required autofocus
                           class="w-full rounded-lg border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition-all py-3 px-4 text-sm">
                    @error('name')
                        <p class="mt-2 text-xs text-red-600 font-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-wider">البريد الإلكتروني</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           class="w-full rounded-lg border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition-all py-3 px-4 text-sm">
                    @error('email')
                        <p class="mt-2 text-xs text-red-600 font-bold">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-wider">نوع الحساب</label>
                    <select name="role" required
                            class="w-full rounded-lg border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition-all py-3 px-4 text-sm">
                        <option value="employee">موظف (باحث عن عمل)</option>
                        <option value="company">شركة (صاحب عمل)</option>
                    </select>
                    @error('role')
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

                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2 tracking-wider">تأكيد كلمة المرور</label>
                    <input type="password" name="password_confirmation" required
                           class="w-full rounded-lg border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition-all py-3 px-4 text-sm">
                </div>

                <button type="submit" 
                        class="w-full bg-[#2557A7] hover:bg-[#164081] text-white font-black py-4 rounded-full transition-all shadow-md hover:shadow-lg active:scale-[0.98] mt-4">
                    إنشاء الحساب
                </button>
            </form>

            <div class="mt-8 pt-8 border-t border-gray-100 text-center">
                <p class="text-sm text-gray-500 font-medium">
                    لديك حساب بالفعل؟ 
                    <a href="{{ route('login') }}" class="text-[#2557A7] font-bold hover:underline">سجل دخولك الآن</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
