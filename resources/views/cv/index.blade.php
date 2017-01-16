@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        CV's
                        <a href="{{ url('/cv/create') }}" class="pull-right"><i class="fa fa-plus" style="color: grey"></i></a>
                    </div>

                    <div class="panel-body">
                        <table id="cv-table" class="table table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Title</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($cvs as $cv)

                                <tr onclick="window.location.replace('{{ url('/cv/edit/'.$cv->id) }}');" style="cursor: pointer">
                                    <td>{{ $cv->date }}</td>
                                    <td>{{ $cv->title }}</td>
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

