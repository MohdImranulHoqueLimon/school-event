@extends('layouts_user.app')
@section('title')
Dashboard
@endsection
@section('head')
<link href="{{URL::to('/')}}/assets/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
{{--<link href="{{URL::to('/')}}/assets/admin/pages/css/profile.min.css" rel="stylesheet" type="text/css"/>--}}

<style type="text/css">
    .profile-menu-hint {
        padding: 10px 0px !important;
    }
</style>
@endsection
@section('page_styles')

@endsection
@section('content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        <div class="row">
            <div class="col-md-8">
                <h1 class="page-title user-page-title">Account Information</h1>
                <div class="profile-sidebar">

                    <!-- END BEGIN PROFILE SIDEBAR -->
                    <!-- BEGIN PROFILE CONTENT -->
                    <div class="row">
                        <div class="col-md-12">
                            @include('flash')
                            <div class="portlet light ">
                                <table class="table table-bordered">
                                   <tbody>
                                       <tr>
                                           <td>
                                             Full Name 
                                         </td>
                                         <td>
                                            {!! $user->name !!} 
                                        </td>
                                    </tr>
                                    <tr>
                                       <td>
                                         Batch
                                     </td>
                                     <td>
                                        {!! $user->batch !!} 
                                    </td>
                                </tr>
                                <tr>
                                   <td>
                                     Profession
                                 </td>
                                 <td>
                                    {!! $user->profession !!} 
                                </td>
                            </tr>
                            <tr>
                               <td>
                                 Country
                             </td>
                             <td>
                                {!! $user->country !!} 
                            </td>
                        </tr>
                        <tr>
                           <td>
                             Mobile Number
                         </td>
                         <td>
                            {!! $user->phone !!} 
                        </td>
                    </tr>
                    <tr>
                       <td>
                         Email
                     </td>
                     <td>
                        {!! $user->email !!} 
                    </td>
                </tr>
                <tr>
                   <td>
                     Present Address
                 </td>
                 <td>
                    {!! $user->address !!} 
                </td>
            </tr>
            <tr>
               <td>
                 Permanent Address
             </td>
             <td>
                {!! $user->permanent_address !!} 
            </td>
        </tr>
        <tr>
           <td>
             City 
         </td>
         <td>
            {!! $user->city !!} 
        </td>
    </tr>
    <tr>
       <td>Profile Image</td>
       <td>
           <img src="{{ url('/images/avatar/thumbnail_images/' . $user->user_image)}}"
           class="img-responsive" alt="" style="height: 100px;width: 100px">
       </td>
   </tr>

</tbody>
</table>

</div>
</div>
</div>
</div>
</div>
<!-- END PROFILE CONTENT -->
</div>
</div>
<!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
@endsection
@section('scripts')
<script src="{{URL::to('/')}}/assets/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"
type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="{{URL::to('/')}}/assets/admin/pages/scripts/profile.min.js" type="text/javascript"></script>
@endsection