@extends('layouts.app')

@section('content')

    <link href="{{asset('/plugins/Summernote/summernote.css')}}" rel="stylesheet">
    <link href="{{asset('/css/bootstrap-multiselect.css')}}" rel="stylesheet">

    <style>
        .wizard {
            margin: 20px auto;

        }

        .wizard .nav-tabs {
            position: relative;
            margin: 40px auto;
            margin-bottom: 0;
            border-bottom-color: #e0e0e0;
        }

        .wizard > div.wizard-inner {
            position: relative;
        }

        .connecting-line {
            height: 2px;
            background: #e0e0e0;
            position: absolute;
            width: 80%;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: 50%;
            z-index: 1;
        }

        .wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
            color: #555555;
            cursor: default;
            border: 0;
            border-bottom-color: transparent;
        }

        span.round-tab {
            width: 70px;
            height: 70px;
            line-height: 70px;
            display: inline-block;
            border-radius: 100px;
            background: #fff;
            border: 2px solid #e0e0e0;
            z-index: 2;
            position: absolute;
            left: 0;
            text-align: center;
            font-size: 25px;
        }

        span.round-tab i {
            color: #555555;
        }

        .wizard li.active span.round-tab {
            background: #fff;
            border: 2px solid #5bc0de;

        }

        .wizard li.active span.round-tab i {
            color: #5bc0de;
        }

        span.round-tab:hover {
            color: #333;
            border: 2px solid #333;
        }

        .wizard .nav-tabs > li {
            width: 25%;
        }

        .wizard li:after {
            content: " ";
            position: absolute;
            left: 46%;
            opacity: 0;
            margin: 0 auto;
            bottom: 0px;
            border: 5px solid transparent;
            border-bottom-color: #5bc0de;
            transition: 0.1s ease-in-out;
        }

        .wizard li.active:after {
            content: " ";
            position: absolute;
            left: 46%;
            opacity: 1;
            margin: 0 auto;
            bottom: 0px;
            border: 10px solid transparent;
            border-bottom-color: #5bc0de;
        }

        .wizard .nav-tabs > li a {
            width: 70px;
            height: 70px;
            margin: 20px auto;
            border-radius: 100%;
            padding: 0;
        }

        .wizard .nav-tabs > li a:hover {
            background: transparent;
        }

        .wizard .tab-pane {
            position: relative;
            padding-top: 50px;
        }

        .wizard h3 {
            margin-top: 0;
        }

        @media ( max-width: 585px ) {

            .wizard {
                width: 90%;
                height: auto !important;
            }

            span.round-tab {
                font-size: 16px;
                width: 50px;
                height: 50px;
                line-height: 50px;
            }

            .wizard .nav-tabs > li a {
                width: 50px;
                height: 50px;
                line-height: 50px;
            }

            .wizard li.active:after {
                content: " ";
                position: absolute;
                left: 35%;
            }
        }
    </style>





    <div class="container">

            <div class="wizard">
                <div class="wizard-inner">

                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs" role="tablist">

                        <li role="presentation" class="active">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                               <i class="fa fa-user-circle-o"></i>
                               <i class=""></i>

                            </span>
                            </a>
                        </li>

                        <li role="presentation" class="disabled">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="fa fa-newspaper-o"></i>
                                {{--<h1>2</h1>--}}
                            </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="fa fa-address-card"></i>
                            </span>
                            </a>
                        </li>

                        <li role="presentation" class="disabled">
                            <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="fa fa-thumbs-up"></i>
                            </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="row" style="background: #fff;border-radius: 5px;">
                    <div class="col-md-8 col-md-offset-2">
                <form role="form" class="form-horizontal" novalidate>
                    <div class="tab-content">

                        <div class="tab-pane active" role="tabpanel" id="step1">

                            <h3>Stap1</h3>
                            <div class="form-group{{ $errors->has('titel') ? ' has-error' : '' }}">
                                <label for="firstname" class="col-md-4 control-label">Titel:</label>

                                <div class="col-md-6">
                                    <input id="titel" type="text" class="form-control" name="titel"
                                            required>

                                    @if ($errors->has('titel'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('titel') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                <label for="date" class="col-md-4 control-label">Datum</label>

                                <div class="col-md-6">
                                    <input id="date" type="date" class="form-control" name="date"
                                           value="{{\Carbon\Carbon::now()->toDateString()}}" required>

                                    @if ($errors->has('date'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('date') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                <label for="category_id" class="col-md-4 control-label">Datum</label>

                                <div class="col-md-6">
                                    <select id="category_id" name="category_id" class="form-control">
                                        @foreach(\App\Category::all() as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach

                                    </select>

                                    @if ($errors->has('category_id'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('category_id') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>


                            <ul class="list-inline pull-right">
                                <li>
                                    <button type="button" class="btn btn-primary next-step">Volgende</button>
                                </li>
                            </ul>
                        </div>




                        <div class="tab-pane" role="tabpanel" id="step2">
                            <h3>Stap 2</h3>

                            <p>Schrijf uw vacature text.</p>
                            <textarea class="summernote">summernote 1</textarea>



                            <ul class="list-inline pull-right">
                                <li>
                                    <button type="button" class="btn btn-default prev-step">Vorige</button>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-primary next-step">Volgende</button>
                                </li>
                            </ul>
                        </div>




                        <div class="tab-pane" role="tabpanel" id="step3">
                            <h3>Stap 3</h3>



                            <div class="form-group{{ $errors->has('competences') ? ' has-error' : '' }}">
                                <label for="category_id" class="col-md-4 control-label">Selecteer uw competenties</label>

                                <div class="col-md-6">
                                    <select id="competences" name="competences" class="form-control" multiple="multiple">
                                        @foreach(\App\Competence::all() as $competence)
                                            <option value="{{$competence->id}}">{{$competence->name}}</option>
                                        @endforeach

                                    </select>

                                    @if ($errors->has('competences'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('competences') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>




                            <ul class="list-inline pull-right">
                                <li>
                                    <button type="button" class="btn btn-default prev-step">Vorige</button>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-primary btn-info-full next-step">Volgende
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="complete">
                            <h3>Klaar</h3>
                            <p>U kunt nog op vorige drukken om wijzigingen aan te brengen. Als u zeker weet dat alle informatie klopt kunt u op opslaan drukken om de vacature aan te maken.</p>



                            <ul class="list-inline pull-right">
                                <li>
                                    <button type="button" class="btn btn-default prev-step">Vorige</button>
                                </li>
                                <li>
                                  <input type="submit"  value="Opslaan">
                                </li>
                            </ul>
                        </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
                    </div>
                </div>
        </div>
    </div>

    <script>


        $(document).ready(function () {
            //Initialize tooltips
            $('.nav-tabs > li a[title]').tooltip();

            //Wizard
            $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

                var $target = $(e.target);

                if ($target.parent().hasClass('disabled')) {
                    return false;
                }
            });

            $(".next-step").click(function (e) {

                var $active = $('.wizard .nav-tabs li.active');
                $active.next().removeClass('disabled');
                nextTab($active);

            });
            $(".prev-step").click(function (e) {

                var $active = $('.wizard .nav-tabs li.active');
                prevTab($active);

            });
        });

        function nextTab(elem) {
            $(elem).next().find('a[data-toggle="tab"]').click();
        }
        function prevTab(elem) {
            $(elem).prev().find('a[data-toggle="tab"]').click();
        }
        $(document).ready(function() {
            $('.summernote').summernote();
            $('#competences').multiselect();
        });



    </script>





@endsection