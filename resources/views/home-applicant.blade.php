<div class="col-md-10 col-md-offset-1">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">&nbsp;
                    <div class="pull-left box-header">
                        Dashboard
                    </div>
                </div>

                <div class="panel-body">
                    <h3>Hoi {{Auth::user()->userable()->first()->firstname}} {{Auth::user()->userable()->first()->lastname}}, welkom op het dashboard.</h3>
                    <p>
                        Vanaf hier kan je alle kanten op. Je kunt zowel je CV maken, als het bewerken er van. Instellingen wijzigen? Dit kan je doen in het menu links bovenin.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">&nbsp;
                    <div class="pull-left box-header">
                        Mijn nummers
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Item</th>
                            <th style="text-align: right">Aantal</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Cv's</td>
                            <td style="font-weight: bold; text-align: right">{{ $cvCount or '-' }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>