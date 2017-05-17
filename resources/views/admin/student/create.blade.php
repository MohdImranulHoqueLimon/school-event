@extends('admin.layouts.app')

@section('title')
    Create Student
@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                {!! Breadcrumbs::renderIfExists(Route::getCurrentRoute()->getName()) !!}
            </div>
            <h1 class="page-title"></h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-users font-dark"></i>
                                <span class="caption-subject bold uppercase"> Create Student </span>
                            </div>
                            <div class="actions">

                            </div>
                        </div>

                        <div class="portlet-body form">
                            <form class="horizontal-form" role="form" method="POST" action="{{ route('users.store') }}">
                                {{ csrf_field() }}
                                @include('admin.student.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
