@extends('admin.layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Employee</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            id="all-users-datatables"
                            class="display table table-striped table-hover"
                        >
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Status</th>
                                {{--                                <th>Action</th>--}}
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Status</th>
                                {{--                                <th>Action</th>--}}
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

