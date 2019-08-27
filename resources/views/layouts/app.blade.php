<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} {{ app()->version() }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"">
        <link href=" bulma-calendar/dist/css/bulma-calendar.min.css" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <style>
        #scrollable-dropdown-menu .tt-dataset {
            /* height: 210px; */
            overflow-y: auto;
            width: 270px;
        }

    </style>
</head>

<body>


    <div>

        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="container">
                <div class="navbar-brand">
                    <a href="/">
                        <img src="{{asset('assets/images/kjc-logo-dark.png')}}">
                    </a>
                </div>


                {{--<div id="navbarBasicExample" class="navbar-menu">
                        <div class="navbar-end">
                            <div class="navbar-item">
                                <div class="buttons">
                                @if (Auth::guest())       
                                    <a class="button orange" href="{{ route('register') }}">
                <strong>Sign up</strong>
                </a>
                <a class="button is-light" href="{{ route('login') }}">
                    Log in
                </a>
                @else
                <a class="navbar-link" href="#">{{ Auth::user()->name }}
                    <figure class="image is-32x32" style="margin-left:.8rem;">
                        <img class="is-rounded" src="https://ui-avatars.com/api/{{ Auth::user()->name }}">
                    </figure>
                </a>
                <div class="navbar-dropdown">
                    <!-- <a class="navbar-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            Logout
                                        </a> -->
                    <!-- <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            
                                        </form> -->


                </div>
                @endif
            </div>
    </div>
    </div>--}}

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
                        Publications
                    </a>
                    <a class="navbar-item" href={{url('books')}}>
                        Books
                    </a>
                    <a class="navbar-item" href={{url('projects')}}>
                        Research Project
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
    @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="bulma-calendar/dist/js/bulma-calendar.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>

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

                    return data.searchable
                        .name //Input value to be set when you select a suggestion.

                },
                templates: {

                    header: '<div height = 20px>',
                    // empty: [
                    //     '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    // ],
                    suggestion: function (data) {

                        return '<div class="box" style="margin:0px; height:70px; padding-top:10px"><a href="/profile/' +
                            data.searchable.slug +
                            '"><article class="media">  <div class="media-content"> <div class="content"> <p> <strong>' +
                            data.searchable.name + '</strong><br><small>' + data.searchable
                            .department_details.name + '</p> </div> </article></div>'

                    },
                    footer: '</div>'
                }
            }, {
                name: 'Repository',
                source: bloodhoundRepo,
                display: function (data) {

                    return data.searchable
                        .title //Input value to be set when you select a suggestion.

                },
                templates: {

                    header: '<div height = 20px>',
                    // empty: [
                    //     '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    // ],
                    suggestion: function (data) {

                        return '<div class="box" style="margin:0px; height:70px; padding-top:10px"><a href="/repository/' +
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

    </script>
    @include('sweetalert::alert')

    @yield('scripts');
</body>

</html>
