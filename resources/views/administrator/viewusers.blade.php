@extends('layouts.app')

@section('content')
    <link href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">&nbsp
                        Users
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Email</th>
                                <th>Type</th>
                            </tr>
                            </thead>
                            @foreach($users as $user)
                                <tbody>
                                    <tr onclick="openUser(event)" data="{{json_encode($user->userable()->get())}}">
                                        <td>{{$user->email}}</td>
                                        <td>{{substr($user->userable_type,4)}}</td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="companymodel">
        Naam: <input name="name">
    </div>
@endsection

@section('script')
<script
        src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
        crossorigin="anonymous"></script>
<script>
    function openUser(event) {
        let target = event.target.parentNode;
        let data = JSON.parse(target.getAttribute('data'))[0];
        console.log(data);
        $("#companymodel").dialog({
            open: function () {
                for (let key in data) {
                    let value = data[key]
                    $(this).find(`[name=${key}]`).val(value)
                }
            }
        })
    }
</script>
@endsection
