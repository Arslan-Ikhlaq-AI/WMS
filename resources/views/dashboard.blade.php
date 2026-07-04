<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard — {{ config('app.name') }}</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-gray-100">
    <nav class="bg-white shadow">
        <div class="max-w-5xl mx-auto px-4 py-4 flex items-center justify-between">
            <span class="font-semibold text-gray-800">WMS Dashboard</span>
            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-600">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-red-600 hover:underline">Log out</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto p-6">
        <div class="bg-white rounded-lg shadow p-6">
            <h1 class="text-xl font-semibold text-gray-800">
                Welcome back, {{ auth()->user()->name }} 👋
            </h1>
            <p class="mt-2 text-gray-600">You are logged in.</p>
        </div>
    </main>
</body>
</html>
