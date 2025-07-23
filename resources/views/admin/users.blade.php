<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage Users
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <table class="table-auto w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">Name</th>
                        <th class="border px-4 py-2">Email</th>
                        <th class="border px-4 py-2">Banned</th>
                        <th class="border px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                        <td class="border px-4 py-2">
                            @if($user->is_banned)
                            <span class="text-red-600 font-semibold">Banned</span>
                            @else
                            <span class="text-green-600 font-semibold">Active</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2">
                            <div class="flex gap-2">
                                <!-- Ban/Unban Form -->
                                <form method="POST" action="{{ route('admin.users.ban', $user->id) }}">
                                    @csrf
                                    <button type="submit" class="px-3 py-1 rounded text-white text-sm {{ $user->is_banned ? 'bg-green-600 hover:bg-green-700' : 'bg-red-600 hover:bg-red-700' }}">
                                        {{ $user->is_banned ? 'Unban' : 'Ban' }}
                                    </button>
                                </form>

                                <!-- View Logs Link -->
                                <a href="{{ route('admin.logs', $user->id) }}" class="px-3 py-1 rounded bg-blue-600 hover:bg-blue-700 text-white text-sm">
                                    View Logs
                                </a>
                            </div>
                        </td>






                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
