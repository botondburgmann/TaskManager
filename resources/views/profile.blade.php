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

        <form method="POST" action="/saveProfile/{{ $user->id }}">
            @csrf
            @method('PUT')
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}"><br>
            <label for="due:date">Email address</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}"><br>
            <button type="submit">Save changes</button>
        </form>
    </body>
</html>
