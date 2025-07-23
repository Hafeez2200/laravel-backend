<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage Texts
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <a href="{{ route('texts.create') }}" 
           class="inline-block mb-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
            Add New Text
        </a>

        @if(session('success'))
            <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        @forelse ($texts as $text)
            <div class="bg-white shadow rounded-lg p-4 mb-4">
                <div class="mb-2">
                    <strong class="text-gray-800 text-lg">{{ $text->key }}</strong>
                </div>
                <ul class="text-gray-700 text-sm mb-3 pl-4 list-disc">
                    @foreach ($text->translations as $translation)
                        <li><strong>[{{ $translation->language->code }}]</strong> {{ $translation->value }}</li>
                    @endforeach
                </ul>
                <div class="flex space-x-2">
                    <a href="{{ route('texts.edit', $text->id) }}" 
                       class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">
                        Edit
                    </a>
                    <form action="{{ route('texts.destroy', $text->id) }}" method="POST" class="inline-block"
                          onsubmit="return confirm('Are you sure you want to delete this text?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-gray-500">No texts found.</div>
        @endforelse
    </div>
</x-app-layout>
