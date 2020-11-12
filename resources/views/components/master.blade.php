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
            <header class="container mx-auto bg-blue-100 py-2 px-2 rounded-lg">
                <div class="flex justify-between items-center mb-1">
                    <div class="logo mx-2 text-blue-800 text-3xl">
                        <a href="{{route('home')}}">
                            <h3>Tweety</h3>    
                        </a>
                    </div>
                    @auth
                        <div class="user flex items-center">
                            <div class="rounded rounded-full w-10 bg-white">
                                <a href="{{auth()->user()->path()}}">
                                    <img src="{{auth()->user()->getAvatar()}}" alt="" style="width:40px">
                                </a>    
                            </div>
                            
                            
                            <p class="mx-1">
                                Welcome, <span class="text-blue-500">{{auth()->user()->name}}</span>
                            </p>
                        </div>
                    @else
                        <div class="flex space-x-2">
                            <a href="{{ route('login') }}">Login</a>
                            <a href="{{ route('register') }}">Register</a>    
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
