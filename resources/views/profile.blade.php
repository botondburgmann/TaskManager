<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <title>User Profile</title>
</head>
<body class="bg-gray-100">
<div class="container mx-auto py-4">
    <h1 class="text-3xl font-bold">User Profile</h1>
    <form method="POST" action="/saveProfile/{{ $user->id }}" class="mt-4">
        @csrf
        @method('PUT')
        <label for="name" class="block mb-2 text-lg">Name</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}"
               class="border border-gray-400 px-2 py-1 rounded-md w-full" required>

        <label for="email" class="block mt-2">Email address</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}"
               class="border border-gray-400 px-2 py-1 rounded-md w-full" required>

        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md mt-4">
            Save changes
        </button>
    </form>
</div>
</body>
</html>
