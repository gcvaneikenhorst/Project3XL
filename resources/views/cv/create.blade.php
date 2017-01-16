@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/tabs.css') }}" rel="stylesheet">

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
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create CV
                </div>

                <div class="panel-body">
                    <form id="cv-create" class="form-horizontal" role="form" method="POST" action="{{ url('/cv/create') }}" novalidate>
                        {{ csrf_field() }}

                        <div class="tab-content">

                            <div class="tab-pane active" role="tabpanel" id="step1">

                                <div class="col-md-offset-2" style="padding-left: 5px">
                                    <h2>Step 1: Metadata</h2>
                                    <p>Vul hier uw informatie in.</p>
                                    <hr>
                                </div>

                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-2 control-label">Title</label>

                                    <div class="col-md-10">
                                        <div class="input-group">
                                            <input id="title" type="text" class="form-control" name="title" required>

                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-text-size"></span>
                                        </span>
                                        </div>

                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-2 control-label">Category</label>

                                    <div class="col-md-10">
                                        <select id="title" class="form-control" name="category">
                                            @foreach(\App\Category::all() as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('category'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('competence') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-2 control-label">Competenties</label>

                                    <div class="col-md-10">
                                        <select id="competence" class="form-control" name="competences[]" width="100%" multiple>
                                            @foreach(\App\Competence::all() as $competence)
                                                <option value="{{ $competence->id }}">{{ $competence->name }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('competence'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('competence') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-2 control-label">Inhoud</label>

                                    <div class="col-md-10">
                                        <textarea name="text"></textarea>

                                        @if ($errors->has('text'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('text') }}</strong>
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

                            <div class="tab-pane" role="tabpanel" id="step2">
                                <div class="col-md-offset-2" style="padding-left: 5px">
                                    <h2>Step 2: Video</h2>
                                    <p>Hier de mogelijkheid om je zelf te onderbouwen met een video.</p>
                                    <hr>
                                </div>

                                <div class="form-group{{ $errors->has('video') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-2 control-label">Youtube Link</label>

                                    <div class="col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-addon">https://www.youtube.com/watch?v=</div>

                                            <input id="video" type="text" class="form-control" name="video" required>

                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-share-alt"></span>
                                            </span>
                                        </div>

                                        @if ($errors->has('video'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('video') }}</strong>
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

                            <div class="tab-pane" role="tabpanel" id="step3">
                                <div class="col-md-offset-2" style="padding-left: 5px">
                                    <h2>Step 3: Motivatie</h2>
                                    <p>Hier de mogelijkheid om een motivatie achter te laten.</p>
                                    <hr>
                                </div>

                                <div class="form-group{{ $errors->has('motivation') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-2 control-label">Motivatie</label>

                                    <div class="col-md-10">
                                        <textarea name="motivation"></textarea>

                                        @if ($errors->has('motivation'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('motivation') }}</strong>
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
                                <div class="col-md-offset-2" style="padding-left: 5px">
                                    <h2>Overzicht</h2>
                                    <p>Nog even alles na kijken...</p>
                                    <hr>
                                </div>

                                <div class="form-group">
                                    <label for="title" class="col-md-2 control-label" style="cursor: pointer">Title</label>

                                    <div class="col-md-10 control-label">
                                        <span data-form-name="title" class="pull-left"></span>
                                        <a href="javascript:toTab('step1');focus('title');" class="pull-right">Verander</a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="category" class="col-md-2 control-label" style="cursor: pointer">Category</label>

                                    <div class="col-md-10 control-label">
                                        <span data-form-name="category" class="pull-left"></span>
                                        <a href="javascript:toTab('step1');focus('category');" class="pull-right">Verander</a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="competences" class="col-md-2 control-label" style="cursor: pointer">Competences</label>

                                    <div class="col-md-10 control-label">
                                        <span data-form-name="competences" class="pull-left"></span>
                                        <a href="javascript:toTab('step1');focus('competences');" class="pull-right">Verander</a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="text" class="col-md-2 control-label" style="cursor: pointer">Inhoud</label>

                                    <div class="col-md-10 control-label">
                                        <p data-form-name="text" class="pull-left" style="text-align: left"></p>
                                        <a href="javascript:toTab('step1');focus('text');" class="pull-right">Verander</a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="video" class="col-md-2 control-label" style="cursor: pointer">Video</label>

                                    <div class="col-md-10 control-label">
                                        <span data-form-name="video" class="pull-left"></span>
                                        <a href="javascript:toTab('step2');focus('video');" onclick="" class="pull-right">Verander</a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="motivation" class="col-md-2 control-label" style="cursor: pointer">Motivatie</label>

                                    <div class="col-md-10 control-label">
                                        <p data-form-name="motivation" class="pull-left" style="text-align: left"></p>
                                        <a href="javascript:toTab('step3');focus('motivation');" class="pull-right">Verander</a>
                                    </div>
                                </div>

                                <div class="col-md-offset-2" style="padding-left: 5px">
                                    <hr>
                                </div>

                                <ul class="list-inline pull-right">
                                    <li>
                                        <button class="btn btn-primary btn-info-full" onclick="$('#cv-create').submit()">Opslaan</button>
                                    </li>
                                </ul>
                            </div>
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

                updateForm();

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

        var updateForm = function() {
            var form = $('#cv-create');
            var fields = form.find('[name]');
            var holder = $('#complete');

            jQuery.each(fields, function() {
                var name = $(this).attr('name');

                if(name == 'category') {
                    holder.find('[data-form-name="'+ name +'"]').html($(this).find('option:selected').text());
                } else if(name == 'competences[]') {
                    var competences = '';

                    jQuery.each($(this).find('option:selected'), function() {
                        if(competences == '') {
                            competences = $(this).text();
                        } else {
                            competences += ', ' + $(this).text();
                        }
                    });

                    holder.find('[data-form-name="competences"]').html(competences);
                } else {
                    holder.find('[data-form-name="'+ name +'"]').html($(this).val());
                }
            });
        }; updateForm();

        function toTab(id) {
            var $item = $('.wizard .nav-tabs li a[aria-controls='+id+']').parent();
            $item.removeClass('disabled');
            $item.children().click();
        }

        function focus(name) {
            var holder = $('.wizard');
            var $elem = holder.find('[name="'+ name +'"]');
            $elem.focus();
        }

        function nextTab(elem) {
            $(elem).next().find('a[data-toggle="tab"]').click();
        }
        function prevTab(elem) {
            $(elem).prev().find('a[data-toggle="tab"]').click();
        }

    </script>
@endsection

