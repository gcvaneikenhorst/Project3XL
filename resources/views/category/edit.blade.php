@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        CV's
                        <a href="{{ url('/administrator/category/delete', ['id' => $category->id]) }}" class="pull-right"><i class="fa fa-trash" style="color: grey"></i></a>
                    </div>

                    <div class="panel-body">
                        <form id="cv-create" class="form-horizontal" role="form" method="POST" action="{{ url('/administrator/category/edit', ['id' => $category->id]) }}" novalidate>
                            {{ csrf_field() }}

                            <input type="hidden" value="{{ $category->id }}">

                            <div class="col-md-offset-2" style="padding-left: 5px">
                                <h2>Categorie aanmaken</h2>
                                <p>Vul hier uw informatie in.</p>
                                <hr>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-2 control-label">Name</label>

                                <div class="col-md-10">
                                    <div class="input-group">
                                        <input id="name" type="text" class="form-control" name="name"
                                               value="{{ $category->name }}" required>

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
                                    <textarea name="description">{{ $category->description }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-offset-2" style="padding-left: 5px">
                                <hr>
                            </div>

                            <ul class="list-inline pull-right">
                                <li>
                                    <button class="btn btn-primary btn-info-full" onclick="$('#cv-create').submit()">Opslaan</button>
                                </li>
                            </ul>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection