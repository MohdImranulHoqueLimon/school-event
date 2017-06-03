@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="/css/app.css">
@endsection

@section('content')
    <div class="container">
        <div class="row profile">
            <div class="col-md-3">
                @include('partials.sidebars.admin')
            </div>

            <div class="col-md-9">
                <div class="profile-content">
                    @include('flash')
                    @yield('main')
                </div>
            </div>
        </div>
    </div>
@endsection
