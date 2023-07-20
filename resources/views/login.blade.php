<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">

    <title>Document</title>
</head>
<body class="bg-gray-100">
    <header class="p-4">
        <h2 class="text-2xl font-bold">
            Login
        </h2>
        <p class="mt-2">Log into account to manage tasks</p>
    </header>

    <form method="POST" action="/users/authenicate" class="px-4 py-2 mt-4">
        @csrf
        

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

        

        <div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md mt-4">
                Sign In
            </button>
        </div>

        <div class="mt-8">
            <p>
                Don't have an account?
                <a href="/register" class="text-blue-500">Register</a>
            </p>
        </div>
    </form>
</body>
</html>