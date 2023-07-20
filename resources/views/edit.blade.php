<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="/css/style.css" rel="stylesheet">
    <!-- Replace "/css/style.css" with the path to your custom CSS file if available -->

    <title>Task Manager</title>
</head>
<body class="bg-gray-100">
<div class="container mx-auto py-4">
    <form method="POST" action="/saveItem/{{ $listItem->id }}" class="p-4 bg-white rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-lg font-bold mb-2">Title</label>
            <input type="text" name="name" id="name" value="{{ $listItem->name }}"
                   class="border border-gray-300 px-3 py-2 rounded-md w-full" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-lg font-bold mb-2">Description</label>
            <textarea name="description" id="description" cols="30" rows="10"
                      class="border border-gray-300 px-3 py-2 rounded-md w-full" required>{{ $listItem->description }}</textarea>
        </div>

        <div class="mb-4">
            <label for="due:date" class="block text-lg font-bold mb-2">Due date</label>
            <input type="date" name="due_date" id="due_date" value="{{ $listItem->due_date }}"
                   class="border border-gray-300 px-3 py-2 rounded-md w-full" required>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md mt-4">Edit task</button>
    </form>
</div>
</body>
</html>
