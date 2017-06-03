@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="/css/app.css">
@endsection

@section('content')
    <div class="container">
        <div class="row profile">
            <div class="col-md-3">
                @include('partials.sidebars.user')
            </div>

            <div class="col-md-9">
                <div class="profile-content">
                    @include('flash')
                    @yield('inner-content')
                </div>
            </div>
        </div>
    </div>
@stop