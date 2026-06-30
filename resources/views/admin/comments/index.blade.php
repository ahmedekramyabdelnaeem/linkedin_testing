<x-admin-layout title="إدارة التعليقات">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 mb-8">
        <h3 class="text-lg font-bold text-gray-800 mb-6">إضافة تعليق جديد</h3>
        <form action="{{ route('admin.comments.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-end">
                <div class="md:col-span-1">
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2">رقم المنشور (ID)</label>
                    <input type="number" name="post_id" required
                           class="w-full rounded-lg border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 transition-all">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-2">التعليق</label>
                    <input type="text" name="comment" required placeholder="اكتب تعليقك هنا..."
                           class="w-full rounded-lg border-gray-200 text-sm focus:border-blue-500 focus:ring-blue-500 transition-all">
                </div>
                <div class="md:col-span-1">
                    <button type="submit" 
                            class="w-full bg-[#2557A7] hover:bg-[#164081] text-white font-bold py-2.5 px-4 rounded-lg transition-all text-sm shadow-sm">
                        إضافة التعليق
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-right">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 font-bold">المستخدم</th>
                        <th class="px-6 py-4 font-bold">المنشور</th>
                        <th class="px-6 py-4 font-bold">التعليق</th>
                        <th class="px-6 py-4 font-bold text-left">الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($comments as $comment)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 font-bold text-xs">
                                        {{ substr($comment->user->name ?? 'U', 0, 1) }}
                                    </div>
                                    <span class="text-sm font-bold text-gray-800">{{ $comment->user->name ?? 'غير معروف' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-xs font-bold bg-gray-100 text-gray-600 px-2 py-1 rounded">#{{ $comment->post_id }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm text-gray-600 max-w-xs truncate">{{ $comment->comment }}</p>
                            </td>
                            <td class="px-6 py-4 text-left">
                                <form method="POST" action="{{ route('admin.comments.destroy', $comment) }}" onsubmit="return confirm('هل أنت متأكد من حذف هذا التعليق؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-bold text-sm transition-colors">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-gray-400">لا توجد تعليقات متاحة.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if ($comments->hasPages())
        <div class="mt-8">
            {{ $comments->links() }}
        </div>
    @endif
</x-admin-layout>
