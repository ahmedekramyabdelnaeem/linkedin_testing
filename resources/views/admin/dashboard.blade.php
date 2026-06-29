<x-admin-layout title="Dashboard">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
            <p class="text-sm text-gray-500">Users</p>
            <p class="text-3xl font-bold text-gray-900">{{ $stats['users'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <p class="text-sm text-gray-500">Jobs</p>
            <p class="text-3xl font-bold text-gray-900">{{ $stats['jobs'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <p class="text-sm text-gray-500">Posts</p>
            <p class="text-3xl font-bold text-gray-900">{{ $stats['posts'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <p class="text-sm text-gray-500">Comments</p>
            <p class="text-3xl font-bold text-gray-900">{{ $stats['comments'] }}</p>
        </div>
    </div>

    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <a href="{{ route('admin.users.index') }}" class="block bg-indigo-600 text-white rounded-lg p-4 text-center hover:bg-indigo-700">Manage Users</a>
        <a href="{{ route('admin.jobs.index') }}" class="block bg-indigo-600 text-white rounded-lg p-4 text-center hover:bg-indigo-700">Manage Jobs</a>
        <a href="{{ route('admin.posts.index') }}" class="block bg-indigo-600 text-white rounded-lg p-4 text-center hover:bg-indigo-700">Manage Posts</a>
        <a href="{{ route('admin.comments.index') }}" class="block bg-indigo-600 text-white rounded-lg p-4 text-center hover:bg-indigo-700">Manage Comments</a>
    </div>
</x-admin-layout>
