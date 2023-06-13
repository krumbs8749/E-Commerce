<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    @vite(['../resources/js/app.js'])
    @vite(['../resources/css/app.css'])
    <title>Vue Article</title>

    <!-- Styles -->

</head>
<body>
    <div id="app">
        <siteheader @update-type="setType" categories="{{$articles_categories}}"></siteheader>
        <sitebody :type="type" articles="{{$articles}}" articleslength="{{$articles_length}}"></sitebody>
        <sitefooter @update-type="setType"></sitefooter>
    </div>
    <script src="{{asset('js/shoppingcart.js')}}"></script>
    <script src="{{asset('js/cookiecheck.js')}}"></script>
</body>
</html>
