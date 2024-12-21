@extends('admin.layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Employers</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            id="all-carees-datatables"
                            class="display table table-striped table-hover"
                        >
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Birth Date</th>
                                <th>Guardian</th>
                                {{--                                <th>Action</th>--}}
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Birth Date</th>
                                <th>Guardian</th>
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
                var carees_table;
                $(document).ready(function () {
                    carees_table = $('#all-carees-datatables').DataTable({
                        // "processing": true,
                        "serverSide": true,
                        // "ajax":
                        'ajax': {
                            "url": "{{ route('allCareesDatatableList') }}",
                        },
                        "columns": [
                            {"data": "id"},
                            {"data": "full_name"},
                            {"data": "birthday"},
                            {"data": "guardian"},
                            // {"data": "action"},
                        ],
                    });
                });
            </script>
    @endpush

