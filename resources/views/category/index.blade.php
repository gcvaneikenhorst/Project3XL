@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Categoriën
                        <a href="{{ url('/administrator/category/create') }}" class="pull-right"><i class="fa fa-plus" style="color: grey"></i></a>
                    </div>

                    <div class="panel-body">
                        <table id="category-table" class="table table-hover table-responsive">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach (\App\Category::all() as $category)

                                <tr onclick="window.location.href = '{{ url('/administrator/category/edit/'.$category->id) }}';" style="cursor: pointer">
                                    <td width="200px">{{ $category->name }}</td>
                                    <td>{{ strip_tags($category->description) }}</td>
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
            $('#category-table').DataTable();
        });
    </script>
@endsection

@section('script')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.13/datatables.min.js"></script>
@endsection
