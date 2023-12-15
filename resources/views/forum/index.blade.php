<!-- resources/views/forum.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Forums') }}
            </h1>
            <a href="{{ route('forum.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Create Post</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <h2 class="text-2xl font-semibold mb-4">{{ __("All posts") }}</h2>

                <div class="forum-container">
                    @foreach ($posts as $post)
                        <div class="post mb-6 bg-gray-100">
                            <h3 class="text-xl font-semibold">{{ $post->subject }}</h3>
                            <p>{{ $post->content }}</p>
                            <p class="text-gray-600">Posted by: {{ $post->user->name }}</p>
                            
                            <div class="comments mt-4">
                                @foreach ($post->comments as $comment)
                                    <div class="comment mb-2">
                                        <p>{{ $comment->content }}</p>
                                        <p class="text-gray-600">Commented by: {{ $comment->user->name }}</p>
                                    </div>
                                @endforeach
                            </div>

                            <form action="{{ route('posts.comments.store', $post->id) }}" method="post" class="mt-4">
                                @csrf
                                <div class="mb-4">
                                    <label for="content" class="block text-gray-600">Add Comment:</label>
                                    <textarea name="content" id="content" class="form-input mt-1 block w-full" rows="4" required></textarea>
                                </div>
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Add Comment</button>
                                <a href="{{ route('posts.edit', $post->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">Edit post</a>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
