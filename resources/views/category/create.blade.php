@extends('layouts.app')

@section('content')
    @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        CV's
                        <a href="{{ url('/cv/create') }}" class="pull-right"><i class="fa fa-plus" style="color: grey"></i></a>
                    </div>

                    <div class="panel-body">
                        <form id="cv-create" class="form-horizontal" role="form" method="POST" action="{{ url('/cv/create') }}" novalidate>
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-2 control-label">Name</label>

                                <div class="col-md-10">
                                    <div class="input-group">
                                        <input id="name" type="text" class="form-control" name="name" required>

                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-text-size"></span>
                                        </span>
                                    </div>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description" class="col-md-2 control-label">Description</label>

                                <div class="col-md-10">
                                    <textarea name="description"></textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
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

    <script>
        $(document).ready(function() {
            $('#category-table').DataTable();
        });
    </script>
@endsection

@section('script')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.13/datatables.min.js"></script>
@endsection


@endsection
