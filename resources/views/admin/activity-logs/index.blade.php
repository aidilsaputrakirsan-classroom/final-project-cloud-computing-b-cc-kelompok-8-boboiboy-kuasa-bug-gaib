@extends('layouts.admin')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Activity Logs</h1>
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full table-auto rounded-lg overflow-hidden shadow">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left">User</th>
                    <th class="px-6 py-3 text-left">Action</th>
                    <th class="px-6 py-3 text-left">Description</th>
                    <th class="px-6 py-3 text-left">Timestamp</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logs as $log)
                <tr class="border-b hover:bg-blue-50 transition">
                    <td class="px-6 py-3 font-semibold">{{ $log->user->name ?? '-' }}</td>
                    <td class="px-6 py-3">{{ ucfirst($log->action) }}</td>
                    <td class="px-6 py-3">{{ $log->description }}</td>
                    <td class="px-6 py-3 text-gray-500">{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-6 text-gray-400">Tidak ada aktivitas ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $logs->links() }}</div>
</div>
@endsection