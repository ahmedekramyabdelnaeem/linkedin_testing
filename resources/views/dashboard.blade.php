@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 text-center">
        <div class="w-20 h-20 bg-blue-50 text-[#2557A7] rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <h2 class="text-2xl font-black text-gray-800 mb-2">تم تسجيل دخولك بنجاح!</h2>
        <p class="text-gray-500 font-medium mb-8">أهلاً بك في LinkedIn Clone، يمكنك الآن البدء في تصفح الوظائف والمنشورات.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('posts.index') }}" class="bg-[#2557A7] text-white font-bold py-3 px-6 rounded-lg hover:bg-[#164081] transition-all">
                المنشورات
            </a>
            <a href="/" class="bg-white text-[#2557A7] border-2 border-[#2557A7] font-bold py-3 px-6 rounded-lg hover:bg-[#EEF4FF] transition-all">
                تصفح الوظائف
            </a>
            <a href="{{ route('profile.edit') }}" class="bg-gray-50 text-gray-600 border-2 border-gray-200 font-bold py-3 px-6 rounded-lg hover:bg-gray-100 transition-all">
                الملف الشخصي
            </a>
        </div>
    </div>
</div>
@endsection
