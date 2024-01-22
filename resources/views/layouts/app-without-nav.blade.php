<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-topbar="light" data-sidebar-image="none">

<head>
    <meta charset="utf-8"/>
    <title>Agenda Colaborativa | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Agenda Colaborativa - Ecosistema de Innovación" name="description"/>
    <meta content="Virtualland" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('images/favicon.ico')}}">
    @include('layouts.head-css')
</head>

<body>
@yield('content')
@include('layouts.vendor-scripts')
</body>
</html>

