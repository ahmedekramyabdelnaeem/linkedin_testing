<x-admin-layout title="الرئيسية">

    <div class="bg-white flex justify-between fixed bottom-0">
        <div>
            <button>A</button>
            <button>b</button>
            <button>c</button>
            <button>d</button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        {{-- Users Stat --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 transition-all hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">المستخدمين</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $stats['users'] }}</h3>
                </div>
                <div class="w-12 h-12 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 15.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Jobs Stat --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 transition-all hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">الوظائف</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $stats['jobs'] }}</h3>
                </div>
                <div class="w-12 h-12 rounded-lg bg-green-50 flex items-center justify-center text-green-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Posts Stat --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 transition-all hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">المنشورات</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $stats['posts'] }}</h3>
                </div>
                <div class="w-12 h-12 rounded-lg bg-yellow-50 flex items-center justify-center text-yellow-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 2v4a2 2 0 002 2h4"></path>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Comments Stat --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 transition-all hover:shadow-md">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">التعليقات</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $stats['comments'] }}</h3>
                </div>
                <div class="w-12 h-12 rounded-lg bg-purple-50 flex items-center justify-center text-purple-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
            <h4 class="text-lg font-bold text-gray-800 mb-6">روابط سريعة</h4>
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('admin.users.index') }}" 
                   class="flex items-center justify-center p-4 rounded-lg border border-gray-100 hover:border-blue-200 hover:bg-blue-50 transition-all group">
                    <span class="text-sm font-bold text-gray-700 group-hover:text-blue-700">إدارة المستخدمين</span>
                </a>
                <a href="{{ route('admin.jobs.index') }}" 
                   class="flex items-center justify-center p-4 rounded-lg border border-gray-100 hover:border-green-200 hover:bg-green-50 transition-all group">
                    <span class="text-sm font-bold text-gray-700 group-hover:text-green-700">إدارة الوظائف</span>
                </a>
                <a href="{{ route('admin.posts.index') }}" 
                   class="flex items-center justify-center p-4 rounded-lg border border-gray-100 hover:border-yellow-200 hover:bg-yellow-50 transition-all group">
                    <span class="text-sm font-bold text-gray-700 group-hover:text-yellow-700">إدارة المنشورات</span>
                </a>
                <a href="{{ route('admin.comments.index') }}" 
                   class="flex items-center justify-center p-4 rounded-lg border border-gray-100 hover:border-purple-200 hover:bg-purple-50 transition-all group">
                    <span class="text-sm font-bold text-gray-700 group-hover:text-purple-700">إدارة التعليقات</span>
                </a>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 flex flex-col justify-center items-center text-center">
            <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h4 class="text-lg font-bold text-gray-800 mb-2">نظام الإدارة</h4>
            <p class="text-gray-500 text-sm leading-relaxed">
                يمكنك من هنا التحكم في كافة محتويات المنصة، مراقبة المستخدمين، وحذف المحتوى غير اللائق لضمان جودة الخدمة.
            </p>
        </div>
    </div>
</x-admin-layout>
