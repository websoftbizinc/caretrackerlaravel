@extends('admin.layout.app')
@section('content')
    <div class="row ">
        <div class="col-sm-3 col-md-3">
            <h2>{{$user->full_name}}</h2>
        </div>
    </div>

    <div class="row row-card-no-pd">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="far fa-bell text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Day Off Reminder</p>
                                @if($user->day_off_reminder)
                                    <h4 class="card-title text-success">Yes</h4>
                                @else
                                    <h4 class="card-title text-danger">No</h4>

                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="far fa-bell text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Scheduled Reminder</p>
                                @if($user->scheduled_reminder)
                                    <h4 class="card-title text-success">Yes</h4>
                                @else
                                    <h4 class="card-title text-danger">No</h4>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="far fa-bell text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Pay Period Reminder</p>
                                @if($user->pay_period_reminder)
                                    <h4 class="card-title text-success">Yes</h4>
                                @else
                                    <h4 class="card-title text-danger">No</h4>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="far fa-bell text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-stats">
                            <div class="numbers">
                                <p class="card-category">Carry Routine Reminder</p>
                                @if($user->carry_routine_reminder)
                                    <h4 class="card-title text-success">Yes</h4>
                                @else
                                    <h4 class="card-title text-danger">No</h4>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">User Contacts</h4>
                </div>
                <div class="card-body">
                    <table class="table table-head-bg-warning">
                        <thead>
                        <tr>
                            <th scope="col">Sr No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Phone Type</th>
                            <th scope="col">Relationship</th>
                            <th scope="col">Medical Speciality</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($user->Contact)
                            @foreach($user->Contact as $key12=> $contact)
                                <tr>
                                    <td>{{$key12 +1}}</td>
                                    <td>{{$contact->contact_name ? $contact->contact_name:'N/A'}}</td>
                                    <td>{{$contact->email ? $contact->email:'N/A'}}</td>
                                    <td>{{$contact->phone_number? $contact->phone_number:'N/A'}}</td>
                                    <td>{{$contact->phone_type? $contact->phone_type:'N/A'}}</td>
                                    <td>{{$contact->reletionship? $contact->reletionship:'N/A'}}</td>
                                    <td>{{$contact->medical_speciality? $contact->medical_speciality:'N/A'}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>No Data Found</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">User Phone Numbers</h4>
                </div>
                <div class="card-body">
                    <table class="table table-head-bg-warning">
                        <thead>
                        <tr>
                            <th scope="col">Sr No.</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Contact Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Is Primary?</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($user->Contact)
                            @foreach($user->Contact as $key1=> $phoneNumbers)
                                <tr>
                                    <td>{{$key1 +1}}</td>
                                    <td>{{$phoneNumbers->phone_number}}</td>
                                    <td>{{$phoneNumbers->contact_name? $phoneNumbers->contact_name:'N/A'}}</td>
                                    <td>{{$phoneNumbers->type? $phoneNumbers->type:'N/A'}}</td>
                                    <td>{!! $phoneNumbers->is_primary ?'<span class="badge badge-success">Yes</span>':'<span class="badge badge-danger">No</span>' !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>No Data Found</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">User Addresses</h4>
                </div>
                <div class="card-body">
                    <table class="table table-head-bg-warning">
                        <thead>
                        <tr>
                            <th scope="col">Sr No.</th>
                            <th scope="col">Street</th>
                            <th scope="col">City</th>
                            <th scope="col">State</th>
                            <th scope="col">Description</th>
                            <th scope="col">Is Primary?</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($user->Address)
                            @foreach($user->Address as $key=> $address)
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>{{$address->street? $address->street:'N/A'}}</td>
                                    <td>{{$address->city? $address->city:'N/A'}}</td>
                                    <td>{{$address->state? $address->state:'N/A'}}</td>
                                    <td>{{$address->description? $address->description:'N/A'}}</td>
                                    <td>{!! $address->is_primary ?'<span class="badge badge-success">Yes</span>':'<span class="badge badge-danger">No</span>' !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>No Data Found</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">User Carees</h4>
                </div>
                <div class="card-body">
                    <table class="table table-head-bg-warning">
                        <thead>
                        <tr>
                            <th scope="col">Sr No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Birth Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($user->Employees)
                            @foreach($user->Employees as $key=> $employees)
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>@if($employees->full_name)<a
                                            href="{{route('Carees.detail',$employees->id)}}">{{ $employees->full_name}}</a> @else
                                            N/A @endif
                                    </td>
                                    <td>{{$employees->birthday ? $employees->birthday:'N/A'}}</td>
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


