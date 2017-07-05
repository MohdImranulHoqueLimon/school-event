<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
            data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler">
                    <span></span>
                </div>
            </li>
            <!-- END SIDEBAR TOGGLER BUTTON -->
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="nav-item @if (Route::is('profile.*'))start active open @endif">
                <a href="{{url('/user/profile')}}" class="nav-link ">
                    <i class="icon-home"></i>
                    <span class="title">Profile</span>
                    @if (Route::is('profile.*'))
                        <span class="selected"></span>
                    @endif
                </a>
            </li>

            <li class="nav-item @if (Route::is('students.*'))start active open @endif">
                <a href="{{url('/user/students')}}" class="nav-link ">
                    <i class="fa fa-graduation-cap"></i>
                    <span class="title">Student List</span>
                    @if (Route::is('students.*'))
                        <span class="selected"></span>
                    @endif
                </a>
            </li>

            <li class="nav-item @if (Route::is('payments.*'))start active open @endif">
                <a href="{{url('/user/payments')}}" class="nav-link ">
                    <i class="fa fa-graduation-cap"></i>
                    <span class="title">Payment Us</span>
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