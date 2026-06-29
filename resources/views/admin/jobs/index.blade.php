<x-admin-layout title="Manage Jobs">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Title</th>
                    <th class="px-6 py-3">Company</th>
                    <th class="px-6 py-3">Location</th>
                    <th class="px-6 py-3">Type</th>
                    <th class="px-6 py-3">Salary</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @foreach ($jobs as $job)
                    <tr>
                        <td class="px-6 py-3">{{ $job->id }}</td>
                        <td class="px-6 py-3">{{ $job->title }}</td>
                        <td class="px-6 py-3">{{ $job->company?->name }}</td>
                        <td class="px-6 py-3">{{ $job->location }}</td>
                        <td class="px-6 py-3">{{ $job->type }}</td>
                        <td class="px-6 py-3">{{ $job->salary ? number_format($job->salary, 2) : '—' }}</td>
                        <td class="px-6 py-3 text-right">
                            <form method="POST" action="{{ route('admin.jobs.destroy', $job) }}" onsubmit="return confirm('Delete this job listing?')">
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
        {{ $jobs->links() }}
    </div>
</x-admin-layout>
