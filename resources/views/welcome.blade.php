<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Home | {{ env('APP_NAME') }}</title>

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> --}}
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .versioninfo {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
            }

            .framwork_title {
                font-weight: 600;
                padding-top: 20px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="container">
                <div class="navbar-brand">
                    <a href="/">
                        <img src="{{asset('assets/images/kjc-logo-dark.png')}}">
                    </a>
                </div>

                <!-- <div id="navbarBasicExample" class="navbar-menu">
                    <div class="navbar-end">
                        <div class="navbar-item">
                            <div class="buttons">
                            <a class="button orange" href="/register">
                                <strong>Sign up</strong>
                            </a>
                            <a class="button is-light" href="/login">
                                Log in
                            </a>
                            </div>
                        </div>
                    </div>
                </div> -->


                <div id="navbarBasicExample" class="navbar-menu">
                        <div class="navbar-end">
                            @if (Auth::guest())  
                                <div class="navbar-item">
                                    <div class="buttons">
                                        
                                        <a class="button orange" href="{{ route('register') }}">
                                            <strong>Sign up</strong>
                                        </a>
                                        <a class="button is-light" href="{{ route('login') }}">
                                            Log in
                                        </a> 
                                    </div>
                                </div>
                            @else
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link" href="{{ url('/profile/'.Auth::user()->slug) }}">{{ Auth::user()->name }}
                                            <figure class="image is-32x32" style="margin-left:.8rem;">
                                                    <img class="is-rounded" src="https://ui-avatars.com/api/{{ Auth::user()->name }}">
                                            </figure>
                                </a>

                                <div class="navbar-dropdown">
                                    <a class="navbar-item" href={{url('journals')}}>
                                        Journals
                                    </a>
                                    <a class="navbar-item" href={{url('books')}}>
                                        Books
                                    </a>
                                    <a class="navbar-item">
                                        Projects
                                    </a>
                                    <hr class="navbar-divider"> 
                                    <a class="navbar-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                        @csrf
                                            
                                    </form>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

            </div>
        </nav>
        <div class="header">
            <div class="container">
                <div class="header-content">
                    <h2>Research Article Repository</h2>
                    <p>Search 1000+ Papers, Books and Reports</p>
                    <div class="counter-wrapper">
                        <div class="counter"><h3>Faculties</h3> <b>25</b></div>
                        <div class="counter"><h3>Journals</h3> <b>124</b></div>
                        <div class="counter"><h3>Books</h3><b>45</b></div>
                        <div class="counter"><h3>Research Papers</h3> <b>498</b></div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
