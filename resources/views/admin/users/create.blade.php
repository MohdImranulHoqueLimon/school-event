@extends('admin.layouts.app')

@section('title')
    Create Admin
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
                                <span class="caption-subject bold uppercase"> Create User </span>
                            </div>
                            <div class="actions">

                            </div>
                        </div>

                        <div class="portlet-body form">
                            {!! Form::open(['url' => route('users.store'), 'method' => 'post', 'class' => 'horizontal-form', 'files'=> true]) !!}
                                {{ csrf_field() }}
                                @include('admin.users.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
