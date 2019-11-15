<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="laravel,laravel论坛,laravel社区,laravel教程,laravel视频,laravel开源,laravel新手,laravel5,PHP开源，php博客，php技术进阶，php进阶 "/>
    <meta name="keywords" content="laravel,laravel论坛,laravel社区,laravel教程,laravel视频,laravel开源,laravel新手,laravel5" />
    <title>@yield('title', '宝金博客') </title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}?{{time()}}" rel="stylesheet">
    <link href="{{ asset('default/static/css/default.css') }}?{{time()}}" rel="stylesheet">
	<link rel="stylesheet" href="//cdn.bootcss.com/font-awesome/4.2.0/css/font-awesome.min.css"/>
	@yield('styles')
</head>

<body>

    <div id="app" class="{{ route_class() }}-page">

        @include('layouts._header')

        <div class="container">
			@include('shared._messages')
            @yield('content')

        </div>

        @include('layouts._footer')
    </div>
	
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}?{{time()}}"></script>
	<script src="{{ asset('/default/static/js/search.js') }}?{{time()}}"></script>
	@yield('scripts')
</body>
</html>