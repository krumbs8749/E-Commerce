<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://unpkg.com/vue@next"></script>

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
                height: 100vh;
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
    <div class="main" id="app">
        <div>
            <label for="search-input">Search: </label>
            <input type="text" id="search-input" name="search-input" v-model="searchInput">
            <table v-if="searchResults===null" >
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
            <table v-else>
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
                <tr v-for="data in searchResults">
                    <td>@{{data['id']}}</td>
                    <td>@{{data['ab_name']}}</td>
                    <td>@{{data['ab_price']}}</td>
                    <td>@{{data['ab_description']}}</td>
                    <td><button v-bind:id="'article_'+ data.id" class="article_add" v-bind:value="data.ab_name" v-on:click="insertToCart">+</button></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="cart">
            <h3>Warenkorb</h3>
            <ul id="wishlist">
            </ul>
        </div>
    </div>

    <script>
        Vue.createApp({
            data() {
                return {
                    searchInput: '',
                    searchResults: null
                }
            },
            watch: {
                searchInput(newInput){
                    if(newInput.length >= 3){
                        this.getArticle(newInput);
                    }else {
                        this.$data.searchResults = null;
                        setAddArticleListener();
                    }
                }
            },
            methods: {
                getArticle: function (search) {
                    const xhr = new XMLHttpRequest();
                    xhr.open('GET', `/api/articles?search=${search}`);
                    xhr.onreadystatechange = () => {
                        if(xhr.readyState === 4 && xhr.status === 200){
                            this.$data.searchResults = JSON.parse(xhr.responseText);
                        }
                    }
                    xhr.send();
                },
                insertToCart: function (event){
                    insertIntoCart(event);
                }

            }
        }).mount('#app');
    </script>
    <script src="{{asset('js/shoppingcart.js')}}"></script>
    </body>
</html>
