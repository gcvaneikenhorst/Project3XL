@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
	        <div class="card">
		        <div class="title" style="font-size: 5em; margin-left: -.3em; background-color: inherit; color: inherit;">
			        Welkom.
		        </div>
		        <div class="content" style="font-size: 1.5em;">
			        Momenteel hebben wij <b>(aantal)</b> matches voor je klaarstaan.
		        </div>
	        </div>
        </div>
        
        
        @if (Auth::guest())
        
        <div class="col-md-5 col-md-offset-1">
	        <div class="card">
		        <div class="title">
			        Aanmelden
		        </div>
		        <div class="content">
			        Ben je nog geen sollicitant bij ons? Of zoek je het juiste platform om banen te vullen?
			        <br><br>
			        <a href="/register"><i class="fa fa-chevron-right"></i> Registreer je nu.</a>
		        </div>
	        </div>
        </div>
        
        <div class="col-md-5">
	        <div class="card">
		        <div class="title">
			        Inloggen
		        </div>
		        <div class="content">
			        Ben je al sollicitant of bedrijf bij ons?
			        <br><br><br>
			        <a href="/login"><i class="fa fa-chevron-right"></i> Log hier in.</a>
		        </div>
	        </div>
        </div>
        
        @endif
    </div>
</div>
@endsection
