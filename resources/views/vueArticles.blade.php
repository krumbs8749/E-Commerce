<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    @vite(['../resources/js/app.js'])
    @vite(['../resources/sass/app.scss'])
    @vite(['../resources/css/app.css'])
    <title>Vue Article</title>

    <!-- Styles -->

</head>
<body class="newSiteBody">
    <input type="hidden" id="userId" name="userId" value="{{$userId}}">
    <div id="app" >
        <siteheader @update-type="setType" @myarticle="myArticle" categories="{{$articles_categories}}" enablelogin="{{$enableLogIn}}" userid="{{$userId}}"></siteheader>
        <sitebody :type="type" :myarticle="myarticle" articles="{{$articles}}" articleslength="{{$articles_length}}" userid="{{$userId}}" token="{{ csrf_token() }}"></sitebody>
        <sitefooter @update-type="setType"></sitefooter>
    </div>
    <script src="{{asset('js/shoppingcart.js')}}"></script>
    <script src="{{asset('js/cookiecheck.js')}}"></script>
    <script>
        const uId = document.getElementById('userId').value;
        const socket = new WebSocket('ws://localhost:8080/chat'); // WebSocket-URL anpassen

        socket.onopen = function(event) {
            console.log('Connected');
        };

        socket.onmessage = function(event) {
            console.log({'Received message': JSON.parse(event.data)}, uId);
            const {text, type, userId} = JSON.parse(event.data);
            if(type === 'alert' && userId == uId ){
                alert(text);
            }
        };

        socket.onclose = function(event) {
            console.log('Connection closed');
        };
    </script>
</body>
</html>
