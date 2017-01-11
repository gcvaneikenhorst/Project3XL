@extends('layouts.app')

<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="paginator" style="">
        <div class="circle circle-active" page-index="1">Sollicitant</div>
        <div class="circle" page-index="2">Bedrijf</div>
    </div>
    <div class="pages">
        <div class="page page-active">
            <h2>
                Sollicitant
            </h2>
            <h3>Gegevens</h3>
            <table>
                <tr>
                    <td>Voornaam</td>
                    <td><input type="text" name="firstname" required></td>
                </tr>
                <tr>
                    <td>Achternaam</td>
                    <td><input type="text" name="lastname" required></td>
                </tr>
                <tr>
                    <td>Tussenvoegsel</td>
                    <td><input type="text" name="insertion"></td>
                </tr>
                <tr>
                    <td>Adres</td>
                    <td><input type="text" name="address" required></td>
                </tr>
                <tr>
                    <td>Postcode</td>
                    <td><input type="text" name="zipcode" required></td>
                </tr>
                <tr>
                    <td>Woonplaats</td>
                    <td><input type="text" name="location" required></td>
                </tr>
                <tr>
                    <td>Telefoon</td>
                    <td><input type="text" name="phone" required></td>
                </tr>
            </table>
            <h3>Login gegevens</h3>
            <table>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" required></td>
                </tr>
                <tr>
                    <td>Wachtwoord</td>
                    <td><input type="text" name="password" required></td>
                </tr>
            </table>
        </div>
        <div class="page">
            <h2>
                Bedrijf
            </h2>
            <h3>Gegevens</h3>
            <table>
                <tr>
                    <td>Bedrijfsnaam</td>
                    <td><input type="text" name="firstname" required></td>
                </tr>
                <tr>
                    <td>Adres</td>
                    <td><input type="text" name="address" required></td>
                </tr>
                <tr>
                    <td>Postcode</td>
                    <td><input type="text" name="zipcode" required></td>
                </tr>
                <tr>
                    <td>Woonplaats</td>
                    <td><input type="text" name="location" required></td>
                </tr>
                <tr>
                    <td>Telefoon</td>
                    <td><input type="text" name="phone" required></td>
                </tr>
                <tr>
                    <td>Contactpersoon</td>
                    <td><input type="text" name="contactperson" required></td>
                </tr>
                <tr>
                    <td>Website</td>
                    <td><input type="text" name="website"></td>
                </tr>
            </table>
            <h3>Login gegevens</h3>
            <table>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" required></td>
                </tr>
                <tr>
                    <td>Wachtwoord</td>
                    <td><input type="text" name="password" required></td>
                </tr>
            </table>
        </div>
        <div class="page">
            <table>
                <tr>
                    <td>Video</td>
                    <td><input type="file" name="file"></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<script src="js/auth.js"></script>
@endsection
