<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sakac Chat') }}</title>

    <!-- Scripts -->
    {{-- <script src="https://unpkg.com/vue"></script> --}}
    {{-- <script src="https://unpkg.com/vue-upload-component"></script> --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://sdk.amazonaws.com/js/aws-sdk-2.283.1.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
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
</style>

<!-- Scripts -->
 <script>
 // const scrollDown = function (elm) {
 //     elm.scrollTop = elm.scrollHeight;
 // }
 // const btn_input = document.getElementById('btn-input');
 // const btn_click = document.getElementById('btn-chat');
 // const chat_body = document.getElementsByClassName("panel-body")[0];
 // btn_input.onkeyup = function (event) {
 //     if (event.key === 'Enter') {
 //         scrollDown(chat_body);
 //     }
 // }
 // btn_click.onclick = function () {
 //     scrollDown(chat_body);
 // }
 // window.onload = function () {
 //     setTimeout(function () {
 //         scrollDown(chat_body);
 //     }, 300);
 // }
         // setTimeout(function(){
         // chat_body.scrollTop(chat_body.prop('scrollHeight'));
         // },
         // 100);
     </script>

</head>
<body>
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

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                      {{-- <img src="{{ Auth::user()->getMedia('avatars')->first()->getUrl('thumb') }}"> --}}
                                      {{-- {{ Auth::user()->name }} <span class="caret"></span> --}}
                                      Albums
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                        <a class="dropdown-item" href="/albums">
                                            Albums
                                        </a>
                                        <a class="dropdown-item" href="/upload">
                                            Upload Albums
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>

                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                      {{-- <img src="{{ Auth::user()->getMedia('avatars')->first()->getUrl('thumb') }}"> --}}
                                      {{-- {{ Auth::user()->name }} <span class="caret"></span> --}}
                                        Profile
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/profile">
                                            Profile
                                        </a>
                                         <a class="dropdown-item" href="/edit-profile">
                                            Edit Profile
                                        </a>
                                    </div>
                                </li>

                        </ul>
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
                                      {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
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
            </nav>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        <!-- Scripts -->
        {{-- <script type="text/javascript" src="jquery.min.js"></script>
        <script type="text/javascript" src="jquery.ui.widget.js"></script>
        <script type="text/javascript" src="jquery.iframe-transport.js"></script>
        <script type="text/javascript" src="jquery.fileupload.js"></script>
        <script type="text/javascript" src="jquery.cloudinary.js"></script>  --}}
    </body>
</html>
