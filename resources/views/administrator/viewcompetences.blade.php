@extends('layouts.app')

@section('content')
    <link href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <style>
        #competence-table tbody tr {
            cursor: pointer;
        }
    </style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Competenties
                    <a onclick="openCompetence(null)" class="pull-right"><i class="fa fa-plus" style="color: grey"></i></a>
                </div>
                <div class="panel-body">
                    <table class="table" id="competence-table">
                        <thead>
                            <tr>
                                <th>Competentie naam</th>
                                <th>Beschrijving</th>
                            </tr>
                        </thead>
                        @foreach ($competences as $competence)
                            <tr onclick="openCompetence(this)" data="{{$competence}}">
                                <td>{{$competence->name}}</td>
                                <td>{{$competence->description}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="competencemodal">
    <table class="table">
        <tr>
            <td>Naam</td>
            <td><input class="form-control" name="name"></td>
        </tr>
        <tr>
            <td>Beschrijving</td>
            <td><input class="form-control" name="description"/></td>
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
        function openCompetence(target) {
            let data = target != null ? JSON.parse(target.getAttribute('data')) : {"name": '', 'description': ''};
            let buttons = {
                "Save": function () {
                    let output = {}
                    $(this).find('input').each((i, node) => {
                        if (node.value != data[node.getAttribute('name')])
                            output[node.getAttribute("name")] = node.value
                    })

                    if (Object.keys(output).length == 0)
                        return;

                    let url = data['id'] != null ? `/api/administrator/updatecompetence/${data['id']}` : '/api/administrator/createcompetence'
                    $.ajax({
                        type: 'POST',
                        url: url,
                        contentType: "application/json",
                        dataType: 'json',
                        data: JSON.stringify(output),
                    });
                    Object.assign(data, output);
                    if (target != null)
                        target.setAttribute("data", JSON.stringify(data));
                }
            }
            if (target != null) {
                buttons["Delete"] = function () {
                    if (!confirm("Weet u zeker dat u deze competentie wilt verwijderen?"))
                        return;

                    $.ajax({
                        type: 'DELETE',
                        url: `/api/administrator/deletecompetence/${data['id']}`
                    })
                }
            }

            $("#competencemodal").dialog({
                width: 500,
                title: data.name || "Nieuwe Competentie",
                open: function () {
                    for (let key in data) {
                        let value = data[key]
                        $(this).find(`[name=${key}]`).val(value)
                    }
                },
                buttons: buttons

            })
        }
    </script>
@endsection