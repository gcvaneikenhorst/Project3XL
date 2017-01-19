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
                    <h3>Goedendag vertegenwoordiger van {{Auth::user()->userable()->first()->name}}, welkom op het dashboard.</h3>
                    <p>
                        Vanaf hier kan je alle kanten op. Je kunt zowel je CV maken, als het bewerken er van. Instellingen wijzigen? Dit kan je doen in het menu links bovenin.
                        Maar er is meer!
                        Je kan namelijk ook zien of je matches hebt. Om je alvast een voorproefje te geven: je hebt op dit moment <b>(aantal)</b> matches.
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
                            <td>Vacature's</td>
                            <td style="font-weight: bold; text-align: right">{{ $vacancyCount or '-' }}</td>
                        </tr>
                        <tr>
                            <td>Matches</td>
                            <td style="font-weight: bold; text-align: right">{{ $matchCount or '-' }}</td>
                        </tr>
                        <tr>
                            <td>Betaalde Matches</td>
                            <td style="font-weight: bold; text-align: right">{{ $payedCvCount or '-' }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>