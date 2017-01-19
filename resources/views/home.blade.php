@extends('layouts.app')

@section('content')

<!-- common styles -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/dialog.css') }}" />
<!-- individual effect -->
<link rel="stylesheet" type="text/css" href="{{ asset('/css/dialog-wilma.css') }}" />

<div class="container">
	@if (Auth::user()->userable_type == 'App\Applicant')
		@include('home-applicant')
	@elseif (Auth::user()->userable_type == 'App\Company')
		@include('home-company')
	@elseif (Auth::user()->userable_type == 'App\Admin')
		@include('home-admin')
	@endif
</div>

<div id="intro_dialog1" class="dialog">
	<div class="dialog__overlay"></div>
	<div class="dialog__content">
		<div class="morph-shape">
			<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 560 280" preserveAspectRatio="none">
				<rect x="3" y="3" fill="none" width="556" height="276"/>
			</svg>
		</div>
		<div class="dialog-inner">
			<h2>Hallo <strong>{{ Auth::user()->userable()->first()->firstname }}</strong>, even een introductie...</h2>
			<button class="action btn pull-left" toggle>Nee bedankt</button>
			<button class="action btn btn-primary pull-right" toggle="2">Volgende</button>
		</div>
	</div>
</div>

<div id="intro_dialog2" class="dialog">
	<div class="dialog__overlay"></div>
	<div class="dialog__content">
		<div class="morph-shape">
			<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 560 280" preserveAspectRatio="none">
				<rect x="3" y="3" fill="none" width="556" height="276"/>
			</svg>
		</div>
		<div class="dialog-inner">
			@if(Auth::user()->userable_type == 'App\Applicant')

				<h2>U bent een <strong>Sollicitant</strong>!</h2>
				<p>

				</p>

			@elseif(Auth::user()->userable_type == 'App\Company')

				<h2>U bent een <strong>Bedrijf</strong>!</h2>

			@elseif(Auth::user()->userable_type == 'App\Admin')

				<h2>U bent een <strong>Administrator</strong>!<br> <small>Als administrator kunt u gebruikers, categoriën en compententies beheren.</small></h2>

			@endif
			<button class="action btn pull-left" toggle="1">Terug</button>
			<button class="action btn btn-primary pull-right" toggle="3">Volgende</button>
		</div>
	</div>
</div>

<div id="intro_dialog3" class="dialog">
	<div class="dialog__overlay"></div>
	<div class="dialog__content">
		<div class="morph-shape">
			<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 560 280" preserveAspectRatio="none">
				<rect x="3" y="3" fill="none" width="556" height="276"/>
			</svg>
		</div>
		<div class="dialog-inner">
			<h2>Door links bovenin op de streepjes te klikken, kunt u het menu openen<br><small>Hier kunt u verdere mogelijkheden bekijken.</small></h2>
			<button class="action btn pull-left" toggle="2">Terug</button>
			<button class="action btn btn-primary pull-right" toggle="4">Begrijp het</button>
		</div>
	</div>
</div>

<div id="intro_dialog4" class="dialog">
	<div class="dialog__overlay"></div>
	<div class="dialog__content">
		<div class="morph-shape">
			<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 560 280" preserveAspectRatio="none">
				<rect x="3" y="3" fill="none" width="556" height="276"/>
			</svg>
		</div>
		<div class="dialog-inner">
			<h2>U bent nu klaar om gebruik te maken van het systeem!</h2>
			<button class="action btn btn-primary" toggle>Aan de slag</button>
		</div>
	</div>
</div>

@endsection

@section('script')

	@include('partial/dialog', [
		'start_selector' => '#help_btn',
		'items' => [
			'intro_dialog1',
			'intro_dialog2',
			'intro_dialog3',
			'intro_dialog4',
		]
	])

@endsection
