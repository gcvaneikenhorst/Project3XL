@extends('layouts.app')

<link href="{{ asset('css/matches.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">&nbsp;
	                <div class="pull-left box-header">
	                	Matches
	                </div>
	                <div class="pull-right">
		                <div class="paginator">
		                	<div id="btn-available-matches" class="page-toggle toggle-active" onclick="notPayed(this)">Beschikbare matches</div>
		                	/
		                	<div id="btn-payed-matches" class="page-toggle" onclick="payed(this)">Betaalde matches</div>
		                </div>
		            </div>
	            </div>

                <div class="panel-body">
                     <table id="matches-table" class="table table-hover table-responsive"></table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
	<!-- Loading DataTables -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.13/datatables.min.js"></script>
    
    <! -- Token -->
    <script>
	    var token = "{{ $token }}";
    </script>
    
    <! -- Setup table -->
    <script src="{{ asset('js/matches.js') }}"></script>
@endsection
