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
        <style>
            body {
                margin: 0;
                display: flex;
                justify-content: center;
                align-items: flex-start;
                flex-direction: column;
                overflow-x: hidden;
            }
            img {
                height: 50px;
            }
            button {
                cursor: pointer;
            }
            .main{
                display: grid;
                width: 100%;
                grid-template-columns: 70% 30%;
            }
            .cart{
                background: #1a202c;
                color: white;
            }
            .cart > h3 {
                text-align: center;
            }
            #wishlist {
                padding: 0 20px 0 20px;
            }
            #wishlist > li{
                display: flex;
                justify-content: space-between;
            }
        </style>
    </head>
    <body class="antialiased">
    <script id='script-navigations' data-categories="{{ $articles_categories }}" src="{{ asset('js/navigation.js') }}">
    </script>
    <script src="{{ asset('js/cookiecheck.js') }}">
    </script>
    <div class="main">
        <table >
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
                    @if(File::exists(public_path("/articelimages/$d->id.jpg")))
                        <td><img alt="article image" src={{"/articelimages/$d->id.jpg"}}></td>
                    @elseif(File::exists(public_path("articelimages/$d->id.png")))
                        <td><img alt="article image" src={{"/articelimages/$d->id.png"}}></td>
                    @else
                        <td>No Image</td>
                    @endif
                    <td><button id="article_{{$d['id']}}" class="article_add" value="{{$d['ab_name']}}">+</button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="cart">
            <h3>Warenkorb</h3>
            <ul id="wishlist">
            </ul>
        </div>
    </div>
    <script src="{{asset('js/shoppingcart.js')}}"></script>
    </body>
</html>
