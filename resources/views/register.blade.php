<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<header class="p-4">
    <h2 class="text-2xl font-bold">
        Register
    </h2>
    <p class="mt-2">Create an account to manage tasks</p>
</header>

<form method="POST" action="/users" class="px-4 py-2 mt-4">
    @csrf
    <div class="mb-4">
        <label for="name" class="block text-lg mb-2">Name</label>
        <input type="text" name="name" value="{{ old('name') }}"
               class="border border-gray-400 px-2 py-1 rounded-md w-full" required>
        @error('name')
        <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="email" class="block text-lg mb-2">Email</label>
        <input type="email" name="email" value="{{ old('email') }}"
               class="border border-gray-400 px-2 py-1 rounded-md w-full" required>
        @error('email')
        <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="password" class="block text-lg mb-2">Password</label>
        <input type="password" name="password" value="{{ old('password') }}"
               class="border border-gray-400 px-2 py-1 rounded-md w-full" required>
        @error('password')
        <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="password_confirmation" class="block text-lg mb-2">Confirm Password</label>
        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"
               class="border border-gray-400 px-2 py-1 rounded-md w-full" required>
        @error('password_confirmation')
        <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md mt-4">
            Sign Up
        </button>
    </div>

    <div class="mt-8">
        <p>
            Already have an account?
            <a href="/login" class="text-blue-500">Login</a>
        </p>
    </div>
</form>
</body>
</html>
