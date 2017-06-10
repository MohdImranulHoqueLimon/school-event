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
            {{--<li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>--}}
            <li class="nav-item @if (Route::is('dashboard'))start active open @endif">
                <a href="{{url('/admin')}}" class="nav-link ">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    @if (Route::is('dashboard'))
                        <span class="selected"></span>
                    @endif
                </a>
            </li>
            <li class="nav-item @if(Route::is('users.*') || Route::is('roles.*') || Route::is('permissions.*')
            || Route::is('student.*')) start active open @endif ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">Users</span>
                    @if(Route::is('users.*') || Route::is('roles.*') || Route::is('permissions.*'))
                        <span class="selected"></span>
                        <span class="arrow open"></span>
                    @else
                        <span class="arrow @if(Route::is('users.*') || Route::is('roles.*') || Route::is('permissions.*')) open @endif "></span>
                    @endif
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if (Route::is('users.*'))start active open @endif">
                        <a href="{{route('users.index')}}" class="nav-link ">
                            <i class="icon-users"></i>
                            <span class="title">User</span>
                            @if (Route::is('users.*'))
                                <span class="selected"></span>
                            @endif
                        </a>
                    </li>

                    <li class="nav-item  @if (Route::is('roles.*'))start active open @endif">
                        <a href="{{route('roles.index')}}" class="nav-link ">
                            <i class="icon-users"></i>
                            <span class="title">Roles</span>
                            @if (Route::is('roles.*'))
                                <span class="selected"></span>
                            @endif
                        </a>
                    </li>

                    <li class="nav-item  @if (Route::is('permissions.*'))start active open @endif">
                        <a href="{{route('permissions.index')}}" class="nav-link ">
                            <i class="icon-users"></i>
                            <span class="title">Permissions</span>
                            @if (Route::is('permissions.*'))
                                <span class="selected"></span>
                            @endif
                        </a>
                    </li>

                    {{--<li class="nav-item  @if (Route::is('student.*'))start active open @endif">
                        <a href="{{route('student.index')}}" class="nav-link ">
                            <i class="icon-users"></i>
                            <span class="title">Student</span>
                            @if (Route::is('student.*'))
                                <span class="selected"></span>
                            @endif
                        </a>
                    </li>--}}
                </ul>
                <ul class="sub-menu">
                    {{--<li class="nav-item  @if (Route::is('student.*'))start active open @endif">
                        <a href="{{route('student.index')}}" class="nav-link ">
                            <i class="icon-users"></i>
                            <span class="title">Student</span>
                            @if (Route::is('student.*'))
                                <span class="selected"></span>
                            @endif
                        </a>
                    </li>--}}
                </ul>
            </li>

            <li class="nav-item @if(Route::is('registration_payments.*')) start active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-dollar"></i>
                    <span class="title">Payments</span>
                    <span class="arrow @if(Route::is('registration_payments.*')) open @endif"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if (Route::is('registration_payments.*'))start active open @endif">
                        <a href="{{route('registration_payments.index')}}" class="nav-link ">
                            <i class="fa fa-dollar"></i>
                            <span class="title">Registration Payments</span>
                            @if (Route::is('registration_payments.*'))
                                <span class="selected"></span>
                            @endif
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item @if(Route::is('news.*') || Route::is('testimonials.*')) start active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-dropbox"></i>
                    <span class="title">Sites</span>
                    <span class="arrow @if(Route::is('news.*') || Route::is('testimonials.*')) open @endif"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @if (Route::is('news.*'))start active open @endif ">
                        <a href="{{route('news.index')}}" class="nav-link ">
                            <i class="fa fa-newspaper-o"></i>
                            <span class="title">News</span>
                            @if (Route::is('news.*'))
                                <span class="selected"></span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item @if (Route::is('testimonials.*'))start active open @endif ">
                        <a href="{{route('testimonials.index')}}" class="nav-link ">
                            <i class="glyphicon glyphicon-tasks"></i>
                            <span class="title">Testimonial</span>
                            @if (Route::is('testimonials.*'))
                                <span class="selected"></span>
                            @endif
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>