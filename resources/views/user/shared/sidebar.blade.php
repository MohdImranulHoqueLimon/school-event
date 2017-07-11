<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">

        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
            data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>

            <li class="nav-item @if (Route::is('profile.*'))start active open @endif">
                <a href="{{url('/user/profile')}}" class="nav-link ">
                    <i class="icon-home"></i>
                    <span class="title">Profile</span>
                    @if (Route::is('profile.*'))
                        <span class="selected"></span>
                    @endif
                </a>
            </li>

            @if(\Illuminate\Support\Facades\Auth::user()->status == 1)
            <li class="nav-item @if (Route::is('students.*'))start active open @endif">
                <a href="{{url('/user/students')}}" class="nav-link ">
                    <i class="fa fa-graduation-cap"></i>
                    <span class="title">Student List</span>
                    @if (Route::is('students.*'))
                        <span class="selected"></span>
                    @endif
                </a>
            </li>
            @endif

            <li class="nav-item @if (Route::is('payments.*'))start active open @endif">
                <a href="{{url('/user/payments')}}" class="nav-link ">
                    <i class="fa fa-graduation-cap"></i>
                    <span class="title">Register For Event</span>
                    @if (Route::is('payments.*'))
                        <span class="selected"></span>
                    @endif
                </a>
            </li>

            <li class="nav-item @if (Route::is('invoice.*'))start active open @endif">
                <a href="{{url('/user/invoice')}}" class="nav-link ">
                    <i class="fa fa-file-pdf-o"></i>
                    <span class="title">My Invoices</span>
                    @if (Route::is('invoice.*'))
                        <span class="selected"></span>
                    @endif
                </a>
            </li>

        </ul>
    </div>
</div>