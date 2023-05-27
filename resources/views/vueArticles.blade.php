<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Articles</title>

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
<div id="app">
    <siteheader categories="{{$articles_categories}}"></siteheader>
</div>
<script type="module">
    import Siteheader from "./vue_components/siteheader.js";
    Vue.createApp({
        components: {
            Siteheader
        }
    }).mount('#app');
</script>
</body>
</html>
