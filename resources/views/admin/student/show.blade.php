@extends('admin.layouts.app')
@section('title')
    Show Student
@endsection

@section('page_styles')
@endsection


@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                {!! Breadcrumbs::renderIfExists(Route::getCurrentRoute()->getName()) !!}
            </div>
            <h1 class="page-title"></h1>
            <div class="row">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-users font-dark"></i>
                            <span class="caption-subject bold uppercase">Student Details</span>
                        </div>
                        <div class="actions">

                        </div>
                    </div>

                    <div class="portlet-body form">
                        <div class="row">
                            <div class="col-md-8 profile-info">
                                <h3 class="font-green sbold uppercase">{{$student->full_name}}</h3>
                                <p>
                                    <a href="mailto:{{$student->email}}"> {{$student->email}} </a>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>Full Name</th> <td>{{$student->full_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Username</th> <td>{{$student->username}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th> <td>{{$student->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th> <td>{{$student->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th> <td>{{$student->address}}</td>
                                    </tr>
                                    <tr>
                                        <th>City</th> <td>{{ $student->city}}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th> <td>@if($student->status == 1) Active @else Inactive @endif</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
