<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta id="csrfToken" content="{{csrf_token()}}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>New Article</title>

    <!-- Vue.js -->
    <script src="https://unpkg.com/vue@next"></script>

</head>
<body id="app">
    <!--
    <script id='script-newarticle' data-token="csrf_token()" src="asset('js/newarticle.js')"></script>
    -->
    <new-article></new-article>
</body>
<script type="module">

    import NewArticle from "./vue_components/newarticle.js";

    Vue.createApp({
        components:{
          NewArticle
        }
    }).mount('#app')

</script>
</html>
