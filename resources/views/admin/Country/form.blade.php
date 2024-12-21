@extends('admin.layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{isset($row) ?'Edit':'Add New'}} Country</h4>
                </div>
                <div class="card-body">
                    <form action="{{isset($row) ? route('country.save',$row->id):route('country.save')}}" method="post">
                        {{csrf_field()}}
                        <div class="col-md-6 col-lg-4">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <br/>
                            @endif

                            <div class="form-group">
                                <label for="email2">Country Name</label>
                                <input required
                                       type="text"
                                       class="form-control"
                                       id="name"
                                       name="name"
                                       value="{{isset($row)? $row->name:''}}"
                                       placeholder="Enter Country Name"
                                />


                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>

                            </div>

                        </div>
                    </form>

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

