<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://unpkg.com/vue@next"></script>
    <title>Vue Article</title>
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
