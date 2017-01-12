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
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/cv/delete/'.$cv->id) }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="id" value="{{ $cv->id }}">

                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                <label for="city" class="col-md-6 control-label">Weet u zeker dat u {{ $cv->title }} wilt verwijderen?</label>

                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Verwijderen</button>

                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

