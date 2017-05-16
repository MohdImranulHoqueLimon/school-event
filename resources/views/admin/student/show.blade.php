@extends('admin.layouts.app')
@section('title')
    Show User
@endsection

@section('page_styles')

@endsection


@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->

            <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                {!! Breadcrumbs::renderIfExists(Route::getCurrentRoute()->getName()) !!}
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"></h1>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-users font-dark"></i>
                            <span class="caption-subject bold uppercase">User Details</span>
                        </div>
                        <div class="actions">

                        </div>
                    </div>

                    <div class="portlet-body form">
                        <div class="row">
                            <div class="col-md-8 profile-info">
                                <h3 class="font-green sbold uppercase">{{$user->name}}</h3>

                                <p>
                                    <a href="mailto:{{$user->email}}"> {{$user->email}} </a>
                                </p>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">

                                <h3 class="form-section">Roles
                                    <a class=" btn btn-sm yellow btn-outline sbold"
                                       href="{{route('users.roles', $user->id)}}" data-target="#roles-modal"
                                       data-toggle="modal"> Add/Update Role </a>
                                </h3>

                                <table class="table table-bordered">
                                    <tr>
                                        <th>Name</th>
                                        <th></th>
                                    </tr>

                                    @forelse($user->roles as $role)
                                        <tr>
                                            <td>{{$role->name}}</td>
                                            <td><input type="checkbox"
                                                       checked
                                                       disabled
                                                       value="{{$role->id}}"/></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2">
                                                There is no role added to this user.
                                            </td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>

                            <div class="col-md-6">

                                <h3 class="form-section">Permissions
                                    <a class=" btn btn-sm yellow btn-outline sbold"
                                       href="{{route('users.permissions', $user->id)}}" data-target="#permissions-modal"
                                       data-toggle="modal"> Add/Update Permission </a>
                                </h3>

                                <table class="table table-bordered">
                                    <tr>
                                        <th>Name</th>
                                        <th></th>
                                    </tr>

                                    @forelse($user->permissions as $permission)
                                        <tr>
                                            <td>{{$permission->name}}</td>
                                            <td><input type="checkbox"
                                                       checked
                                                       disabled
                                                       value="{{$permission->id}}"/></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2">
                                                There is no permission added to this user.
                                            </td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

    @include('admin.users.partials.roles-modal')
    @include('admin.users.partials.permissions-modal')
@endsection
