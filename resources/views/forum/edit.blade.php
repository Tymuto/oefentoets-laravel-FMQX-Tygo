<!-- resources/views/edit-post.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('posts.update', $post->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="subject" class="block text-gray-600">Subject:</label>
                        <input type="text" name="subject" id="subject" class="form-input mt-1 block w-full" value="{{ $post->subject }}" required />
                    </div>

                    <div class="mb-4">
                        <label for="content" class="block text-gray-600">Content:</label>
                        <textarea name="content" id="content" class="form-input mt-1 block w-full" rows="4" required>{{ $post->content }}</textarea>
                    </div>

                    <form action="{{ route('posts.update', $post->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Post</button>
                        </div>
                    </form>

                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 mt-4 rounded">Delete Post</button>
                    </form>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
