@extends('layouts.app')

<link href="{{ asset('css/auth.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-danger">
                <div class="panel-heading">&nbsp
                    <div class="pull-left box-header">
                        Dangerzone
                    </div>
                </div>
                <div class="panel-body">
                    <span>Weet u zeker dat u uw account wilt veranderen?</span>
                	<div class="row">    
		                <div class="col-lg-3 col-md-3 col-sm-3"> 
		                    <form method="post">
		                        {{ csrf_field() }}
		                        <input class="btn btn-primary" type="submit" value="Nee, haal mij hier weg!" />
		                        <input type="hidden" name="sure" value="no">
		                        <input type="hidden" name="action" value="remove">
		                    </form>
		                </div>
		                <div class="col-lg-3 col-md-3 col-sm-3">
		                    <form method="post">
		                        {{ csrf_field() }}
		                        <input class="btn btn-danger" type="submit" value="Ja, ik weet het zeker"/>
		                        <input type="hidden" name="sure" value="yes">
		                        <input type="hidden" name="action" value="remove">
		                    </form>
		                </div>
                	</div>
					
                    <br/>
                    <br/>
                    <span>Weet u zeker dat u uw account wilt deactiveren?</span>
                    <div class="row">
	                    <div class="col-lg-3 col-md-3 col-sm-3">
		                    <form method="post">
		                        {{ csrf_field() }}
		                        <input class="btn btn-danger" type="submit" value="Ja, ik weet het zeker"/>
		                        <input type="hidden" name="sure" value="yes">
		                        <input type="hidden" name="action" value="deactivate">
		                    </form>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
