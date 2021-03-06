@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Sakac Chat</title>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <style>
    body {
        margin:0;
        padding:0;
        }
    h1 {
        position:absolute;
        top:30%;
        left:50%;
        z-index:-1;
        font-size:70px;
        transform:translate(-50%,-50%);
    }
    h6{
        font-size: 30px;
    }
    .loader {
        position:absolute;
        top:30%;
        transform:translateY(-50%);
        width:100%;
        height:10px;
        text-align:center;
    }
    .loader span {
        width:30px;
        height:30px;
        background:#fff;
        display:inline-block;
        border-radius:50%;
        animation:animate 2s linear infinite;
        opacity:0;
    }
    .loader span:nth-child(1) {
        animation-delay:0.8s;
        /* background:#00c2ff; */
        margin: 0;
        background: #7F7FD5;
        background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
        background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
    }
    .loader span:nth-child(2) {
        animation-delay:0.4s;
        /* background:#ffe837; */
        margin: 0;
        background: #white;
        background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
        /* background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5); */

    }
    .loader span:nth-child(3) {
        animation-delay:0.2s;
        /* background:#ff1b78; */
        margin: 0;
        background: #7F7FD5;
        background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
        background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
    }
    .bottom{
        padding: 0 20px;
        margin-bottom: 17px;
    }

    .btn{ border-radius: 50%; width:32px; height:32px; line-height:18px;  }


    @keyframes animate {
        0% {
            transform: translateX(-200px);
            opacity:0;
        }
        25% {
            transform: translateX(-100px);
            opacity:1;
        }
        50% {
            transform: translateX(0);
            opacity:1;
        }
        75% {
            transform: translateX(0);
            opacity:1;
        }
        100% {
            transform: translateX(100px);
            opacity:0;
        }
        90% {
            transform: translateX(100px);
            opacity:0;
        }
    }
    </style>
    <body>
        <div class="row">
            <div class="profile-header-container">
                <div class="profile-header-img">
                    <img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" />

                    <!-- badge -->
                    <div class="rank-label-container">
                        <span class="label label-default rank-label">{{$user->name}}</span>
                    </div>
                </div>
            </div>
        </div>
            <div class="loader">
                <span></span>
                <span></span>
                <span></span>
                <div class="span2" >
                </div>
                <h1>{{ Auth::user()->name }} </h1>
                <br/>
                <h6>{{ Auth::user()->email }}</h6>
                <h6></h6>
                <div class="bottom">
                    <a class="btn btn-primary btn-twitter btn-sm" href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" rel="publisher"
                        href="#">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" rel="publisher"
                        href="#">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="btn btn-warning btn-sm" rel="publisher" href="#">
                        <i class="fa fa-behance"></i>
                    </a>
                </div>
            </div>
            {{-- <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px;height:150px;float:left;border-radius:50%;margin-right:25px"> --}}
                {{-- <h2>{{ $user->name }}'s Profile</h2>

                <form enctype="multipart/form-data" action="/profile" method="post">
                    <label>Update Profile Image</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="{{ $user->name }}">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">

                    <input type="submit" class=" btn btn-sm btn-light" style="color:#2b2b2b;">
                </form> --}}
        {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
        {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> --}}
        {{-- <script src="https://js.pusher.com/3.2/pusher.min.js"></script> --}}
    </body>
</html>
@endsection
