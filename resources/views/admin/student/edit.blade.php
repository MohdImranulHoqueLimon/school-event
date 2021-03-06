@extends('admin.layouts.app')
@section('title')
    Edit Student
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
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-users font-dark"></i>
                                <span class="caption-subject bold uppercase"> Edit Student </span>
                            </div>
                            <div class="actions">

                            </div>
                        </div>

                        <div class="portlet-body form">
                            <form class="horizontal-form" role="form" method="POST" action="{{ route('student.update', $student->id) }}">
                                {{ csrf_field() }}
                                {{method_field('PUT')}}

                                @include('admin.student.form')

                                <div class="form-actions right">
                                    <a href="{{route('student.index')}}" class="btn default">Cancel</a>
                                    <button type="submit" class="btn blue">
                                        <i class="fa fa-check"></i> Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')

@endsection


