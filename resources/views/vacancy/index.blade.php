@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Vacature 's
                        <a href="{{ url('/vacancy/create') }}" class="pull-right"><i class="fa fa-plus" style="color: grey"></i></a>
                    </div>

                    <div class="panel-body">
                        <table id="cv-table" class="table table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($vacancies as $vacancy)

                                <tr  style="cursor: pointer">
                                    <td>{{ $vacancy->title }}</td>
                                    <td>{{ $vacancy->date }}</td>
                                    <td onclick="window.location.href = ('{{ url('/vacancy/edit/'.$vacancy->id) }}');"><i class="fa fa-edit"></i></td>
                                    <td onclick="window.location.href = ('{{ url('/vacancy/delete/'.$vacancy->id) }}');"><i class="fa fa-trash-o"></i></td>
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
            $('#cv-table').DataTable();
        });
    </script>
@endsection