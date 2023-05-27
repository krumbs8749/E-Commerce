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
        .nav {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            height: 3rem;
            width: 100vw;
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333333;
        }
        .nav-item {
            display: block;
            text-align: center;
            padding: 16px;
            text-decoration: none;
            color: white;
            cursor: pointer;
        }
        .nav-item:hover {
            background-color: #111111;
        }
        .nav-item-list {
            display: none;
            position: absolute;
            top: 45px;
            padding: 5px;
            width: 250px;
            background-color: #333333;
        }
        .nav-item-list-item {
            display: block;
            text-align: left;
            padding: 5px;
            text-decoration: none;
            color: white;
            cursor: pointer;
        }
        .nav-item:hover > .nav-item-list {
            display: block;
        }
        .nav-item-list-item:hover {
            background-color: #111111;
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
            min-height: 80vh;
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
        footer {
            background-color: #111111;
            color: #FFFFFF;
            padding: 10px;
            text-align: center;
        }
        footer a {
            padding: 0 5px 0 5px;
            color: ghostwhite;
        }
    </style>
</head>
<body>
    <div id="app">
        <siteheader categories="{{$articles_categories}}"></siteheader>
        <sitebody articles="{{$articles}}"></sitebody>
        <sitefooter></sitefooter>
    </div>
    <script src="{{asset('js/shoppingcart.js')}}"></script>
    <script src="{{asset('js/cookiecheck.js')}}"></script>
</body>
<script type="module">
    import Siteheader from "./vue_components/siteheader.js";
    import Sitebody from './vue_components/sitebody.js';
    import Sitefooter from './vue_components/sitefooter.js';

    Vue.createApp({
      components:{
          Siteheader,
          Sitebody,
          Sitefooter
      }
    }).mount('#app')

</script>
</html>
