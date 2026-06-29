<x-admin-layout title="Manage Posts">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Author</th>
                    <th class="px-6 py-3">Content</th>
                    <th class="px-6 py-3">Posted</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach ($posts as $post)
                    <tr>
                        <td class="px-6 py-3">{{ $post->id }}</td>
                        <td class="px-6 py-3">{{ $post->user?->name }}</td>
                        <td class="px-6 py-3 max-w-md truncate">{{ $post->content }}</td>
                        <td class="px-6 py-3">{{ $post->created_at->format('Y-m-d') }}</td>
                        <td class="px-6 py-3 text-right">
                            <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('Delete this post?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</x-admin-layout>
