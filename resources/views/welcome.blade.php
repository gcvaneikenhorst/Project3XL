@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
	        <div class="panel panel-default">
				<div class="panel-heading">&nbsp;
					<div class="pull-left box-header">
						Welkom
					</div>
				</div>
				<div class="panel-body">
					<p>
						Momenteel zijn er <b>{{ $companyCount }}</b> Bedrijven die opzoek zijn naar jou! Met momenteel <b>{{ $vacancyCount }}</b> vacatures en <b>{{ $applicantCount }}</b> mede-sollicitanten kunt u de jacht starten!
					</p>
				</div>
			</div>
        </div>
	</div>

	<div class="row">

		<div class="cont">
			<div class="slider"></div>
				<ul class="nav">
		</div>
				<div data-target='right' class="side-nav side-nav--right"></div>
			<div data-target='left' class="side-nav side-nav--left"></div>
		</div>

        @if (Auth::guest())
        
        <div class="col-md-5 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">&nbsp;
					<div class="pull-left box-header">
						Aanmelden
					</div>
				</div>

				<div class="panel-body">
					<p>
						Ben je nog geen sollicitant bij ons? Of zoek je het juiste platform om banen te vullen?
						<br><br>
						<a href="/register" style="float: right"><i class="fa fa-chevron-right"></i> Registreer je nu</a>
					</p>
				</div>
			</div>
        </div>
        
        <div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">&nbsp;
					<div class="pull-left box-header">
						Inloggen
					</div>
				</div>

				<div class="panel-body">
					<p>
						Ben je al sollicitant of bedrijf bij ons?
						<br><br>
						<a href="/login" style="float: right"><i class="fa fa-chevron-right"></i> Log in</a>
					</p>
				</div>
			</div>
        </div>

        @endif

	</div>
</div>

@endsection
