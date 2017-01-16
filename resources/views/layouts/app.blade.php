<!DOCTYPE html>
<html lang="en">
	<head>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', '3XL') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-multiselect.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('/plugins/Summernote/summernote.css')}}" rel="stylesheet">

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
	        
	        <section class="wrapper">
			  	<section id="menubutton" class="material-design-hamburger--off">
			    	<button id="hamburger_button" class="material-design-hamburger__icon">
						<span class="material-design-hamburger__layer"></span>
					</button>
				</section>
			
				<section class="menu menu--off">
					@if (!Auth::guest())
						<div class="login-user">
	                		<a>
		                		@if (Auth::user()->userable_type == 'App\Applicant')
	                                {{ Auth::user()->userable()->first()->firstname }}
	                            @elseif (Auth::user()->userable_type == 'App\Company')
	                                {{ Auth::user()->userable()->first()->name }}
	                            @endif
	                		</a>
	                	</div>
					
	                    @if (Auth::user()->userable_type == 'App\Applicant')
	                        <div id="first" onclick="location.href='{{ url("/cv") }}';">
	                            <a>Mijn CV's</a>
	                        </div>
	                    @endif
	
	                    @if (Auth::user()->userable_type == 'App\Company')
	                        <div id="first" onclick="location.href='{{ url("/vacancy") }}';">
	                            <a>Mijn vacatures</a>
	                        </div>
	                    @endif
	
	                    <div onclick="location.href='{{ url("/matches") }}';">
	                        <a>Matches</a>
	                    </div>
	
	                @endif
	                
	                @if (Auth::guest())
	                	<div onclick="location.href='{{ url("/") }}';">
		                    <a>Home</a>
		                </div>
	                    <div onclick="location.href='{{ url("/login") }}';">
		                    <a>Inloggen</a>
		                </div>
	                    <div onclick="location.href='{{ url("/register") }}';">
		                    <a>Registreren</a>
		                </div>
	                @else
	                    <div onclick="location.href='{{ url("/home") }}';">
							<a href="{{ url('/home') }}">
	                            Dashboard
	                        </a>
						</div>
						<div onclick="location.href='{{ url("/account") }}';">
							<a>
	                            Instellingen
	                        </a>
						</div>
						<div class="logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <a>
                                Uitloggen
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
	                @endif
				</section>
			</section>

		    @yield('content')
		</div>


        <!-- Scripts -->
        <script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
        {{--<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.13/datatables.min.js"></script>--}}
        <script type="text/javascript" src="{{ asset('/js/moment.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('/plugins/Summernote/summernote.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/bootstrap-multiselect.js') }}"></script>

        <script src="/js/general.js"></script>

        <script>
            $(document).ready(function() {
                $('input[type="datetime"]').datetimepicker();
                $('textarea').summernote();
                $('select[multiple]').multiselect();
            });
        </script>
        @yield('script')
    </body>
</html>

