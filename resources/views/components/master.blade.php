<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tweety</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <section class="px-8 mb-4">
            <header class="container mx-auto border">
                <div class="flex justify-between">
                    <div class="logo">
                        <h3>Tweety</h3>
                    </div>
                    @auth
                    <div class="user">
                        <a href="{{auth()->user()->path()}}">
                            <img src="{{auth()->user()->getAvatar()}}" alt="" style="width:40px">
                        </a>
                        
                        <p>Welcome, {{auth()->user()->name}}</p>
                    </div>
                    @endauth
                </div> 
            </header>
        </section>

        {{$slot}}
    </div>

    <script src="http://unpkg.com/turbolinks"></script>
</body>
</html>
