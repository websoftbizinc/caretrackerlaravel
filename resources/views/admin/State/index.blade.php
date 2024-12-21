@extends('admin.layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    <h4 class="card-title">All States</h4>
                    <!-- Button trigger modal -->
                    <a href="{{route('state.create')}}" class="btn btn-primary pull-right">
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
                                <th>Country</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($States)
                                @foreach($States as $key => $state)
                                    <tr>
                                        <td>{{$key +1}}</td>
                                        <td>{{$state->name}}</td>
                                        <td>{{$state->Country ? $state->Country->name:'N/A'}}</td>
                                        <td><a href="{{route('state.edit',$state->id)}}"
                                               class="btn btn-info">Edit</a>&nbsp;&nbsp;<a
                                                href="{{route('state.delete',$state->id)}}"
                                                onclick="return confirm('Are you sure to delete this State?')"
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

