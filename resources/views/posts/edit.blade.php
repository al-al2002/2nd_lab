@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Edit Post</h1>

<form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
               class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        @error('title')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
        <textarea name="content" id="content" rows="5"
                  class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>{{ old('content', $post->content) }}</textarea>
        @error('content')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex justify-end space-x-2">
        <a href="{{ route('posts.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</a>
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Update Post</button>
    </div>
</form>
@endsection
