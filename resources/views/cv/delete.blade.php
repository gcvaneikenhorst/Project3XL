@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Delete CV
                    </div>

                    <div class="panel-body">
                        <form id="cv-delete" class="form-horizontal" role="form" method="POST" action="{{ url('/cv/delete/'.$cv->id) }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="id" value="{{ $cv->id }}">

                            <div style="padding-left: 5px">
                                <h2>'{{ $cv->title }}' verwijderen</h2>
                                <p>Weet u zeker dat u "{{ $cv->title }}" wilt verwijderen?</p>
                                <hr>
                            </div>

                            <ul class="list-inline pull-right">
                                <li>
                                    <button class="btn btn-primary btn-info-full" onclick="$('#cv-delete').submit()">Verwijderen</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

