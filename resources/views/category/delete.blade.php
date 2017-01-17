@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        CV's
                    </div>

                    <div class="panel-body">
                        <form id="cv-create" class="form-horizontal" role="form" method="POST" action="{{ url('/administrator/category/delete', ['id' => $category->id]) }}" novalidate>
                            {{ csrf_field() }}

                            <div style="padding-left: 5px">
                                <h2>'{{ $category->name }}' verwijderen</h2>
                                <p>Weet u zeker dat u '{{ $category->name }}' wilt verwijderen?</p>
                                <hr>
                            </div>

                            <ul class="list-inline pull-right">
                                <li>
                                    <button class="btn btn-primary btn-info-full" onclick="$('#cv-create').submit()">Verwijderen</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection