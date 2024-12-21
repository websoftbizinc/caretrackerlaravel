@extends('admin.layout.app')
@section('content')
    <div class="row ">
        <div class="col-sm-3 col-md-3">
            <h2>{{$employee->full_name}}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Employers</h4>
                </div>
                <div class="card-body">
                    <table class="table table-head-bg-warning">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            {{--                                <th>Status</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @if($employee->Users)
                            @foreach($employee->Users as $key=> $user)
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>@if($user->full_name)<a
                                            href="{{route('user.detail',$user->id)}}">{{ $user->full_name}}</a> @else
                                            N/A @endif
                                    </td>
                                    <td>{{$user->email ? $user->email:'N/A'}}</td>
                                    <td>{{$user->type ? $user->type:'N/A'}}</td>
                                    {{--                                    <td>{{$user->birthday ? $user->birthday:'N/A'}}</td>--}}
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection

