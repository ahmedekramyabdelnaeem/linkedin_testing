<x-admin-layout title="Manage Comments">
    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <h2 class="text-sm font-semibold text-gray-700 mb-3">Add a Comment</h2>
        <form method="POST" action="{{ route('admin.comments.store') }}" class="space-y-3">
            @csrf
            <div>
                <label class="block text-sm text-gray-600 mb-1">Post ID</label>
                <input type="number" name="post_id" class="w-full rounded-md border-gray-300" required>
            </div>
            <div>
                <label class="block text-sm text-gray-600 mb-1">Comment</label>
                <textarea name="comment" rows="3" class="w-full rounded-md border-gray-300" required></textarea>
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Add Comment</button>
        </form>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">User</th>
                    <th class="px-6 py-3">Post</th>
                    <th class="px-6 py-3">Comment</th>
                    <th class="px-6 py-3">Posted</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach ($comments as $comment)
                    <tr>
                        <td class="px-6 py-3">{{ $comment->id }}</td>
                        <td class="px-6 py-3">{{ $comment->user?->name }}</td>
                        <td class="px-6 py-3">#{{ $comment->post_id }}</td>
                        <td class="px-6 py-3 max-w-md truncate">{{ $comment->comment }}</td>
                        <td class="px-6 py-3">{{ $comment->created_at->format('Y-m-d') }}</td>
                        <td class="px-6 py-3 text-right">
                            <form method="POST" action="{{ route('admin.comments.destroy', $comment) }}" onsubmit="return confirm('Delete this comment?')">
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
        {{ $comments->links() }}
    </div>
</x-admin-layout>
