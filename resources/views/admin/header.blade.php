<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, shrink-to-fit=no" >
    <meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
    <meta name="author" content="academia">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? 'Academia'.' | '.$title: 'Dashbord' }}</title>
    <!-- Fonts -->
{{--    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">--}}
    <link href="{{asset('css/modern.css')}}" rel="stylesheet">
    <link href="{{asset('css/line-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <script src="{{ asset('js/settings.js') }}"></script>
</head>
<body>



