<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        
        <title>Task Manager</title>
    </head>
    <body>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
            <li>
                <span class="font-bold uppercase">
                    Welcome {{ auth()->user()->name }}
                </span>
            </li>
            <li>
                <a
                href="/userProfile/{{ auth()->id() }}"
                ><i
                    class="fa-solid fa-user"
                ></i>
                User profile</a>
            </li>
            <li>
                <form class="inline" method="POST" action="/logout">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-door-closed"></i>Logout
                    </button>
                </form>
            </li>

        </ul>
        <a
        href="/filterComplete"
        ><i
            class="fa-solid fa-filter"
        ></i>
        Filter complete</a>
        <a
        href="/filterPending"
        ><i
            class="fa-solid fa-filter"
        ></i>
        Filter pending</a>
        <a
        href="/showAll"
        ><i
            class="fa-solid fa-filter"
        ></i>
        Show All</a>
        
        @foreach ($listItems as $listItem )
        @if ($listItem->user_id == auth()->id())
        <p style="display: inline-block;">
            Task: {{ $listItem->name }} - Deadline: {{ $listItem->due_date }} - Status
            @if ($listItem->is_complete == 0)
                pending <a href="/completeItem/{{ $listItem->id }}"><i class="fa-solid fa-check"></i> Mark complete</a>
            @else
                complete
            @endif
            <a href="/editItem/{{ $listItem->id }}" class="text-blue-400 px-6 py-2 rounded-xl"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
            <form style="display: inline;" method="POST" action="/deleteItem/{{ $listItem->id }}">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
        </p>
          
        @endif

        
        @endforeach

        <form method="POST" action="/saveItem">
            @csrf
            <label for="name">Title</label>
            <input type="text" name="name" id="name"><br>
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea><br>
            <label for="due:date">Due date</label>
            <input type="date" name="due_date" id="due_date"><br>
            <button type="submit">Add new task</button>
        </form>
            @else
            <li>
                <a href="/register" class="hover:text-laravel"
                    ><i class="fa-solid fa-user-plus"></i> Register</a
                >
            </li>
            <li>
                <a href="/login" class="hover:text-laravel"
                    ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login</a
                >
            </li>
            @endauth

       
    </body>
</html>
