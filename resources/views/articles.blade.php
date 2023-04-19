<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
    </head>
    <body class="antialiased">

    <table border>
        <thead>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>price</td>
            <td>description</td>
            <td>picture</td>
        </tr>
        </thead>
        <tbody>
        @foreach ($articles as $d)
        <tr>
            <td>{{$d['id']}}</td>
            <td>{{$d['ab_name']}}</td>
            <td>{{$d['ab_price']}}</td>
            <td>{{$d['ab_description']}}</td>
            <td><img src={{"/articelimages/$d->id.jpg"}}></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <script src="/JavaScript/Navigation.js"></script>
    </body>
</html>
