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
                    <h3>Goedendag administrator {{ Auth::user()->userable()->first()->firstname }} {{ Auth::user()->userable()->first()->lastname }}, welkom op het dashboard.</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">&nbsp;
                    <div class="pull-left box-header">
                        Statestieken
                    </div>
                </div>

                <div class="panel-body">
                    <canvas id="barChart" height="120px"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">&nbsp;
                    <div class="pull-left box-header">
                        Gebruikers
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
                            <td>Sollicitanten</td>
                            <td style="font-weight: bold; text-align: right">{{ $applicantCount or '-' }}</td>
                        </tr>
                        <tr>
                            <td>Bedrijven</td>
                            <td style="font-weight: bold; text-align: right">{{ $companyCount or '-' }}</td>
                        </tr>
                        </tbody>
                        <tfoot style="border-top: 2px solid #ddd">
                        <tr>
                            <td>Gebruikers</td>
                            <td style="font-weight: bold; text-align: right">{{ $userCount or '-' }}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">&nbsp;
                    <div class="pull-left box-header">
                        Onderdelen
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
                            <tr>
                                <td>Vacatures</td>
                                <td style="font-weight: bold; text-align: right">{{ $vacancyCount or '-' }}</td>
                            </tr>
                        </tbody>
                        <tfoot style="border-top: 2px solid #ddd">
                            <tr>
                                <td>Matches</td>
                                <td style="font-weight: bold; text-align: right">{{ $matchCount or '-' }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
    @parent

    <script src="{{ asset('/js/chart.min.js') }}"></script>

    <script>
        var barData = {
            labels: <?= json_encode(array_keys($cvStats)) ?>,
            datasets: [
                {
                    label: "Cv's",
                    backgroundColor: 'rgba(220, 220, 220, 0.5)',
                    pointBorderColor: "#fff",
                    data: <?= json_encode(array_values($cvStats)) ?>,
                },
                {
                    label: "Vacatures",
                    backgroundColor: 'rgba(26,179,148,0.5)',
                    borderColor: "rgba(26,179,148,0.7)",
                    pointBackgroundColor: "rgba(26,179,148,1)",
                    pointBorderColor: "#fff",
                    data: <?= json_encode(array_values($vacancyStats)) ?>,
                }
            ]
        };

        var barOptions = {
            responsive: true
        };

        var ctx2 = document.getElementById("barChart").getContext("2d");
        new Chart(ctx2, {type: 'bar', data: barData, options:barOptions});
    </script>

@endsection