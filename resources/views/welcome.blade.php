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
    <title>Task Manager</title>
</head>
<body class="bg-gray-100">
<div class="flex items-center justify-center min-h-screen">
    <div class="container mx-auto py-4">
        <ul class="flex space-x-4">
            @auth
                <li>Welcome {{ auth()->user()->name }}</li>
                <li>
                    <a href="/userProfile/{{ auth()->id() }}" class="hover:text-blue-500"><i class="fa-solid fa-user"></i>
                        User profile</a>
                </li>
                <li>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="hover:text-blue-500"><i class="fa-solid fa-door-closed"></i> Logout
                        </button>
                    </form>
                </li>
        
        </ul>

        <div class="flex space-x-4 py-4">
            <a href="/filterComplete" class="px-4 py-2 bg-blue-500 text-white rounded-md"><i class="fa-solid fa-filter"></i>
                Filter complete</a>
            <a href="/filterPending" class="px-4 py-2 bg-blue-500 text-white rounded-md"><i class="fa-solid fa-filter"></i>
                Filter pending</a>
            <a href="/showAll" class="px-4 py-2 bg-blue-500 text-white rounded-md"><i class="fa-solid fa-filter"></i> Show
                All</a>
        </div>

        @foreach ($listItems as $listItem)
            @if ($listItem->user_id == auth()->id())
                <div class="py-2 px-4 bg-white rounded-lg shadow-md my-2 flex items-center space-x-4">
                    <p class="flex-grow">Task: {{ $listItem->name }} <a href="/info/{{ $listItem->id }}" class="text-blue-500"
                                                                    title="{{ $listItem->description }}"><i
                                class="fa-solid fa-info-circle"></i></a> - Deadline: {{ $listItem->due_date }} - Status
                        @if ($listItem->is_complete == 0)
                            pending <a href="/completeItem/{{ $listItem->id }}" class="text-green-500"><i
                                    class="fa-solid fa-check"></i> Mark complete</a>
                        @else
                            complete <a href="/incompleteItem/{{ $listItem->id }}" class="text-yellow-500"><i
                                    class="fa-solid fa-clock"></i> Mark incomplete</a>
                        @endif
                    </p>
                    <a href="/editItem/{{ $listItem->id }}" class="px-4 py-2 bg-blue-500 text-white rounded-md"><i
                            class="fa-solid fa-pen-to-square"></i> Edit</a>
                    <form method="POST" action="/deleteItem/{{ $listItem->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="px-4 py-2 bg-red-500 text-white rounded-md"><i class="fa-solid fa-trash"></i>
                            Delete</button>
                    </form>
                </div>
            @endif
        @endforeach

        <form method="POST" action="/saveItem" class="p-4 bg-white rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-lg font-bold mb-2">Title</label>
                <input type="text" name="name" id="name"
                       class="border border-gray-300 px-3 py-2 rounded-md w-full" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-lg font-bold mb-2">Description</label>
                <textarea name="description" id="description" cols="30" rows="10"
                          class="border border-gray-300 px-3 py-2 rounded-md w-full" required></textarea>
            </div>

            <div class="mb-4">
                <label for="due:date" class="block text-lg font-bold mb-2">Due date</label>
                <input type="date" name="due_date" id="due_date" 
                       class="border border-gray-300 px-3 py-2 rounded-md w-full" required>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md mt-4">Add new task</button>
        </form>
        @else
        <ul class="flex space-x-4">
            <li>
                <a href="/register" class="hover:text-blue-500"><i class="fa-solid fa-user-plus"></i> Register</a>
            </li>
            <li>
                <a href="/login" class="hover:text-blue-500">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i> Login
                </a>
            </li>
        </ul>
        @endauth
    </div>
</div>
</body>
</html>

