@extends('layouts.app')

<link href="{{ asset('css/matches.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">&nbsp;
	                <div class="pull-left box-header">
	                	CV - {{$cv->title}}
	                </div>
	            </div>

                <div class="panel-body">
	                @if($cv->applicant != null)
		                <legend>Personalia</legend>
		                <table class="table">
			                <tr>
				                <th>Aanhef</th>
				                <td>{{$cv->applicant->salutation}}</td>
			                </tr>
			                <tr>
				                <th>Voornaam</th>
				                <td>{{$cv->applicant->firstname}}</td>
			                </tr>
			                <tr>
				                <th>Tussenvoegsel</th>
				                <td>{{$cv->applicant->insertion}}</td>
			                </tr>
			                <tr>
				                <th>Achternaam</th>
				                <td>{{$cv->applicant->lastname}}</td>
			                </tr>
			                <tr>
				                <th>Adres</th>
				                <td>{{$cv->applicant->address}}</td>
			                </tr>
			                <tr>
				                <th>Postcode</th>
				                <td>{{$cv->applicant->zipcode}}</td>
			                </tr>
			                <tr>
				                <th>Woonplaats</th>
				                <td>{{$cv->applicant->location}}</td>
			                </tr>
			                <tr>
				                <th>Telefoon</th>
				                <td>{{$cv->applicant->phone}}</td>
			                </tr>
			                <tr>
				                <th>E-mailadres</th>
				                <td><a href="mailto:{{$cv->applicant->email}}">{{$cv->applicant->email}}</a></td>
			                </tr>
		                </table>
	                @endif
	                
	                <legend>CV - {{$cv->title}}</legend>
	                <p>{{$cv->text}}</p>
	                <h4>Motivatie</h4>
	                <p>{{$cv->motivation}}</p>

                     @if($cv->video && $cv->applicant != null)
                     	<legend>Video</legend>
                     	<iframe width="560" height="315" src="https://www.youtube.com/embed/{{$cv->video}}" frameborder="0" allowfullscreen></iframe>
                     @endif
                     
                    <p class="text-muted"><i>Ingestuurd op: {{$cv->date}}</i></p>
                    
                    @if($cv->applicant == null)
                    	<button id='btn-checkout' class='btn btn-primary' onclick='checkoutDirect({{$cv->link}});'>CV kopen</button>
					@endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <! -- Token -->
    <script>
	    var token = "{{ $token }}";
    </script>
    
    <! -- Setup table -->
    <script src="{{ asset('js/matches.js') }}"></script>
@endsection

