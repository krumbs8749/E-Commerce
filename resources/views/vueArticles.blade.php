<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://unpkg.com/vue@next"></script>
    <title>Vue Article</title>

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
            height: 100vh;
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
<body>
    <div id="app">
        <sitebody articles="{{$articles}}"></sitebody>
    </div>
    <script src="{{asset('js/shoppingcart.js')}}"></script>
    <script src="{{asset('js/cookiecheck.js')}}"></script>
</body>
<script type="module">
    import Sitebody from './vue_components/sitebody.js'

    Vue.createApp({
      components:{
          Sitebody
      }
    }).mount('#app')

</script>

</html>
