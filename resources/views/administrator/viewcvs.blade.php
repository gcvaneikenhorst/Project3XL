@extends('layouts.app')

@section('content')
    <style>
        #cv-table tbody tr {
            cursor: pointer;
        }
    </style>
    <link href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">&nbsp
                        CV's voor {{$email}}
                    </div>
                    <div class="pane-body">
                        <table class="table" id="cv-table">
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
        HTMLElement.prototype.setValue = function(val) {
            if (!this.nextSibling || !this.nextSibling.classList) {
                this.value = val;
                return;
            }

            if (!this.nextSibling.classList.contains('note-editor')) {
                this.value = val;
                return;
            }

            $(this).summernote('code', val);
        }

        let api_token = "{{$api_token}}";
        function openCv(event) {
            let target = event.target.parentNode;
            let data = JSON.parse(target.getAttribute('data'));
            data.date = data.date.replace(" ", "T");
            $("#cvmodal").dialog({
                width: 500,
                title: data.title,
                open: function () {
                    for (let key in data) {
                        let element = $(this).find(`[name=${key}]`)[0];
                        if (element)
                            element.setValue(data[key]);
                    }
                },
                buttons: {
                    "Delete": function() {
                        if (!confirm("Weet u zeker dat u deze CV wilt verwijderen?"))
                            return;

                        $.ajax({
                            type:'DELETE',
                            url: `/api/auth/administrator/deletecv/${data['id']}?api_token=${api_token}`,
                            success: () => location.reload()
                        })
                    },
                    "Save": function() {
                        let output = {}
                        $(this).find('[name]').each((i, node) => {
                            if ($(node).val() != data[node.getAttribute('name')])
                                output[node.getAttribute("name")] = $(node).val()
                        })

                        if (Object.keys(output).length == 0)
                            return;

                        $.ajax({
                            type: 'POST',
                            url: `/api/auth/administrator/updatecv/${data['id']}?api_token=${api_token}`,
                            contentType: "application/json",
                            dataType: 'json',
                            data: JSON.stringify(output),
                            success: () => location.reload()
                        });
                    }
                }
            })
        }
    </script>
@endsection
