@extends('admin.layouts.app')
@section('title')
    Admin
@endsection
@section('page_styles')
@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                {!! Breadcrumbs::renderIfExists('student.index') !!}
            </div>
            <h1 class="page-title"></h1>

            <div class="row">
                @include('shared.flash')
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-users font-dark"></i>
                                <span class="caption-subject bold uppercase"> Students </span>
                            </div>
                            <div class="actions">
                                <div class="btn-group pull-right">
                                    <a href="{{ route('student.create') }}" class="btn sbold green">Add
                                        New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="portlet green-sharp box">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-search"></i>Search Student
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <form class="horizontal-form" role="form" method="GET" action="/admin/student">
                                        <div class="row">
                                            <div class="col-lg-1 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="name" class="control-label">User ID</label>
                                                    <input id="id" type="text" class="form-control" name="id"
                                                           @if(isset($request)) value="{{ $request->get('id') }}" @endif>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="full_name" class="control-label">Name</label>
                                                    <input id="full_name" type="text" class="form-control" name="full_name"
                                                           @if(isset($request)) value="{{ $request->get('full_name') }}" @endif>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="email" class="control-label">Email/Username</label>
                                                    <input id="email" type="text" class="form-control" name="email"
                                                           @if(isset($request)) value="{{ $request->get('email') }}" @endif>
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
                                    <th width="20%"> Full Name</th>
                                    <th width="20%"> Email</th>
                                    <th width="10%"> Status</th>
                                    <th width="15%"> Created At</th>
                                    <th width="15%" class="text-center"> Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr class="odd gradeX">
                                        <td>{{$student->id}}</td>
                                        <td>
                                            <a href="{{ route('student.show',$student->id) }}">
                                                {{$student->full_name}}
                                            </a>
                                        </td>
                                        <td>{{$student->email}}</td>
                                        <td>
                                            @if($student->status == 0) Inactive @else Active @endif
                                        </td>
                                        <td> {{$student->created_at->format('d M, Y')}}</td>
                                        <td class="text-center">
                                            <form method="POST" class="form-inline" action="{{route('student.destroy', $student->id)}}"
                                                  onsubmit="return confirm('Are you sure?')">
                                                {{method_field('DELETE')}}
                                                {{csrf_field()}}
                                                <a href="{{ route('student.show', $student->id) }}" class="btn btn-icon-only grey-cascade">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-icon-only btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button type="submit" class="btn btn-icon-only btn-danger">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            {!! CHTML::customPaginate($students,'') !!}
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
                source: "autocomplete?field=name&table=student",
                minLength: 3,
                select: function(event, ui) {
                    $('#description').val(ui.item.value);
                }
            });
            $( "#email" ).autocomplete({
                source: "autocomplete?field=email&table=student",
                minLength: 3,
                select: function(event, ui) {
                    $('#description').val(ui.item.value);
                }
            });
        });

    </script>
@endsection


