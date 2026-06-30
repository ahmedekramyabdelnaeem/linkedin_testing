<x-admin-layout title="إضافة وظيفة جديدة">

    <div class="max-w-3xl mx-auto">

        <div class="flex items-center gap-3 mb-6">
            <a href="{{ route('admin.jobs.index') }}"
               class="text-gray-500 hover:text-gray-700 text-sm">
                ← العودة للوظائف
            </a>
            <h2 class="text-xl font-bold text-gray-800">إضافة وظيفة جديدة</h2>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <form method="POST" action="{{ route('admin.jobs.store') }}">
                @csrf

                @php $job = null; @endphp
                @include('admin.jobs._form')

                <div class="flex items-center gap-3 mt-6">
                    <button type="submit"
                            class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 transition font-medium">
                        حفظ الوظيفة
                    </button>
                    <a href="{{ route('admin.jobs.index') }}"
                       class="bg-gray-100 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-200 transition font-medium">
                        إلغاء
                    </a>
                </div>
            </form>
        </div>

    </div>

</x-admin-layout>
