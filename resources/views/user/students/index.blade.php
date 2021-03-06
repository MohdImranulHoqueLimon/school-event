@extends('layouts_user.app')
@section('title')
    Admin
@endsection
@section('page_styles')
@endsection

@section('content')
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <div class="page-bar"></div>
            <h1 class="page-title"></h1>

            <div class="row">
                @include('shared.flash')
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-users font-dark"></i>
                                <span class="caption-subject bold uppercase"> Students </span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="portlet green-sharp box">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-search"></i>Search Users
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <form class="horizontal-form" role="form" method="GET" action="/user/students">
                                        <div class="row">
                                            <div class="col-lg-1 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="name" class="control-label">User ID</label>
                                                    <input id="id" type="text" class="form-control" name="id" value="{{ $request->get('id') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-4">
                                                <div class="form-group">
                                                    <label for="asset_type_id" class="control-label">Roles
                                                    </label>
                                                    <select class="form-control" name="role_id">
                                                        <option value="">Select</option>
                                                        @foreach($roles as $role)
                                                            <option value="{{$role->id}}"{{$request->get('role_id')==$role->id? 'selected':''}}>
                                                                {{$role->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="asset_type_id" class="control-label">Batch
                                                    </label>
                                                    <select name="batch" class="form-control">
                                                        <option value=""> --- Select --- </option>
                                                        @for($i = 1947; $i <= date('Y'); $i++)
                                                            <option value="{{ $i }}"
                                                                    {{$request->get('batch')==$i? 'selected':''}}>
                                                                {!! $i !!}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-2 col-md-4 col-sm-4">
                                                <div class="form-group">
                                                    <label for="name" class="control-label">Name</label>
                                                    <input id="name" type="text" class="form-control" name="name"
                                                            value="{{ $request->get('name') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="email" class="control-label">Email/Username
                                                    </label>
                                                    <input id="email" type="text" class="form-control" name="email" value="{{ $request->get('email') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-12 col-sm-12 pull-right">
                                                <label for="condition" class="control-label">&nbsp;</label><br/>
                                                <button type="submit" class="btn blue btn-block">
                                                    <i class="fa fa-search"></i> Search
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover table-checkable order-column"
                                   id="sample_1" width="100%">
                                <thead>
                                <tr>
                                    <th width="5%"> Id</th>
                                    <th width="20%"> Name</th>
                                    <th width="20%"> Email</th>
                                    <th width="15%"> Roles</th>
                                    <th width="10%"> Status</th>
                                    <th width="15%"> Created At</th>
                                    <th width="15%" class="text-center"> Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr class="odd gradeX">
                                        <td>{{$user->id}}</td>
                                        <td>
                                            <a href="{{ route('students.show', base64_encode($user->id)) }}">{{$user->name}}</a>
                                        </td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @forelse($user->roles as $role)
                                                {!! $role->name !!} {!! (!$loop->last) ? ', ':'' !!}
                                            @empty
                                                NA
                                            @endforelse
                                        </td>
                                        <td>
                                            @if($user->status == 1) Active
                                            @elseif($user->status == 0) Pending
                                            @elseif($user->status == 2) Suspended
                                            @endif
                                        </td>
                                        <td> {{$user->created_at->format('d M, Y')}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('students.show', base64_encode($user->id)) }}" class="btn btn-icon-only grey-cascade">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {!! CHTML::customPaginate($users,'') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>

        $(function()
        {
            $( "#name" ).autocomplete({
                source: "autocomplete?field=name&table=users",
                minLength: 3,
                select: function(event, ui) {
                    $('#description').val(ui.item.value);
                }
            });
            $( "#email" ).autocomplete({
                source: "autocomplete?field=email&table=users",
                minLength: 3,
                select: function(event, ui) {
                    $('#description').val(ui.item.value);
                }
            });
        });

    </script>
@endsection


