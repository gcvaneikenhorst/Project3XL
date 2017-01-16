@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Vacancies
                        <a href="{{ url('/vacancy/create') }}" class="pull-right"><i class="fa fa-plus" style="color: grey"></i></a>
                    </div>

                    <div class="panel-body">
                        <table id="vacancy-table" class="table table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Title</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($vacancies as $vacancy)

                                <tr onclick="window.location.href = '{{ url('/vacancy/edit/'.$vacancy->id) }}';" style="cursor: pointer">
                                    <td>{{ $vacancy->date }}</td>
                                    <td>{{ $vacancy->title }}</td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#vacancy-table').DataTable();
        });
    </script>
@endsection

@section('script')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.13/datatables.min.js"></script>
@endsection

