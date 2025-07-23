<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cities') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('admin.cities.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                + Add City
            </a>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full table-auto text-left">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2">Key</th>
                            <th class="px-4 py-2">Translations</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cities as $city)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $city->key }}</td>
                                <td class="px-4 py-2">
                                    @foreach ($city->translations as $t)
                                        <span class="block"><strong>{{ $t->language->code }}</strong>: {{ $t->name }}</span>
                                    @endforeach
                                </td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('admin.cities.edit', $city) }}" class="text-yellow-500 hover:underline mr-3">Edit</a>
                                    <form action="{{ route('admin.cities.destroy', $city) }}" method="POST" style="display:inline">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Are you sure?')" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @if ($cities->isEmpty())
                            <tr><td class="px-4 py-4 text-gray-500" colspan="3">No cities found.</td></tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
