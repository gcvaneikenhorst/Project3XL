@extends('layouts.app')


@section('content')
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">

    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">&nbsp;
                    <div class="pull-left box-header">
                        Registreren
                    </div>
                    <div class="pull-right">
                        <div class="paginator">
                            <div class="page-toggle toggle-active" page-index="1">Sollicitant</div>
                            /
                            <div class="page-toggle" page-index="2">Bedrijf</div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-body">
                    <div class="pages">
                        <div class="page page-active">
                            <span class="form-title">Sollicitant</span>
                            <br>
                            <span class="form-subtitle">Gegevens</span>
                            <form class="form-horizontal" role="form" method="POST">
                                <input type="hidden" name="user_type" value="1" />
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('salutation') ? ' has-error' : '' }}">
                                    <label for="salutation" class="col-md-4 control-label">Aanhef</label>

                                    <div class="col-md-6">
                                        <select name="salutation" class="form-control" id="salutatoin">
                                            <option>Dhr.</option>
                                            <option>Mv.</option>
                                        </select>

                                        @if ($errors->has('salutation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('salutation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                    <label for="firstname" class="col-md-4 control-label">Voornaam</label>

                                    <div class="col-md-6">
                                        <input id="firstname" data-validation="^[a-zA-Z ]+$" type="text" class="form-control" name="firstname" required>

                                        @if ($errors->has('firstname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('firstname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                    <label for="lastname" class="col-md-4 control-label">Achternaam</label>

                                    <div class="col-md-6">
                                        <input id="lastname" data-validation="^[a-zA-Z ]+$" type="text" class="form-control" name="lastname" required>

                                        @if ($errors->has('lastname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('insertion') ? ' has-error' : '' }}">
                                    <label for="insertion" class="col-md-4 control-label">Tussenvoegsel</label>

                                    <div class="col-md-6">
                                        <input id="insertion" type="text" class="form-control" name="insertion">

                                        @if ($errors->has('insertion'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('insertion') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label for="address" class="col-md-4 control-label">Adres</label>

                                    <div class="col-md-6">
                                        <input id="address" data-validation="^[a-zA-Z]+ \d+$" type="text" class="form-control" name="address" required>

                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                                    <label for="zipcode" class="col-md-4 control-label">Postcode</label>

                                    <div class="col-md-6">
                                        <input maxlength="6" id="zipcode" data-validation="^[\d]{4}[a-zA-Z]{2}$" type="text" class="form-control" name="zipcode" required>

                                        @if ($errors->has('zipcode'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('zipcode') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                                    <label for="location" class="col-md-4 control-label">Woonplaats</label>

                                    <div class="col-md-6">
                                        <input id="location" data-validation="^[a-zA-Z ]+$" type="text" class="form-control" name="location" required>

                                        @if ($errors->has('location'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('location') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone" class="col-md-4 control-label">Telefoon</label>

                                    <div class="col-md-6">
                                        <input id="phone" data-validation="^(\+)?\d+$" type="text" class="form-control" name="phone" required>

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <span class="form-subtitle">Login gegevens</span>
                                
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-mailadres</label>

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
                                    <label for="password" class="col-md-4 control-label">Wachtwoord</label>

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
                                    <label for="password-confirm" class="col-md-4 control-label">Bevestig wachtwoord</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Registreer
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="page">
                            <span class="form-title">Bedrijf</span>
                            <br>
                            <span class="form-subtitle">Gegevens</span>
                            <form class="form-horizontal" role="form" method="POST">
                                <input type="hidden" name="user_type" value="2" />
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Bedrijfsnaam</label>

                                    <div class="col-md-6">
                                        <input id="name" data-validation="^[a-zA-Z]+$" type="text" class="form-control" name="name" required>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label for="address" class="col-md-4 control-label">Adres</label>

                                    <div class="col-md-6">
                                        <input id="address" data-validation="^[a-zA-Z]+ \d+$" type="text" class="form-control" name="address" required>

                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                                    <label for="zipcode" class="col-md-4 control-label">Postcode</label>

                                    <div class="col-md-6">
                                        <input maxlength="6" id="zipcode" data-validation="^[\d]{4}[a-zA-Z]{2}$" type="text" class="form-control" name="zipcode" required>

                                        @if ($errors->has('zipcode'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('zipcode') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                    <label for="city" class="col-md-4 control-label">Woonplaats</label>

                                    <div class="col-md-6">
                                        <input id="city" data-validation="^[a-zA-Z]+$" type="text" class="form-control" name="city" required>

                                        @if ($errors->has('city'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('city') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone" class="col-md-4 control-label">Telefoon</label>

                                    <div class="col-md-6">
                                        <input id="phone" data-validation="^(\+)?\d+$"  type="text" class="form-control" name="phone" required>

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('contactperson') ? ' has-error' : '' }}">
                                    <label for="contactperson" class="col-md-4 control-label">Contactpersoon</label>

                                    <div class="col-md-6">
                                        <input id="contactperson" data-validation="^[a-zA-Z ]+$" type="text" class="form-control" name="contactperson" required>

                                        @if ($errors->has('contactperson'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('contactperson') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('contactemail') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Contact E-Mail</label>

                                    <div class="col-md-6">
                                        <input id="contactemail" type="email" class="form-control" name="contactemail" value="{{ old('contactemail') }}" required>

                                        @if ($errors->has('contactemail'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('contactemail') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                                    <label for="website" class="col-md-4 control-label">Website</label>

                                    <div class="col-md-6">
                                        <input id="website" data-validation="^(https?:\/\/)?(\w+\.)+\w+(\/\w+)*\/?$" type="text" class="form-control" name="website" required>

                                        @if ($errors->has('website'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('website') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <span class="form-subtitle">Login gegevens</span>
                                
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-mailadres</label>

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
                                    <label for="password" class="col-md-4 control-label">Wachtwoord</label>

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
                                    <label for="password-confirm" class="col-md-4 control-label">Bevestig wachtwoord</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Registreer
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="js/auth.js"></script>
    <script src="/js/form-validation.js"></script>
@endsection

@section('script')
@endsection
