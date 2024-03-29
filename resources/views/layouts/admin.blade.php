<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Research Article Repository
    </title>
    <!-- Favicon -->
    <link href="../asset/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('/asset/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
    <link href="{{ asset('/asset/js/plugins/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="{{ asset('/asset/css/argon-dashboard.css?v=1.1.0') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"">
  <!-- <link href=" {{ asset('css/bulma-calendar.min.css') }}" rel="stylesheet"> -->
    <script src="{{asset('/asset/js/plugins/jquery/dist/jquery.min.js')}}"></script>
    <style>
        #scrollable-dropdown-menu .tt-menu {

            max-height: 160px;
            overflow-y: auto;
            width: 300px;
            background-color: white;
        }

    </style>

</head>

<body class="">
    @include('sweetalert::alert')

    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">
                <!-- Brand -->
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                    href="{{ url('/admin') }}">ADMIN</a>
                <!-- Form -->
                <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
                    <div class="form-group mb-0">
                        <div class="input-group input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                            </div>
                            <div id="scrollable-dropdown-menu">
                                <input class="form-control typeahead" type="text" id="search" placeholder="Search"
                                    name="search">
                            </div>
                            <!-- <input class="form-control" placeholder="Search" type="text"> -->
                        </div>
                    </div>
                </form>
                <!-- User -->
                <ul class="navbar-nav align-items-center d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder"
                                        src="https://ui-avatars.com/api/{{ Auth::user()->name }}">
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->name}}
                                    </span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome!</h6>
                            </div>
                            <a href="/admin" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>My profile</span>
                            </a>
                            <a href="/admin/settings" class="dropdown-item">
                                <i class="ni ni-settings-gear-65"></i>
                                <span>Settings</span>
                            </a>
                            <a href="/admin/activity" class="dropdown-item">
                                <i class="ni ni-calendar-grid-58"></i>
                                <span>Activity</span>
                            </a>
                            <a href="/admin/research/create" class="dropdown-item">
                                <i class="ni ni-calendar-grid-58"></i>
                                <span>Create Admin</span>
                            </a>
                            {{--<a href="{{url('/admin/department')}}" class="dropdown-item">
                            <i class="ni ni-support-16"></i>
                            <span>Departments</span>
                            </a>--}}
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" b
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="ni ni-user-run"></i>
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->

        @yield('content')

        <!-- Footer -->
        <footer class="footer">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <!-- <div class="copyright text-center text-xl-left text-muted">
              &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div> -->
                </div>
                <div class="col-xl-6">
                    <!-- <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
            </ul> -->
                </div>
            </div>
        </footer>
    </div>
    </div>
    <!--   Core   -->
    <script src="{{ asset('/asset/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!--   Optional JS   -->
    <script src="{{ asset('/asset/js/plugins/clipboard/dist/clipboard.min.js')}}"></script>
    <!--   Argon JS   -->
    <script src="{{ asset('/asset/js/argon-dashboard.min.js?v=1.1.0')}}"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>

    <!-- <script src="{{ asset('/js/bulma-calendar.min.js') }}"></script> -->
    <script src="{{ asset('js/script.js') }}"></script>

    <script>
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "argon-dashboard-free"
            });
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
    </script>
</body>

</html>
