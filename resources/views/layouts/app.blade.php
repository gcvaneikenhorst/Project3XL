<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', '3XL') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}"/>

        <link rel="stylesheet" type="text/css" href="/css/general.css">


        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

        <script>
            window.Laravel = <?php echo json_encode([
                    'csrfToken' => csrf_token(),
            ]); ?>
        </script>
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', '3XL') }}
                        </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            @if (!Auth::guest())

                                @if (Auth::user()->userable_type == 'App\Applicant')
                                    <li>
                                        <a href="{{ url('/cv') }}">
                                            Mijn CV's
                                        </a>
                                    </li>
                                @endif

                                @if (Auth::user()->userable_type == 'App\Company')
                                    <li>
                                        <a href="{{ url('/vacancy') }}">
                                            Mijn vacatures
                                        </a>
                                    </li>
                                @endif

                                <li>
                                    <a href="{{ url('/matches') }}">
                                        Matches
                                    </a>
                                </li>

                            @endif
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        @if (Auth::user()->userable_type == 'App\Applicant')
                                            {{ Auth::user()->userable()->first()->firstname }}
                                        @elseif (Auth::user()->userable_type == 'App\Company')
                                            {{ Auth::user()->userable()->first()->name }}
                                        @endif

                                        <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ url('/home') }}">
                                                Dashboard
                                            </a>

                                            <a href="{{ url('/account') }}">
                                                Settings
                                            </a>

                                            <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>

            @yield('content')
        </div>

        <!-- Scripts -->
        <script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.13/datatables.min.js"></script>
        <script type="text/javascript" src="{{ asset('/js/moment.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/bootstrap-datetimepicker.js') }}"></script>

        <script src="/js/general.js"></script>

        <script>
            $(document).ready(function() {
                $('input[type="datetime"]').datetimepicker();
            });
        </script>
    </body>
</html>

