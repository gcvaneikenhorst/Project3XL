@extends('layouts.app')

@section('content')

<div class="container">
	@if (Auth::user()->userable_type == 'App\Applicant')
		@include('home-applicant')
	@elseif (Auth::user()->userable_type == 'App\Company')
		@include('home-company')
	@elseif (Auth::user()->userable_type == 'App\Admin')
		@include('home-admin')
	@endif
</div>

@endsection
