<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage Images
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin.images.create') }}"
           class="inline-block mb-6 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
            Upload New Image
        </a>

        @if ($images->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($images as $image)
                    <div class="bg-white rounded shadow overflow-hidden">
                        <img src="{{ asset('storage/' . $image->file_path) }}" alt="{{ $image->name }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold text-lg">{{ $image->name ?? 'Untitled' }}</h3>
                            <p class="text-sm text-gray-500 break-words">{{ $image->file_path }}</p>

                            <div class="mt-4 flex space-x-2">
                                <a href="{{ route('admin.images.edit', $image->id) }}"
                                   class="px-3 py-1 bg-yellow-500 text-white text-sm rounded hover:bg-yellow-600">
                                    Edit
                                </a>

                                <form action="{{ route('admin.images.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Delete this image?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600">No images uploaded yet.</p>
        @endif

    </div>
</x-app-layout>
