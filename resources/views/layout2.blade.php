<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
    <link href="/css/default.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/css/fonts.css" rel="stylesheet" type="text/css" media="all" />


    @yield('head')

</head>
<body>
<div id="header-wrapper">

    <div id="header" class="container">
        <div id="logo">
            <h1><a href="/welcome2">SimpleWork</a></h1>
        </div>
        <div id="menu">
            <ul>
                <li class="{{Request::path()==='welcome2' ? 'current_page_item' : ''}}"><a href="/welcome2" accesskey="1" title="">Homepage</a></li>
                <li class="{{Request::path()==='client' ? 'current_page_item' : '' }}" ><a href="#" accesskey="2" title="">Our Clients</a></li>
                <li class="{{Request::is('about') ? 'current_page_item' : '' }}"><a href="/about" accesskey="3" title="">About Us</a></li>
                <li class="{{Request::path()==='article' ? 'current_page_item' : '' }}"><a href="/article" accesskey="4" title="">Articles</a></li>
                <li class="{{Request::path()==='contact' ? 'current_page_item' : '' }}"><a href="{{route('contact.create')}}" accesskey="5" title="">Contact Us</a></li>
            </ul>
        </div>
    </div>

    @yield('header')

</div>

@yield('content')

<div id="copyright" class="container">
    <p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>
