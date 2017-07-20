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
                            <i class="fa fa-newspaper-o"></i>How to complete registration
                        </div>
                    </div>
                    <div class="portlet-body form">

                     অনলাইন রেজিসট্রেশন করতে নিচের ধাপ গুলো অনুসরণ করুন! <br>
                     ১। নিম্নোক্ত লিঙ্ক এ ক্লিক করে প্রবেশ করুন।<br>

                     {{ url('/register') }}<br>

                     ২। রেজিসট্রেশন ফর্ম সঠিক ভাবে পূরণ করুন।যেহেতু আপনার ছবি প্রশিকায় প্রকাশিত হবে,তাই চাকরি বা ভর্তির আবেদনের ক্ষেত্রে  যেমন ছবি দিয়ে থাকেন সেইধরনের একটি সুন্দর ছবি আপলোড করুন।<b>Suggested Pic Dimension: 600 X 600;Size: Max 100 kb</b><br>

                     ৩।সকল তথ্য সঠিক ভাবে পূরণ করে <b>Submit</b> করুন।<br>

                     সঠিক ভাবে রেজিসট্রেশন সম্পন্ন হলে একটি মেসেজ দেখতে পাবেন।তারপর <b>Login</b> অপশনে ক্লিক করে আপনার <b>Mobile No & Password</b> দিয়ে <b>Login</b> করুন।<br>

                     <b>Register For Event</b> এ ক্লিক করে Event সিলেক্ট করুন <b>Reunion Registration-2017(1000)</b> অথবা <b>Reunion Registration-2017(500)</b>।শুধুমাত্র যারা এখনও বিভিন্ন প্রতিষ্ঠানে অধ্যায়নরত তারা <b>Reunion Registration-2017(500)</b> এই Event টি নির্বাচন করুন ।<b>Continue</b> দিয়ে পরের পেজে যান।<br>
                     **রেজিসট্রেশন ফি , অতিথি থাকলে সংখ্যা নির্বাচন করুন।<b>Confirm</b> করুন।একটি ইনভয়েস দেখতে পাবেন।ইনভয়েস টেবিলের ডান দিকে $ সাইনের উপর ক্লিক করে <b>Payment Type</b> নির্বাচন করুণ<b>(Bank/bKash/Cash)</b>। <br>

                     <b>Payment Confirm</b> করতে <b>Bank Slip</b> এর ছবি আপলোড করুন অথবা <b>bKash</b> এর <b>TrxID no</b> দিন।<b>Cash Payment</b> দিলে যার কাছে দিয়েছেন তার নাম এবং মোবাইল নং দিন।<br>

                     আপনার <b>Payment</b> যাচাই বাছাই করে,সকল তথ্য সঠিক থাকলে আপনার <b>Pending  Account Active</b> করে দেওয়া হবে।<b>Active</b> হলে আপনার <b>Invoice</b> দেখতে পাবেন।<b>Download Your Invoice</b>.<br>

                     <b>bKash Payment Steps</b> :<br>
                     You can make payments from your bKash Account to our <b>Merchant</b> .<br>
                     01. Go to your bKash Mobile Menu by dialing <b>*247#</b><br>
                     02. Choose <b>Payment</b> option by pressing <b>3</b><br>
                     03. Enter the Merchant bKash Account Number <b>01972427432</b><br>
                     04. Enter the <b>Total Amount</b> with <b>bKash charge</b>.<br>
                     05. Enter <b>Your Name</b> in <b>Reference section</b>.<br>
                     06. Enter the Counter Number <b>1</b>
                     07. Now enter your bKash Mobile Menu <b>PIN</b> to confirm<br>

                     Now go to your <b>My Invoice page</b>,click on the sign <b>$</b> , select <b>payment type bKash</b> , give your payment <b>TrxID</b> as reference into the <b>bKash Code</b> box.<br>

                     Done! You will receive an invoice after verifying your payment.Please wait for the approval.<br>

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

                     <b>Cash Payment</b>:<br>
                     Give the cash receiver <b>Name and Mobile</b> no into reference box.<br>

                     You can find your invoice after getting approval.<b>Download</b> your invoice.<br>
                     You will get an email with the attached invoice too.<br>

                     <b>Note</b>:<br>
                     01. Please wait for your payment approval.<br>
                     02. After getting your payment confirmation,Admin will active your account.<br>
                     03. You will get all given access after activation of your account.Please wait till then.<br>
                     04. Please keep patience in any kind of difficulties regarding registration issues.<br>
                     05. Admins preserve all the right to ban any user for fraudulence,miss-usage or any type of offensive activities.<br>
                     06. All we need your friendly co-operation.<br>

                 </div>
             </div>
             <!-- END CONTENT BODY -->
         </div>
         <!-- END CONTENT -->
         @endsection
         @section('scripts')
         @endsection
         <style type="text/css">
             .portlet-body {
                line-height: 30px;
             }
         </style>