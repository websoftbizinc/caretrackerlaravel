@extends('admin.layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    <h4 class="card-title">All Countries</h4>
                    <!-- Button trigger modal -->
                    <a href="{{route('country.create')}}" class="btn btn-primary pull-right">
                        Add New
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            id="all-country-datatables"
                            class="display table table-striped table-hover"
                        >
                            <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($Countries)
                                @foreach($Countries as $key => $country)
                                    <tr>
                                        <td>{{$key +1}}</td>
                                        <td>{{$country->name}}</td>
                                        <td><a href="{{route('country.edit',$country->id)}}"
                                               class="btn btn-info">Edit</a>&nbsp;&nbsp;<a
                                                href="{{route('country.delete',$country->id)}}"
                                                onclick="return confirm('Are you sure to delete this Country')"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            @else
                                <tr>
                                    <td>No data found</td>
                                </tr>
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        @endsection

        @push('script')
            <script>
                var user_table;
                $(document).ready(function () {
                    user_table = $('#all-users-datatables').DataTable({
                        // "processing": true,
                        "serverSide": true,
                        // "ajax":
                        'ajax': {
                            "url": "{{ route('allUsersDatatableList') }}",
                        },
                        "columns": [
                            {"data": "id"},
                            {"data": "full_name"},
                            {"data": "email"},
                            {"data": "type"},
                            {"data": "status"},
                            // {"data": "action"},

                        ],
                    });
                });

            </script>
    @endpush

