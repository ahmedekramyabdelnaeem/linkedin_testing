<x-admin-layout title="إدارة المستخدمين">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-right">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase tracking-wider border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 font-bold">المستخدم</th>
                        <th class="px-6 py-4 font-bold">البريد الإلكتروني</th>
                        <th class="px-6 py-4 font-bold">الدور</th>
                        <th class="px-6 py-4 font-bold">تاريخ الانضمام</th>
                        <th class="px-6 py-4 font-bold text-left">الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($users as $user)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 font-bold text-xs">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <span class="text-sm font-bold text-gray-800">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $roleStyles = [
                                        'admin'    => ['bg' => '#FDECEC', 'text' => '#D93025', 'label' => 'مشرف'],
                                        'company'  => ['bg' => '#E9F8F2', 'text' => '#008561', 'label' => 'شركة'],
                                        'employee' => ['bg' => '#EEF4FF', 'text' => '#2557A7', 'label' => 'موظف'],
                                    ];
                                    $style = $roleStyles[$user->role] ?? ['bg' => '#F3F2F1', 'text' => '#6F6F6F', 'label' => $user->role];
                                @endphp
                                <span class="px-3 py-1 rounded-full text-xs font-bold" style="background-color: {{ $style['bg'] }}; color: {{ $style['text'] }};">
                                    {{ $style['label'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $user->created_at->format('Y-m-d') }}</td>
                            <td class="px-6 py-4 text-left">
                                @if ($user->id !== auth()->id())
                                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('هل أنت متأكد من حذف هذا المستخدم؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 font-bold text-sm transition-colors">حذف</button>
                                    </form>
                                @else
                                    <span class="text-gray-400 text-xs italic">حسابك</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-400">لا يوجد مستخدمون متاحون.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if ($users->hasPages())
        <div class="mt-8">
            {{ $users->links() }}
        </div>
    @endif
</x-admin-layout>
