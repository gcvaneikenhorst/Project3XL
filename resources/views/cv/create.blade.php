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

                            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Date</label>

                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="date" type="datetime" class="form-control" name="date"
                                               value="" required>

                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>

                                    @if ($errors->has('date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('date') }}</strong>
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

