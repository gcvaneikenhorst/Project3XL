@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">&nbsp
                    Remove account
                </div>
                <div class="panel-body">
                    Are you sure you wish to remove your account?
                    <form method="post">
                        {{ csrf_field() }}
                        <input class="btn btn-primary" type="submit" value="No, take me out of here!" />
                        <input type="hidden" name="sure" value="no">
                    </form>
                    <form method="post">
                        {{ csrf_field() }}
                        <input class="btn btn-danger" type="submit" value="Yes, I'm sure"/>
                        <input type="hidden" name="sure" value="yes">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
