@extends('layouts.app')

@section('content')
    <style>
        #user-table tbody tr {
            cursor: pointer;
        }
    </style>
    <link href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">&nbsp;
                        <div class="pull-left box-header">
	                        Gebruikers
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table" id="user-table">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr onclick="openUser(event)"
                                    model="{{$user->userable_type}}"
                                    data="{{json_encode($user->userable()->first())}}"
                                    user-id="{{$user->id}}">
                                    <td>{{$user->email}}</td>
                                    <td>{{substr($user->userable_type,4)}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="display:flex; justify-content:center;">
                            {{$users->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="companymodel">
        <table class="table">
            <tr>
                <td>Naam</td>
                <td><input class="form-control" name="name"></td>
            </tr>
            <tr>
                <td>Adres</td>
                <td><input class="form-control" name="address"/></td>
            </tr>
            <tr>
                <td>Postcode</td>
                <td><input class="form-control" name="zipcode"></td>
            </tr>
            <tr>
                <td>Plaats</td>
                <td><input class="form-control" name="city"></td>
            </tr>
            <tr>
                <td>Website</td>
                <td><input class="form-control" name="website"></td>
            </tr>
            <tr>
                <td>Telefoon</td>
                <td><input class="form-control" name="phone"></td>
            </tr>
            <tr>
                <td>Contactpersoon</td>
                <td><input class="form-control" name="contactperson"></td>
            </tr>
            <tr>
                <td>Contactpersoon E-Mail</td>
                <td><input class="form-control" name="email"></td>
            </tr>
        </table>
        <button class="btn btn-link" name="userid" onclick="openPage('vacancy', this)">View Vacancies</button>
    </div>

    <div class="modal" id="applicantmodel">
        <table class="table">
            <tr>
                <td>Aanhef</td>
                <td>
                    <select class="form-control" name="salutation">
                        <option>Dhr.</option>
                        <option>Mv.</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Voornaam</td>
                <td><input class="form-control" name="firstname"></td>
            </tr>
            <tr>
                <td>Achternaam</td>
                <td><input class="form-control" name="lastname"></td>
            </tr>
            <tr>
                <td>Tussenvoegsel</td>
                <td><input class="form-control" name="insertion"></td>
            </tr>
            <tr>
                <td>Adres</td>
                <td><input class="form-control" name="address"/></td>
            </tr>
            <tr>
                <td>Postcode</td>
                <td><input class="form-control" name="zipcode"></td>
            </tr>
            <tr>
                <td>Plaats</td>
                <td><input class="form-control" name="location"></td>
            </tr>
            <tr>
                <td>Telefoon</td>
                <td><input class="form-control" name="phone"></td>
            </tr>
            <tr>
                <td>E-Mail</td>
                <td><input class="form-control" name="email"></td>
            </tr>
        </table>
        <button class="btn btn-link" name="userid" onclick="openPage('cv',this)">View CV's</button>
    </div>

@endsection

@section('script')
<script
        src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
        crossorigin="anonymous"></script>
<script>
    let api_token = "{{$api_token}}";

    function openPage(page, btn) {
        let userId = btn.value
        window.open(`/administrator/view${page}/${userId}`)
    }
    function openUser(event) {
        let target = event.target.parentNode;
        let data = JSON.parse(target.getAttribute('data'));
        data["userid"] = target.getAttribute("user-id")
        let model = null;
        let userType = target.getAttribute('model');

        if (userType == "App\\Company")
            model = "#companymodel";
        else if (userType == "App\\Applicant")
            model = "#applicantmodel";

        $(model).dialog({
            width: 500,
            title: target.getAttribute("model").substr(4),
            open: function () {
                for (let key in data) {
                    let value = data[key]
                    $(this).find(`[name=${key}]`).val(value)
                }
            },
            buttons: {
                "Delete": function() {
                    if (!confirm("Weet u zeker dat u deze gebruiker wilt verwijderen?"))
                        return;

                    $.ajax({
                        type:'DELETE',
                        url: `/api/auth/administrator/deleteuser/${data['userid']}?api_token=${api_token}`,
                        success: () => location.reload()
                    })
                },
                "Save": function() {
                    let output = {}
                    $(this).find('[name]').each((i, node) => {
                        let val = node.value.replace('\n', '').replace('\r', '')
                        if (val != data[node.getAttribute('name')])
                            output[node.getAttribute("name")] = val;
                    })

                    if (Object.keys(output).length == 0)
                        return;

                    $.ajax({
                        type: 'POST',
                        url: `/api/auth/administrator/updateuser/${data['userid']}?api_token=${api_token}`,
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
