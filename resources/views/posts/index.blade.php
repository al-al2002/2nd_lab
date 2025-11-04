@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
<div x-data="{ openModal: false, modalTitle: '', modalContent: '' }">
    <h1 class="text-2xl font-semibold mb-4">All Posts</h1>

    @if($posts->count())
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-2 px-4 border-b text-left"> ChismisTitle</th>
                    <th class="py-2 px-4 border-b text-left">chismisContent </th>
                    <th class="py-2 px-4 border-b text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border-b font-medium">{{ $post->title }}</td>
                        <td class="py-2 px-4 border-b text-gray-600">{{ Str::limit($post->content, 60) }}</td>
                        <td class="py-2 px-4 border-b text-center">
                            <div class="space-x-2">
                             
                                <button
                                    @click="openModal = true; modalTitle = '{{ addslashes($post->title) }}'; modalContent = `{{ addslashes($post->content) }}`"
                                    class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">
                                    View
                                </button>

                               
                                <a href="{{ route('posts.edit', $post->id) }}"
                                   class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">
                                    Edit
                                </a>

                               
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this post?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-600">No Chismiss posts found. <a href="{{ route('posts.create') }}" class="text-blue-600 hover:underline">Create one?</a></p>
    @endif


    <div
        x-show="openModal"
        x-cloak
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-60 z-50"
    >
        <div
            class="bg-white rounded-lg shadow-lg w-11/12 md:w-1/2 p-6 relative"
            @click.away="openModal = false"
        >
            <button
                @click="openModal = false"
                class="absolute top-3 right-3 text-gray-600 hover:text-gray-800 text-xl font-bold"
            >
                ×
            </button>
            <h2 class="text-2xl font-bold mb-3" x-text="modalTitle"></h2>
            <p class="text-gray-700 whitespace-pre-line" x-text="modalContent"></p>

            <div class="mt-6 text-right">
                <button
                    @click="openModal = false"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
