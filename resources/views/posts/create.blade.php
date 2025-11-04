@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
<h1 class="text-2xl font-semibold mb-4">Create New Post</h1>

<form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700">ChismisTitle</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}"
               class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        @error('title')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="content" class="block text-sm font-medium text-gray-700">ChismisContent</label>
        <textarea name="content" id="content" rows="5"
                  class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>{{ old('content') }}</textarea>
        @error('content')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex justify-end space-x-2">
        <a href="{{ route('posts.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</a>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save Post</button>
    </div>
</form>
@endsection
