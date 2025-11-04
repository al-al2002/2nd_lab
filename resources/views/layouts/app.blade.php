<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel CRUD')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('posts.index') }}" class="font-bold text-lg">Chismis</a>
            <a href="{{ route('posts.create') }}" class="bg-white text-blue-600 px-4 py-1 rounded hover:bg-gray-200 transition">+ New Post</a>
        </div>
    </nav>

    <div class="container mx-auto mt-8 p-6 bg-white shadow-md rounded-lg">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4 border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

</body>
</html>
