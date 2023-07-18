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

        <form method="POST" action="/saveItem/{{ $listItem->id }}">
            @csrf
            @method('PUT')
            <label for="name">Title</label>
            <input type="text" name="name" id="name" value="{{ $listItem->name }}"><br>
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10">{{ $listItem->description }}</textarea><br>
            <label for="due:date">Due date</label>
            <input type="date" name="due_date" id="due_date" value="{{ $listItem->due_date }}"><br>
            <button type="submit">Add new task</button>
        </form>
    </body>
</html>
