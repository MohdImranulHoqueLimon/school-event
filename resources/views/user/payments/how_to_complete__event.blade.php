@extends('layouts_user.app')
@section('title')
Dashboard
@endsection
@section('head')
@endsection
@section('page_styles')

@endsection
@section('content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-newspaper-o"></i>How to complete your regiser  Events
                        </div>
                    </div>
                    <div class="portlet-body form">

                        <div class="alert alert-success information-box" role="alert">
                            <ul>
                                <li>
                                Bank Account: <br>
                                    Ac Name:Ex-Students Reunion,Bagerhat Govt High School.<br>
                                    Ac No:0881340012987<br>
                                    Bank/Branch:Social Islami Bank Ltd/Bagerhat Branch.
                                </li>
                                <li>
                                   Bkash Number : 12345678
                                </li>

                            </ul>
                        </div>

                        <div class="alert alert-success information-box" role="alert" style="color: #000">
                            <ul>
                                <li>
                                    For register any event click Regiter for event link then select any event which you want to register then complete register.
                                </li>
                                <li>
                                    When complete register for this event then you will see all invoice list and which registration not complete you can see need to attach document or information.
                                </li>
                                <li>
                                    when you click for upload or update information then you will see to type option for this section.
                                </li>
                                <li>
                                    If you want to complete registration using Bkash then select Bkash from drop down and insert last 4 dighit or full number which number used for send money.
                                </li>
                                <li>
                                    If you want to complete registration using Bank then select Bank from drop down and attach your bank reciept.
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            @endsection
            @section('scripts')
            @endsection