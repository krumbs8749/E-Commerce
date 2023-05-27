<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://unpkg.com/vue@next"></script>

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
            #search{
                width: 96%;
                margin: 10px;
                padding: 10px;
                border: 1px solid black;
                border-radius: 5px;
            }
            table{
                text-align: center;
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
            <input id="search" type="text" v-model="search" placeholder="Suchen">
            <table>
                <thead>
                <tr>
                    <td>id</td>
                    <td>name</td>
                    <td>price</td>
                    <td>description</td>
                    <td>picture</td>
                </tr>
                </thead>
                <tbody v-if="searchResult === null">
                @foreach ($articles as $d)
                    <tr>
                        <td>{{$d['id']}}</td>
                        <td>{{$d['ab_name']}}</td>
                        <td>{{$d['ab_price']}}</td>
                        <td>{{$d['ab_description']}}</td>
                        @if(File::exists(public_path("/articleimages/$d->id.jpg")))
                            <td><img alt="article image" src={{"/articleimages/$d->id.jpg"}}></td>
                        @elseif(File::exists(public_path("articleimages/$d->id.png")))
                            <td><img alt="article image" src={{"/articleimages/$d->id.png"}}></td>
                        @else
                            <td>No Image</td>
                        @endif
                        <td><button id="article_{{$d['id']}}" class="article_add" value="{{$d['ab_name']}}">+</button></td>
                    </tr>
                @endforeach
                </tbody>
                <tbody v-else="">
                    <tr v-for="result in searchResult">
                        <td>@{{  result.id }}</td>
                        <td>@{{  result.ab_name }}</td>
                        <td>@{{  result.ab_price }}</td>
                        <td>@{{  result.ab_description }}</td>
                        <td><img alt="No Image" v-bind:src="'/articleimages/' + result.id + '.jpg'"  @@error="imageUrlAlt"></td>
                        <td><button v-bind:id="'article_'+ result.id" class="article_add"
                                    v-bind:value="result.ab_name" @click="addCart">+</button></td>
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
    </body>
<script>
    Vue.createApp({
        data(){
            return {
                'searchResult' : null,
                'search' : null,

            }
        },
        watch: {
            search(currentInput){
                if(currentInput.length >= 3)
                    this.getSearched(currentInput)
                else{
                    this.searchResult = null
                    setAddArticleListener()
                }
            }
        },
        methods: {
            getSearched(currentInput){
                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = () => {
                    if(xhr.readyState === 4 && xhr.status === 200){
                        this.$data.searchResult = JSON.parse(xhr.response)
                    }
                }
                xhr.open('GET', '/api/articles?search=' + currentInput);
                xhr.send();
            },
            addCart : function (event){
                addToCart(event)
            },
            imageUrlAlt(event) {
                event.target.src = event.target.src.replace(".jpg", ".png")
            }
        }
    }).mount('#app')
</script>
<script src="{{asset('js/shoppingcart.js')}}"></script>
</html>
