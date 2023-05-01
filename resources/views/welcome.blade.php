<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body class="antialiased">
        <form method="POST" action="{{ route('email.verify') }}">
            @csrf
            <input type="text" name="email"/>
            <input type="submit" value="Verify Email Address"/>
            @error('email')
                <div class="alert alert-danger">Invalid mail</div>
            @enderror
        </form>
    </body>
</html>
