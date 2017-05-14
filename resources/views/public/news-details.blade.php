@extends('layouts.home')
@section('bodyclass')
@endsection
@section('wrapperclass') class="homepage common-page blog-post" @endsection
@section('banner')
    <div class="banner service-banner spacetop">
        <div class="banner-image3 parallax">

        </div>
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        {{link_to('#', 'ground shipping',array('class'=>'shipping'))}}
                        <h1>news details</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @include('public.partial.blog')
    @include('public.partial.query')
@endsection
@section('js')

@endsection
@section('css')
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('assets/rs-plugin/css/settings.css')}}">
@endsection