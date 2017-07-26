@extends('layouts_user.app')
@section('title')
Payments
@endsection
@section('page_styles')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{URL::to('/')}}/assets/admin/global/plugins/datatables/datatables.min.css" rel="stylesheet"
type="text/css"/>
<link href="{{URL::to('/')}}/assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css"
rel="stylesheet" type="text/css"/>
@endsection

@section('content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
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
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> Payments </span>
                        </div>
                        <div class="actions">
                        </div>
                    </div>
                    <div class="portlet-body">

                        
                        <div class="alert alert-success information-box" role="alert">To confirm your payment please click <b>$</b> sing icon then update payment information. If you use mobile then scroll to left then you will see <b>$</b> icon.</div>
                        <div style="overflow-x: scroll;">
                            <table class="table table-striped table-bordered table-hover table-checkable order-column"
                            id="sample_1"
                            style="overflow-x: scroll !important; min-width: 1300px !important;">
                            <thead>
                                <tr>
                                    <th style="min-width: 165px;">User</th>
                                    <th style="min-width: 165px;">Event</th>
                                    <th style="min-width: 80px;">Amount</th>
                                    <th style="min-width: 80px;">G. Amount</th>
                                    <th style="min-width: 80px;">T. Amount</th>
                                    <th style="min-width: 80px;">G. Count</th>
                                    <th style="min-width: 95px;">Created</th>
                                    <th style="min-width: 90px;">Payment Type</th>
                                    <th style="min-width: 90px;">Cash Receiver</th>
                                    <th style="min-width: 90px;">TrxID No</th>
                                    <th style="min-width: 120px;">Attachment</th>
                                    <th style="min-width: 120px;">Approved By</th>
                                    <th style="min-width: 80px;">Status</th>
                                    <th style="min-width: 180px; text-align: center;"> Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $payment)

                                <?php
                                $guestAmount = ($payment->event->guest_amount && $payment->event->guest_amount > 0) ? $payment->event->guest_amount : 0;
                                $guestCount = ($payment->guest_count && $payment->guest_count > 0) ? $payment->guest_count : 0;

                                $totalGuestAmount = $guestAmount * $guestCount;
                                $ownTicketAmount = $payment->amount - $totalGuestAmount;
                                ?>

                                <tr class="odd gradeX">
                                    <td>{{$payment->user->name}}</td>
                                    <td>{{$payment->event->title}}</td>
                                    <td>{{$ownTicketAmount}}</td>
                                    <td>
                                        @if($totalGuestAmount === 0)
                                        N/A
                                        @else
                                        {{ $totalGuestAmount }}
                                        @endif
                                    </td>
                                    <td>{{$payment->amount}}</td>
                                    <td> @if($payment->guest_count) {{$payment->guest_count }} @else
                                        N/A @endif</td>
                                        <td class="center">{{ date('d M, Y', strtotime($payment->created_at)) }}</td>
                                        <td>
                                            {{--@if($payment->payment_type && $payment->payment_method->title)
                                            {{$payment->payment_method->title}}
                                            @else N/A
                                            @endif--}}

                                            @if($payment->payment_type != NULL && $payment->payment_type == 1) Bank
                                            @elseif($payment->payment_type != NULL && $payment->payment_type == 2)
                                            Bkash
                                            @elseif($payment->payment_type != NULL && $payment->payment_type == 3)
                                            Cash
                                            @else N/A
                                            @endif
                                        </td>
                                        <td>{{ $payment->cash_note  }}</td>
                                        <td>{{ $payment->bkash_code  }}</td>
                                        <td>
                                            <a target="_blank"
                                            href="../upload/payment/{{ $payment->bank_attachment  }}">{{ $payment->bank_attachment  }}</a>
                                        </td>
                                        <td>
                                            @if($payment->approved_admin != null || $payment->approved_admin != NULL)
                                            @if($payment->approved_admin->name)
                                            {{$payment->approved_admin->name}}
                                            @else
                                            N/A
                                            @endif
                                            @endif
                                        </td>
                                        <td>@if($payment->status === 1) Approved @else Pending @endif</td>
                                        <td>
                                            <a href="#" title="click this to confirm payment" style="float: left" data-toggle="modal"
                                            data-target="#exampleModal"
                                            class="btn btn-icon-only grey-cascade"
                                            onclick="setPaymentId({{$payment->id}})">
                                            <i class="fa fa-dollar"></i>
                                        </a>

                                        @if($payment->status === 1)
                                        <a href="{{ route('user.invoice', base64_encode($payment->id)) }}" style="float: left"
                                         class="btn btn-icon-only grey-cascade">
                                         <i class="fa fa-file-pdf-o"></i>
                                     </a>
                                     @endif

                                     <form method="POST" class="form-inline"
                                     action="{{route('admin.payment', $payment->id)}}"
                                     onsubmit="return confirm('Are you sure?')">
                                     {{method_field('DELETE')}}
                                     {{csrf_field()}}
                                     <button type="submit" class="btn btn-icon-only btn-danger"><i
                                        class="fa fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->

<div class="modal fade" id="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Payment Type Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="horizontal-form" role="form" id="payment_type_form"
                action="{{ route('update_payment_type')  }}"
                enctype="multipart/form-data" method="POST">

                {{ csrf_field() }}
                {{method_field('PUT')}}

                <input type="hidden" name="id" id="payment_id" value=""/>

                <div class="row">
                    <div class="col-md-offset-2 col-md-7">
                        <div class="form-group">
                            <label for="payment_type" class="control-label">Payment Type</label>
                            <select name="payment_type" class="form-control" onchange="setPaymentMethod(this)" required="">
                                <option value=""> --- Select ---</option>
                                @foreach($paymentTypes as $paymentType)
                                <option value="{{ $paymentType->id }}">{!! $paymentType->title !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-offset-2 col-md-7" id="attachment_section" style="display: none;">
                        <div class="form-group">
                            <label for="name" class="control-label">Bank Attachment</label>
                            <input type="file" name="bank_attachment" id="bank_attachment" class="form-control"/>
                        </div>

                        <div class="alert alert-info information-box" role="alert">
                           <b>Bank Payment Steps</b> :<br>
                           01. Go to any branch of <b>Social Islami Bank Ltd</b>.<br>
                           02. Deposit the total amount for registration.<br>
                           *AC Name: <b>Ex-Students Reunion,Bagerhat Govt High School</b>.<br>
                           *Ac No: <b>0881340012987</b><br>
                           *Branch: <b>Bagerhat Branch</b>.<br>
                           03. Scan the deposit slip or take a clear pic.<br>
                           04. Login to the registration page and go to <b>My Invoice</b> page,click on the sign <b>$</b> , select payment type <b>Bank</b> , Attach the pic or scanned deposit slip.<b>Confirm</b> your submission.
                           Done!You will receive an invoice after verifying your payment.<br>
                           Please wait for the approval.<br>
                       </div>
                   </div>

                   <div class="col-md-offset-2 col-md-7" id="bkash_section" style="display: none;">
                    <div class="form-group">
                        <label for="name" class="control-label">bKash TrxID No</label>
                        <input type="text" name="bkash_code" id="bkash_code" class="form-control"/>
                    </div>

                    <div class="alert alert-info information-box" role="alert">
                       <b>bKash Payment Steps</b> :<br>
                       You can make payments from your bKash Account to our <b>Merchant</b> .<br>
                       01. Go to your bKash Mobile Menu by dialing <b>*247#</b><br>
                       02. Choose <b>Payment</b> option by pressing <b>3</b><br>
                       03. Enter the Merchant bKash Account Number <b>01972427432</b><br>
                       04. Enter the <b>Total Amount</b> with <b>bKash charge</b>.<br>
                       05. Enter <b>Your Name</b> in <b>Reference section</b>.<br>
                       06. Enter the Counter Number <b>1</b>
                       07. Now enter your bKash Mobile Menu <b>PIN</b> to confirm<br>
                   </div>
               </div>

               <div class="col-md-offset-2 col-md-7" id="cash_section" style="display: none;">
                <div class="form-group">
                    <label for="note" class="control-label">Note</label>
                    <input type="text" name="note" id="note" class="form-control"/>
                </div>

                <div class="alert alert-info information-box" role="alert">
                   <b>Cash Payment</b>:<br>
                   Give the cash receiver <b>Name and Mobile</b> no into reference box.<br>

                   You can find your invoice after getting approval.<b>Download</b> your invoice.<br>
                   You will get an email with the attached invoice too.<br>

               </div>

           </div>
       </div>
       <div class="modal-footer">
    <button type="submit" class="btn btn-primary">Save changes
    </button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
   </form>
</div>

</div>
</div>
</div>

<script type="text/javascript">

    function setPaymentMethod(obj) {

        var selectedMethod = $(obj).val();

        $('#attachment_section, #bkash_section, #cash_section').hide();

        if (selectedMethod == 1) {
            $('#attachment_section').show();
            $("#bank_attachment").prop('required',true);
            $("#bkash_code").prop('required',false);
            $("#note").prop('required',false);
        }
        if (selectedMethod == 2) {
            $('#bkash_section').show();
            $("#bank_attachment").prop('required',false);
            $("#bkash_code").prop('required',true);
            $("#note").prop('required',false);
        }
        if (selectedMethod == 3) {
            $('#cash_section').show();
             $("#bank_attachment").prop('required',false);
            $("#bkash_code").prop('required',false);
            $("#note").prop('required',true);
        }
    }

    function submitPaymentTypeForm() {
        $('#payment_type_form').submit();
    }

    function setPaymentId(id) {
        $('#payment_id').val(id);
    }

</script>

@endsection
@section('page_scripts')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{URL::to('/')}}/assets/admin/global/scripts/datatable.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/datatables/datatables.min.js"
type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"
type="text/javascript"></script>
@endsection


@section('page_script')
<script src="{{URL::to('/')}}/assets/admin/pages/scripts/table-datatables-managed.min.js"
type="text/javascript"></script>
@endsection
