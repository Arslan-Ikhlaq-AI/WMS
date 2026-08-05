<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in — {{ config('app.name') }}</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
    <div class="w-full max-w-sm bg-white rounded-lg shadow p-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Log in</h1>

        {{-- Show the "logged out" or other status message, if any --}}
        @if (session('status'))
            <div class="mb-4 text-sm text-green-600">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('login.store') }}" class="space-y-4">
            {{-- CSRF token: required on every POST form in Laravel --}}
            @csrf
            <div>
                
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}"
                       required autofocus
                       class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                {{-- Validation error for the email field --}}
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required
                       class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <label class="flex items-center gap-2 text-sm text-gray-600">
                <input type="checkbox" name="remember" class="rounded border-gray-300">
                Remember me
            </label>

            <button type="submit"
                    class="w-full bg-indigo-600 text-white rounded py-2 font-medium hover:bg-indigo-700">
                Log in
            </button>
        </form>
    </div>
</body>
</html>
