<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ isset($title) ? 'Academia'.' | '.$title: 'Home' }}</title>
    <link rel="stylesheet" href="{{ asset('css/vendor.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style-home.css') }}" />
    <link href="{{asset('css/line-awesome.min.css')}}" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6YWB4ECCWW"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-6YWB4ECCWW');
    </script>
</head>
<body>
<!-- header -->
<header class="header header-sticky header-light">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="{{ route('home') }}" class="navbar-brand mr-8">
                <img src="{{ asset('img/logo-black.svg') }}" alt="Logo"></a>

            <button class="navbar-toggler burger" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}"  role="button"  aria-haspopup="true" aria-expanded="false">
                            Accueil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}"  aria-haspopup="true" aria-expanded="false">
                            About
                        </a>

                    </li>
                    <li class="nav-item dropdown dropdown-hover">
                        <a class="nav-link dropdown-toggle" href="{{ route('contact') }}" id="navbarDropdown-3" role="button"  aria-haspopup="true" aria-expanded="false">
                            Contact
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-hover">
                        <a class="nav-link dropdown-toggle" href="{{ route('contact') }}" id="navbarDropdown-3" role="button"  aria-haspopup="true" aria-expanded="false">
                            Inscription
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-hover">
                        <a class="nav-link dropdown-toggle" href="{{ route('contact') }}" id="navbarDropdown-3" role="button"  aria-haspopup="true" aria-expanded="false">
                            Université
                        </a>
                    </li>
                </ul>
                <button type="button" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#subscribeModal">
                    Connexion<i class="las la-user pl-1"></i>
                </button>
            </div>
        </nav>
    </div>

</header>


