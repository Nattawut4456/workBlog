<?php
    use Illuminate\Support\Facades\Auth;
?>
<!DOCTYPE html>
<html style="height: 100%;" lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Blog Web')</title>

    <style>
    
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body style="height: 100%; background-color: #eeeeee">
    <div class="d-flex flex-row" style="height: 100%">
        <div class="bg-primary text-white pt-3 px-4 position-fixed fixed-top d-flex flex-column" style="width: 15%; height: 100%;">
            <h1 class="mb-5">Blog</h1>
            <div class="my-3"><a href="{{url('/')}}" class="text-white text-decoration-none" href="#">Home</a></div>
            <div class="my-3"><a href="" class="text-white text-decoration-none" href="#">My Blogs</a></div>
            <div class="my-3"><a  class="text-white text-decoration-none" href="#">Favourite Blogs</a></div>
            @if (Auth::check())
                <form action="{{url('/logout')}}" method="POST" class="my-3">@csrf<button type="submit" class="btn btn-link text-white text-decoration-none p-0">Log out</button></form>
            @else
            <div class="my-3"><a class="text-white text-decoration-none" href="{{url('/login')}}">Log in</a></div>
            @endif
            

            <div class="mt-auto mb-5">@yield('writeblog')</div>
        </div>

        <div style="width: 15%"></div>
        <div class="container mt-3 p-3">
            @yield('content')
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</body>
</html>
