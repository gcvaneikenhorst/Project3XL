@extends('layouts.app')

<link href="{{ asset('css/auth.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">&nbsp;
                    <div class="pull-left box-header">
                        Instellingen
                    </div>
                    <div class="pull-right">
	                    <span class="text-muted">
	                        @if (Auth::user()->userable_type == 'App\Applicant')
	                            Sollicitant
	                        @elseif (Auth::user()->userable_type == 'App\Company')
	                            Bedrijf
	                        @endif
	                    </span>
                    </div>  
                </div>

                <div class="panel-body">
                    @if (Auth::user()->userable_type == 'App\Applicant')

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/settings/save') }}">
                            <input type="hidden" name="user_type" value="1" />
                            {{ csrf_field() }}
                            
                            <span class="form-subtitle">Persoonlijke gegevens</span>
                            
                            <div class="form-group{{ $errors->has('salutation') ? ' has-error' : '' }}">
                                <label for="salutation" class="col-md-4 control-label">Aanhef</label>

                                <div class="col-md-6">
                                    <input id="salutation" type="text" class="form-control" name="salutation"
                                           value="{{ Auth::user()->userable()->first()->salutation }}" required>

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
                                    <input id="firstname" type="text" class="form-control" name="firstname"
                                           value="{{ Auth::user()->userable()->first()->firstname }}" required>

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
                                    <input id="lastname" type="text" class="form-control" name="lastname"
                                           value="{{ Auth::user()->userable()->first()->lastname }}" required>

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
                                    <input id="insertion" type="text" class="form-control" name="insertion"
                                           value="{{ Auth::user()->userable()->first()->insertion }}">

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
                                    <input id="address" type="text" class="form-control" name="address"
                                           value="{{ Auth::user()->userable()->first()->address }}" required>

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
                                    <input id="zipcode" type="text" class="form-control" name="zipcode"
                                           value="{{ Auth::user()->userable()->first()->zipcode }}" required>

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
                                    <input id="location" type="text" class="form-control" name="location"
                                           value="{{ Auth::user()->userable()->first()->location }}" required>

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
                                    <input id="phone" type="text" class="form-control" name="phone"
                                           value="{{ Auth::user()->userable()->first()->phone }}" required>

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
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ Auth::user()->email }}" required>

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
                                    <input id="password" type="password" class="form-control" name="password">

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
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @else
                                        <span class="help-block">Leeg laten indien u dit niet wilt veranderen.</span>
                                    @endif
                                </div>
                            </div>
							
							<!-- Save and dangerzone button -->
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Opslaan
                                    </button>
	                                <a href="/account/dangerzone">
	                                    <span class="btn btn-danger">
	                                        Danger zone
	                                    </span>
	                                </a>
                                </div>
                            </div>
                        </form>

                    @elseif (Auth::user()->userable_type == 'App\Company')

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/settings/save') }}">
                            <input type="hidden" name="user_type" value="2" />
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Bedrijfsnaam</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ Auth::user()->userable()->first()->name }}" required>

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
                                    <input id="address" type="text" class="form-control" name="address"
                                           value="{{ Auth::user()->userable()->first()->address }}" required>

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
                                    <input id="zipcode" type="text" class="form-control" name="zipcode"
                                           value="{{ Auth::user()->userable()->first()->zipcode }}" required>

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
                                    <input id="city" type="text" class="form-control" name="city"
                                           value="{{ Auth::user()->userable()->first()->city }}" required>

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
                                    <input id="phone" type="text" class="form-control" name="phone"
                                           value="{{ Auth::user()->userable()->first()->phone }}" required>

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
                                    <input id="contactperson" type="text" class="form-control" name="contactperson"
                                           value="{{ Auth::user()->userable()->first()->contactperson }}" required>

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
                                    <input id="contactemail" type="email" class="form-control" name="contactemail"
                                           value="{{ Auth::user()->userable()->first()->email }}" required>

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
                                    <input id="website" type="text" class="form-control" name="website"
                                           value="{{ Auth::user()->userable()->first()->website }}" required>

                                    @if ($errors->has('website'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('website') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <span class="form-title">Login gegevens</span>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ Auth::user()->email }}" required>

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
                                    <input id="password" type="password" class="form-control" name="password">

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
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @else
                                        <span class="help-block">Leeg laten indien u dit niet wilt veranderen.</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Opslaan
                                    </button>
                                </div>
                            </div>
                        </form>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection