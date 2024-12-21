@extends('admin.layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{isset($row) ?'Edit':'Add New'}} City</h4>
                </div>
                <div class="card-body">
                    <form action="{{isset($row) ? route('city.save',$row->id):route('city.save')}}" method="post">
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
                                <label for="email2">Country</label>
                                <select class="form-control" name="country_id" id="country" required>
                                    <option value="">Select Country</option>
                                    @foreach($Countries as $country)
                                        <option
                                            value="{{$country->id}}" <?= isset($row) && $row->country_id == $country->id ? 'selected' : ''  ?>>{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email2">State</label>
                                <select class="form-control" name="state_id" id="state" required>
                                    <option value="">Select State</option>
                                    @if(isset($row))
                                        @foreach($States as $State)
                                            <option
                                                value="{{$State->id}}" <?= isset($row) && $row->state_id == $State->id ? 'selected' : ''  ?>>{{$State->name}}</option>

                                        @endforeach

                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email2">State Name</label>
                                <input required
                                       type="text"
                                       class="form-control"
                                       id="name"
                                       name="name"
                                       value="{{isset($row)? $row->name:''}}"
                                       placeholder="Enter State Name"
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
                $(document).ready(function () {
                    // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $("#country").change(function () {
                        var val = $(this).val();
                        $.ajax({
                            /* the route pointing to the post function */
                            url: '{{url('city/ajaxGetStates/')}}/' + val,
                            type: 'POST',
                            /* send the csrf-token and the input to the controller */
                            data: {_token: '{{csrf_token()}}'},
                            dataType: 'JSON',
                            /* remind that 'data' is the response of the AjaxController */
                            success: function (data) {
                                if (data.status) {
                                    $('#state').html(data.html);
                                } else {
                                    $('#state').html('<option value="">Select State</option>');
                                }
                            }
                        });
                    });

                });

            </script>
    @endpush

