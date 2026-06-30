<x-admin-layout title="إدارة الوظائف">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-right">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 font-bold">الوظيفة</th>
                        <th class="px-6 py-4 font-bold">الشركة</th>
                        <th class="px-6 py-4 font-bold">الموقع</th>
                        <th class="px-6 py-4 font-bold">النوع</th>
                        <th class="px-6 py-4 font-bold">الراتب</th>
                        <th class="px-6 py-4 font-bold text-left">الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($jobs as $job)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <span class="text-sm font-bold text-gray-800">{{ $job->title }}</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $job->company->name ?? 'غير معروف' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $job->location }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-700">
                                    {{ $job->type }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 font-medium">
                                {{ $job->salary ? number_format($job->salary) . ' ج.م' : 'غير محدد' }}
                            </td>
                            <td class="px-6 py-4 text-left">
                                <form method="POST" action="{{ route('admin.jobs.destroy', $job) }}" onsubmit="return confirm('هل أنت متأكد من حذف هذه الوظيفة؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-bold text-sm transition-colors">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-400">لا توجد وظائف متاحة حالياً.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if ($jobs->hasPages())
        <div class="mt-8">
            {{ $jobs->links() }}
        </div>
    @endif
</x-admin-layout>
