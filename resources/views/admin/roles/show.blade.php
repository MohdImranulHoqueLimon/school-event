@extends('admin.layouts.app')

@section('content')

    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
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
                @include('shared.flash')

                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase"> Details </span>
                            </div>
                            <div class="actions">

                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="note note-info">
                                        <p> {{$role->name}} </p>
                                        <p> Created at: {{$role->created_at->format(config('app.date_format'))}} </p>
                                    </div>
                                </div>

                            </div>


                            <h3 class="form-section">Permissions
                                <a class=" btn btn-sm yellow btn-outline sbold"
                                   href="{{route('roles.permissions', $role->id)}}" data-target="#permission-modal"
                                   data-toggle="modal"> Add/Update Permission </a>
                            </h3>

                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Name</th>
                                            <th></th>
                                        </tr>

                                        @forelse($role->permissions as $permission)
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
                                                    There is no permission added to this role.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>

        </div>
        <!-- END CONTENT BODY -->
    </div>

    @include('admin.roles.permission-modal')
@endsection