@extends('admin.layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    <h4 class="card-title">All City</h4>
                    <!-- Button trigger modal -->
                    <a href="{{route('city.create')}}" class="btn btn-primary pull-right">
                        Add New
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            id="all-state-datatables"
                            class="display table table-striped table-hover"
                        >
                            <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Name</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($Cities)
                                @foreach($Cities as $key => $city)
                                    <tr>
                                        <td>{{$key +1}}</td>
                                        <td>{{$city->name}}</td>
                                        <td>{{$city->State ? $city->State->name:'N/A'}}</td>
                                        <td>{{$city->Country ? $city->Country->name:'N/A'}}</td>
                                        <td><a href="{{route('city.edit',$city->id)}}"
                                               class="btn btn-info">Edit</a>&nbsp;&nbsp;<a
                                                href="{{route('city.delete',$city->id)}}"
                                                onclick="return confirm('Are you sure to delete this City?')"
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
                                <th>Sr No</th>
                                <th>Name</th>
                                <th>State</th>
                                <th>Country</th>
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

                $(document).ready(function () {
                    $('#all-state-datatables').DataTable();
                });

            </script>
    @endpush

