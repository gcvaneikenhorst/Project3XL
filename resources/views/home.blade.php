@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">&nbsp;
	                <div class="pull-left box-header">
	                	Dashboard
	                </div>
	            </div>

                <div class="panel-body">
                    @if (Auth::user()->userable_type == 'App\Applicant') 
	                    <h3>Hoi {{Auth::user()->userable()->first()->firstname}} {{Auth::user()->userable()->first()->lastname}}, welkom op het dashboard.</h3>
						Vanaf hier kan je alle kanten op. Je kunt zowel je CV maken, als het bewerken er van. 
						<br>
						Instellingen wijzigen? Dit kan je doen in het menu links bovenin.
	                @elseif (Auth::user()->userable_type == 'App\Company') 
	                    <h3>Goedemiddag vertegenwoordiger van {{Auth::user()->userable()->first()->name}}, welkom op het dashboard.</h3>
						Vanaf hier kan je alle kanten op. Je kunt zowel je CV maken, als het bewerken er van. Instellingen wijzigen? Dit kan je doen in het menu links bovenin.
						<br>
						Maar er is meer! 
						<br>
						Je kan namelijk ook zien of je matches hebt. Om je alvast een voorproefje te geven: je hebt op dit moment <b>(aantal)</b> matches.
	                @endif
	                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
