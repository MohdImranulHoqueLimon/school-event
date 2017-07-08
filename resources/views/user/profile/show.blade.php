@extends('layouts_user.app')
@section('title')
    Dashboard
@endsection
@section('head')
@endsection
@section('page_styles')

@endsection
@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">

            <div class="row">
                @include('shared.flash')
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-users font-dark"></i>
                                <span class="caption-subject bold uppercase"> Personal Information </span>
                            </div>
                            <div class="actions">
                                <div class="btn-group pull-right">
                                    <a href="{{ route('profile.edit', $user->id) }}" class="btn sbold green">
                                        Edit &nbsp;<i class="fa fa-edit"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            @if($user->status == 0)
                                <div class="alert alert-warning">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    Your account is pending. Please wait until admin activate your account or inform the admin
                                </div>
                            @elseif($user->status == 2)
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    Your account is suspended. Please contact with admin
                                </div>
                            @endif

                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td><b>Full Name</b></td>
                                    <td>{!! $user->name !!}</td>
                                </tr>
                                <tr>
                                    <td><b>Batch</b></td>
                                    <td>{!! $user->batch !!}</td>
                                </tr>
                                <tr>
                                    <td><b>Profession</b></td>
                                    <td>{!! $user->profession !!}</td>
                                </tr>
                                <tr>
                                    <td><b>Country</b></td>
                                    <td>{!! $user->country !!}</td>
                                </tr>
                                <tr>
                                    <td><b>Mobile Number</b></td>
                                    <td>{!! $user->phone !!}</td>
                                </tr>
                                <tr>
                                    <td><b>Email</b></td>
                                    <td>{!! $user->email !!}</td>
                                </tr>
                                <tr>
                                    <td><b>Present Address</b></td>
                                    <td>{!! $user->address !!}</td>
                                </tr>
                                <tr>
                                    <td><b>Permanent Address</b></td>
                                    <td>{!! $user->permanent_address !!}</td>
                                </tr>
                                <tr>
                                    <td><b>City</b></td>
                                    <td>{!! $user->city !!}</td>
                                </tr>
                                <tr>
                                    <td><b>Profile Image</b></td>
                                    <td>
                                        <img src="{{ url('/images/avatar/thumbnail_images/' . $user->user_image)}}"
                                             class="img-responsive" alt="" style="height: 100px;width: 100px">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
@endsection
@section('scripts')
@endsection