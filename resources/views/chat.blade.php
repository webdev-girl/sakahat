{{-- <!DOCTYPE html>
<html lang="en" "{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.Sakac Chat', 'Sakac Chat') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
    <script src="https://sdk.amazonaws.com/js/aws-sdk-2.283.1.min.js"></script>
    <script src="https://unpkg.com/vue@2.4.2"></script>
    <!-- Styles -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="/css/style.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    body,html{
            height: 100%;
            margin: 0;
            background: #7F7FD5;
            background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
            background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
        }
        .chat {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .chat li {
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px dotted #B3A9A9;
        }
        .chat li .chat-body p {
            margin: 0;
            /* color: #777777; */
            color: white;
        }
        .panel-body {
            overflow-y: scroll;
            height: 350px;
        }
        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }
        ::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }
        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
        }
    </style> --}}

    <!-- Scripts -->
     {{-- <script>
            const scrollDown = function (elm) {
                elm.scrollTop = elm.scrollHeight;
            }
            const btn_input = document.getElementById('btn-input');
            const btn_click = document.getElementById('btn-chat');
            const chat_body = document.getElementsByClassName("panel-body")[0];


            btn_input.onkeyup = function (event) {
                if (event.key === 'Enter') {
                    scrollDown(chat_body);
                }
            }
            btn_click.onclick = function () {
                scrollDown(chat_body);
            }

            window.onload = function () {
                setTimeout(function () {
                    scrollDown(chat_body);
                }, 300);
            }

        </script> --}}
    {{-- <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'pusherKey' => config('broadcasting.connections.pusher.key'),
            'pusherCluster' => config('broadcasting.connections.pusher.options.cluster')
        ]) !!};
    </script>

    <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('c7ddf82d3d9f7d4aa65f', {
      cluster: 'us3',
      forceTLS: true
    });
    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
    Pusher.logToConsole = true;
  </script>
</head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/welcome') }}">
                        {{ config('app.Sakac Chat', 'Sakac Chat') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                     <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                         <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                             @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                         {{-- <img src="{{ Auth::user()->getMedia('avatars')->first()->getUrl('thumb') }}"> --}}
                                        {{-- {{ Auth::user()->name }} <span class="caret"></span>

                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <a class="dropdown-item" href="/edit-profile">
                                            User Profile
                                        </a>
                                        <a class="dropdown-item" href="/profile">
                                            Profile
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>  --}}

            @extends('layouts.app')

            @section('content')

            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Chats</div>

                            <div class="panel-body">
                                <chat-messages :messages="messages"></chat-messages>
                            </div>
                            <div class="panel-footer">
                                <chat-form
                                    v-on:messagesent="addMessage"
                                    :user="{{ Auth::user() }}"
                                ></chat-form>
                            </div>
                             <Chat :user="{{auth()->user()}}"></Chat>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
        {{-- <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav> --}}
        {{-- <div class="container">
            <div class="content" id="app">
                <botman-tinker api-endpoint="/botman"></botman-tinker>
            </div>
        </div> --}}
            {{-- @yield('content') --}}
            {{-- <main class="py-4">
                @yield('content')
            </main>
        </div> --}}

        <!-- Scripts -->
        {{-- <script type="text/javascript" src="jquery.min.js"></script> --}}
        {{-- <script type="text/javascript" src="jquery.ui.widget.js"></script>
        <script type="text/javascript" src="jquery.iframe-transport.js"></script>
        <script type="text/javascript" src="jquery.fileupload.js"></script>
        <script type="text/javascript" src="jquery.cloudinary.js"></script> - --}}
    {{-- </body>
</html> --}}

{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chats</div>

                <div class="panel-body">
                    <chat-messages :messages="messages"></chat-messages>
                </div>
                <div class="panel-footer">
                    <chat-form
                        v-on:messagesent="addMessage"
                        :user="{{ Auth::user() }}"
                    ></chat-form>
                </div>
                <div class="container">
                    <div class="content" id="app">
                        <botman-tinker api-endpoint="/botman"></botman-tinker>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
