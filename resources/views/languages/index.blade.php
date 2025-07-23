<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage Languages
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <a href="{{ route('languages.create') }}" class="inline-block mb-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
            Add New Language
        </a>

        @if(session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="bg-white shadow rounded-lg divide-y">
            @forelse ($languages as $language)
                <div class="flex items-center justify-between px-4 py-3">
                    <div>
                        <strong class="text-gray-700">{{ $language->name }}</strong>
                        <span class="text-sm text-gray-500 ml-2">[{{ $language->code }}]</span>
                    </div>
                    <div class="space-x-2">
                        @if ($language->translations()->count() === 0)
                            <form action="{{ route('languages.destroy', $language->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this language?')" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                    Delete
                                </button>
                            </form>
                        @else
                            <span class="text-sm text-gray-400">In Use</span>
                        @endif
                    </div>
                </div>
            @empty
                <div class="px-4 py-4 text-gray-500">
                    No languages found.
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
