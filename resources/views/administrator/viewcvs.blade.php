@extends('layouts.app')

@section('content')
    <link href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">&nbsp
                        CV's voor {{$email}}
                    </div>
                    <div class="pane-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Titel</th>
                                    <th>Datum</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($cvs as $cv)
                                <tr onclick="openCv(event)" data="{{json_encode($cv)}}">
                                    <td>{{$cv->title}}</td>
                                    <td>{{$cv->date}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="cvmodal">
        <table class="table">
            <tr>
                <td>Datum<td/>
                <td><input type="datetime-local" class="form-control" name='date'><td/>
            </tr>
            <tr>
                <td>Titel<td/>
                <td><input type="text" class="form-control" name='title'><td/>
            </tr>
            <tr>
                <td>Text<td/>
                <td><textarea type="text" class="form-control" name=text></textarea><td/>
            </tr>
            <tr>
                <td>Video<td/>
                <td><input type="text" class="form-control" name=video><td/>
            </tr>
            <tr>
                <td>Motivatie<td/>
                <td><input type="text" class="form-control" name=motivation><td/>
            </tr>
            <tr>
                <td>Categorie<td/>
                <td>
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                <td/>
            </tr>
        </table>
    </div>
@endsection


@section('script')
    <script
            src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
            crossorigin="anonymous"></script>
    <script>
        function openCv(event) {
            let target = event.target.parentNode;
            let data = JSON.parse(target.getAttribute('data'));
            data.date = data.date.replace(" ", "T");
            console.log(data)
            $("#cvmodal").dialog({
                width: 500,
                title: data.title,
                open: function () {
                    for (let key in data) {
                        let value = data[key]
                        $(this).find(`[name=${key}]`).val(value)
                    }
                },
                buttons: {
                    "Save": function() {
                        console.log(this)
                        let output = {}
                        $(this).find('input').each((i, node) => {
                            if (node.value != data[node.getAttribute('name')])
                                output[node.getAttribute("name")] = node.value
                        })
                        console.log(output);
                    }
                }
            })
        }
    </script>
@endsection