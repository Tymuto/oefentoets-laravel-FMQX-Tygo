<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('forum.store') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="subject" class="block text-gray-600">Subject:</label>
                        <input type="text" name="subject" id="subject" class="form-input mt-1 block w-full" required />
                    </div>

                    <div class="mb-4">
                        <label for="content" class="block text-gray-600">Content:</label>
                        <textarea name="content" id="content" class="form-input mt-1 block w-full" rows="4" required></textarea>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Create Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
