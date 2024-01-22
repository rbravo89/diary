<!doctype html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light"
      data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable"
      xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8"/>
    <title>Agenda Colaborativa | @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Agenda Colaborativa - Ecosistema de Innovación" name="description"/>
    <meta content="Virtualland" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    @include('layouts.head-css')
</head>
<body>
<div id="layout-wrapper">
    @include('layouts.topbar')
    @include('layouts.sidebar')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        @include('layouts.footer')
    </div>
</div>
@include('layouts.vendor-scripts')
</body>
</html>
