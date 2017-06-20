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

                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form class="login-form form-horizontal" role="form" method="POST" action="{{ route('confirm') }}">
                         {{ csrf_field()  }}
                         @if (count($errors) > 0)
                         <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif


                        <div class="panel panel-primary">
                          <div class="panel-heading">
                              <h3 class="panel-title">Event Information</h3>
                          </div>
                          <div class="panel-body">


                            <table class="table table-bordered">
                               <tr>
                                   <th>Event Title</th>
                                   <th>Amount</th>
                                   <th>Number Of Guest</th>
                                   <th>Guest Amount</th>
                                   <th>Total Amount</th>
                               </tr>
                               <tr>
                                   <td>{!! $checkout_data['event_title'] !!}</td>
                                   <td>
                                       <?php 
                                       $update_amount = $checkout_data['new_amount'] ? $checkout_data['new_amount'] : $checkout_data['amount'];
                                       echo $update_amount;
                                       ?>
                                   </td>
                                   <td>
                                       <?php 
                                       $guest_count = $checkout_data['guest_count'] ? $checkout_data['guest_count'] : 0;
                                       echo $guest_count;
                                       ?>
                                   </td>
                                   <td>
                                       <?php 
                                       echo $guest_total_amount = $guest_count * $checkout_data['guest_amount'];
                                       ?>
                                   </td>
                                   <td>
                                      <?php 
                                      echo $total_amount = $update_amount + $guest_total_amount;
                                      ?>
                                  </td>
                              </tr>
                          </table>
                          <input type="hidden" name="event_id" value="{!! $checkout_data['event_id'] !!}">
                          <input type="hidden" name="amount" value="{!! $total_amount !!}">
                          <input type="hidden" name="guest_count" value="{!! $guest_count !!}">
                          <div class="form-actions right">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn blue"><i class="fa fa-check"></i> Continue</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </form>
            <!-- END FORM-->
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
@endsection
@section('scripts')
@endsection