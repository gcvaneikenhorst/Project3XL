@extends('layouts.app')

<link href="{{ asset('css/matches.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">&nbsp;
	                <div class="pull-left box-header">
	                	CV - naam
	                </div>
	            </div>

                <div class="panel-body">
                     {{$cv->title}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

