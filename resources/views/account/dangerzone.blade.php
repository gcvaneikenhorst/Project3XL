@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-danger">
                <div class="panel-heading">&nbsp
                    Remove account
                </div>
                <div class="panel-body">
                    Weet u zeker dat u uw account wilt veranderen?
                    <form method="post">
                        {{ csrf_field() }}
                        <input class="btn btn-primary" style="float:left" type="submit" value="Nee, haal mij hier weg!" />
                        <input type="hidden" name="sure" value="no">
                        <input type="hidden" name="action" value="remove">
                    </form>
                    <form method="post">
                        {{ csrf_field() }}
                        <input class="btn btn-danger" style="float:left" type="submit" value="Ja ik weet het zeker"/>
                        <input type="hidden" name="sure" value="yes">
                        <input type="hidden" name="action" value="remove">
                    </form>

                    <br/>
                    <br/>
                    Weet u zeker dat u uw account wilt deactiveren?
                    <form method="post">
                        {{ csrf_field() }}
                        <input class="btn btn-danger" style="float:left" type="submit" value="Ja ik weet het zeker"/>
                        <input type="hidden" name="sure" value="yes">
                        <input type="hidden" name="action" value="deactivate">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
