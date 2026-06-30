<x-admin-layout title="إدارة المنشورات">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-right">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 font-bold">الكاتب</th>
                        <th class="px-6 py-4 font-bold">المحتوى</th>
                        <th class="px-6 py-4 font-bold">تاريخ النشر</th>
                        <th class="px-6 py-4 font-bold text-left">الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($posts as $post)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 font-bold text-xs">
                                        {{ substr($post->user->name ?? 'U', 0, 1) }}
                                    </div>
                                    <span class="text-sm font-bold text-gray-800">{{ $post->user->name ?? 'غير معروف' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm text-gray-600 line-clamp-2 max-w-md">{{ $post->content }}</p>
                                @if($post->image)
                                    <span class="text-[10px] bg-blue-50 text-blue-600 px-2 py-0.5 rounded mt-1 inline-block font-bold">يحتوي على صورة</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $post->created_at->format('Y-m-d H:i') }}</td>
                            <td class="px-6 py-4 text-left">
                                <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('هل أنت متأكد من حذف هذا المنشور؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 font-bold text-sm transition-colors">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-gray-400">لا توجد منشورات متاحة.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if ($posts->hasPages())
        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    @endif
</x-admin-layout>
