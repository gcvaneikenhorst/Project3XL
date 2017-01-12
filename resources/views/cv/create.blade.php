@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Create CV
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/cv/create') }}">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

