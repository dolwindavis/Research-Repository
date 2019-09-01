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
     <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> 
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
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

        .links>a {
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

        #scrollable-dropdown-menu .tt-menu {

            max-height: 160px;
            overflow-y: auto;
            width: 270px;
        }

    </style>
</head>

<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="container">          
            <div  class="navbar-brand">
              <a href="/">
                    <img src="{{asset('assets/images/kjc-logo-dark.png')}}" height="450px" width="350px">
                </a>       
            </div>
            <div class="navbar-item">
              <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
                    data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-end">
                    <div class="navbar-item">
                        <div id="scrollable-dropdown-menu">
                            <input class="input is-focused" type="text" id="search" placeholder="Search" name="search">
                        </div>
                    </div>
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
                            <a class="navbar-item"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
                    <div class="counter">
                        <h3>Faculties</h3> <b>{{$repositorycount[3]}}</b>
                    </div>
                    <div class="counter">
                        <h3>Journals</h3> <b>{{$repositorycount[1]}}</b>
                    </div>
                    <div class="counter">
                        <h3>Books</h3><b>{{$repositorycount[0]}}</b>
                    </div>
                    <div class="counter">
                        <h3>Research Papers</h3> <b>{{$repositorycount[2]}}</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
<script>
    $(document).ready(function () {
        var bloodhoundUsers = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url: '/search/users?q=%QUERY%',
                wildcard: '%QUERY%'
            },
        });
        var bloodhoundRepo = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            remote: {
                url: '/search/repository?q=%QUERY%',
                wildcard: '%QUERY%'
            },
        });
        $('#scrollable-dropdown-menu #search').typeahead({
            hint: true,
            highlight: true,
            minLength: 1,
        }, {
            name: 'users',
            source: bloodhoundUsers,
            display: function (data) {

                return data.searchable.name //Input value to be set when you select a suggestion.

            },
            templates: {

                header: '<div height = 20px><b>Users</b></div>',
                // empty: [
                //     '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                // ],
                suggestion: function (data) {

                    return '<div class="box" style="margin:0px; height:70px; padding-top:10px; "><a href="/profile/' +
                        data.searchable.slug +
                        '"><article class="media">  <div class="media-content"> <div class="content"> <p> <strong>' +
                        data.searchable.name + '</strong><br><small>' + data.searchable
                        .department_details.name + '</p> </div> </article></div>'

                },
                footer: '</div>'
            }
        }, {
            name: 'repository',
            source: bloodhoundRepo,
            display: function (data) {

                return data.searchable.title //Input value to be set when you select a suggestion.

            },
            templates: {

                header: '<div height = 20px><b>Repository</b></div>',
                // empty: [
                //     '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                // ],
                suggestion: function (data) {

                    return '<div class="box" style="margin:0px; height:70px; padding-top:10px;"><a href="/repository/' +
                        data.url + '/' + data.searchable.slug +
                        '"><article class="media">  <div class="media-content"> <div class="content"> <p> <strong>' +
                        data.searchable.title + '</strong><br><small>' + data.url +
                        '</small> @<small>' + data.searchable.user.name +
                        '</small></p></div> </article></div>'

                },
                footer: '</div>'
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function () {

        // Get all "navbar-burger" elements
        var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Check if there are any nav burgers
        if ($navbarBurgers.length > 0) {

            // Add a click event on each of them
            $navbarBurgers.forEach(function ($el) {
                $el.addEventListener('click', function () {

                    // Get the target from the "data-target" attribute
                    var target = $el.dataset.target;
                    var $target = document.getElementById(target);

                    // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                    $el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');

                });
            });
        }

    });

</script>

</html>
