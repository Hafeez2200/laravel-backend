<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage Settings
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <a href="/admin/settings/create"
           class="inline-block mb-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
            Add Setting
        </a>

        <div class="bg-white shadow rounded-lg divide-y">
            @foreach ($settings as $setting)
                <div class="flex items-center justify-between px-4 py-3">
                    <div>
                        <strong class="text-gray-700">{{ $setting->key }}:</strong> {{ $setting->value }}
                    </div>
                    <div class="space-x-2">
                        <a href="/admin/settings/{{ $setting->id }}/edit"
                           class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                            Edit
                        </a>
                        <form action="/admin/settings/{{ $setting->id }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
