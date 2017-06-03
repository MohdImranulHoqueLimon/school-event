<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{asset('/images/app/telesom_logo.png')}}" class="img-responsive" alt="Telesom" id="logo">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                {{--{!! $menuHtml !!}--}}

                {{-- Will implement later
                <li><a href="#">Service</a></li>
                <li><a href="#">Vas</a></li>
                <li><a href="#">Proms</a></li>
                <li><a href="#">Easy Mobile</a></li>
                --}}
                <li class="@if(request()->is('pages/home')) active @endif">
                    <a href="{{ route('pages.index') }}">{!! trans('nav.home') !!}</a>
                </li>
                <li class="@if(request()->is('promos')) active @endif">
                    <a href="{{ route('promos.index') }}">{!! trans('nav.promotion') !!}</a>
                </li>
                <li class="@if(request()->is('news')) active @endif">
                    <a href="{{ route('news.index') }}">{!! trans('nav.csr_short') !!}</a>
                </li>
                <li class="@if(request()->is('pages/contact')) active @endif">
                    <a href="{{ url('pages/contact') }}">{!! trans('nav.contact') !!}</a>
                </li>

                @if (Auth::guest())

                    <li class="@if(request()->is('auth/login')) active @endif">
                        <a id="viva_login" href="javascript:void(0);">{!! trans('nav.login') !!}</a>
                        <!-- <a id="viva_login" data-toggle="modal" href="#login-modal">Login</a> -->
                    </li>
                    {{--<li class="@if(request()->is('auth/login')) active @endif"><a href="{{ url('/auth/login') }}">Login</a></li>--}}

                    {{--<li class="@if(request()->is('auth/register')) active @endif">
                        <a id="viva_regidtrar" data-toggle="modal" href="#register_modal">Register</a>
                    </li>--}}


                @else

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">{!! trans('nav.my_account') !!} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" style="background-color: #6A5ACD">
                            <li>
                                <a href="{{ route('my-profile') }}">
                                    <i class="glyphicon glyphicon-user"></i> {!! trans('nav.my_profile') !!}
                                </a>
                            </li>
                            <li><a href="{{route('support.tickets.active')}}"><i
                                            class="glyphicon glyphicon-hand-right"></i> {!! trans('nav.support') !!}</a>
                            </li>
                            @if(Shinobi::is('admin'))
                                <li><a href="{{ route('admin.dashboard') }}"><i class="glyphicon glyphicon-cog"></i>
                                        {!! trans('nav.administration') !!}</a></li>
                            @elseif(Shinobi::is('support-admin'))
                                <li><a href="{{ url('/support/admin') }}"><i class="glyphicon glyphicon-cog"></i>
                                        {!! trans('nav.support_admin') !!}</a></li>
                            @elseif(Shinobi::is('news-admin'))
                                <li><a href="{{ url('/newseditor/admin') }}"><i class="glyphicon glyphicon-cog"></i>
                                        {!! trans('nav.news_admin') !!}</a></li>
                            @endif
                        </ul>
                    </li>
                    <li><a href="{{ url('/auth/logout') }}"><span class="glyphicon glyphicon-log-out"></span></a></li>
                @endif

                <?php $language =  !empty(Cookie::get('locale')) ? Cookie::get('locale') : 'som'; ?>

                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        {!! strtoupper($language) !!}
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" style="background-color: rgba(64, 64, 64, 0.49)">
                        <li>
                            <a href="{{ url('setLang?locale=en') }}" @if ($language == 'en') style="background-color: #219e2f !important" @endif>
                                 English
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('setLang?locale=som') }}" @if ($language == 'som') style="background-color: #219e2f !important" @endif>
                                Somalia
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    @if (Auth::guest())


        <!-- BEGIN # MODAL LOGIN -->
            <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
                 aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal_position">
                    <div class="modal-content">

                        <!-- Begin # DIV Form -->
                        <div id="div-forms">

                            <!-- Begin # Login Form -->
                            <form id="login-form" method="POST" action="/auth/login">
                                {!! csrf_field() !!}
                                <div class="modal-body">
                                    <div class="login-top-line"
                                         style="border-bottom: 1px solid gainsboro; padding-bottom: 0.5em;">
                                        <span>{!! trans('form.log_in') !!}<br></span>
                                    </div>
                                    @include('flash')
                                    @include('errors')

                                    <input type="text" name="mobile" id="login_username" class="form-control"
                                           value="{{ old('mobile') }}" placeholder="{!! trans('form.mobile_number') !!}" required>

                                    <input id="login_password" class="form-control" type="password"
                                           name="password" placeholder="{!! trans('form.password') !!}" required>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" id="remember"> {!! trans('form.remember_me') !!}
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div>
                                        <button type="submit" class="btn btn-primary btn-lg btn-block button-bg-color">
                                            {!! trans('buttons.login') !!}
                                        </button>
                                    </div>
                                    <div>
                                        <button id="login_lost_btn2" type="button" class="btn btn-link">
                                            {!! trans('label.lost_password') !!}?
                                        </button>
                                        {{--<button id="login_register_btn" type="button" class="btn btn-link">Register
                                        </button>--}}
                                        <button id="login_register_btn2" type="button" class="btn btn-link">{!! trans('form.register') !!}</button>
                                        {{--data-toggle="modal" href="#login-modal"--}}
                                    </div>
                                </div>
                            </form>
                            <!-- End # Login Form -->
                        </div>
                        <!-- End # DIV Form -->
                    </div>
                </div>
            </div>
            <!-- END # MODAL LOGIN -->


            <!-- START # Registrat Modal -->
            <div class="modal fade" id="register_modal" tabindex="-2" role="dialog" aria-labelledby="registerModalLabel"
                 aria-hidden="true" style="display: none;">
                <!-- <div class="modal-dialog modal_position"> -->
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Begin # DIV Form -->
                        <div id="div-forms">

                            <!-- Begin | Register Form -->
                            <form id="register-form" method="POST" action="/auth/register" autocomplete="off">
                                {!! csrf_field() !!}
                                <div class="modal-body">
                                    <div class="login-top-line"
                                         style="border-bottom: 1px solid gainsboro; padding-bottom: 0.5em;">
                                        <span>{!! trans('label.register_an_account') !!}</span>
                                    </div>
                                    @include('flash')
                                    @include('errors')
                                    <input type="text" name="name" id="name" class="form-control"
                                           value="{{ old('name') }}" placeholder="{!! trans('form.first_name') !!}" required>

                                    <input type="text" name="last_name" id="last_name" class="form-control"
                                           value="{{ old('last_name') }}" placeholder="{!! trans('form.last_name') !!}" required>

                                    <input type="text" name="email" id="email" class="form-control"
                                           value="{{ old('email') }}" autocomplete="off" placeholder="{!! trans('form.e-mail') !!}" required>

                                    <input type="text" name="mobile" id="mobile" class="form-control"
                                           value="{{ old('mobile') }}" autocomplete="off" placeholder="{!! trans('form.phone_number') !!}"
                                           required>

                                    <input type="password" name="password" id="password" class="form-control"
                                           autocomplete="off" placeholder="{!! trans('form.password') !!}" required>
                                    <br>
                                    <div class="modal-footer">
                                        <div>
                                            <button type="submit"
                                                    class="btn btn-primary btn-lg btn-block button-bg-color">{!! trans('form.register') !!}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- End | Register Form -->
                        </div>
                        <!-- End # DIV Form -->
                    </div>
                </div>
            </div>

            <!-- END # Registrar Lost Password -->

            <div class="modal fade" id="lost-password-modal" tabindex="-3" role="dialog"
                 aria-labelledby="LostPasswordLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div id="div-forms">

                            <!-- Begin | Lost Password Form -->
                            <form method="POST" action="/auth/password/mobile" id="lost-form">
                                {!! csrf_field() !!}
                                <div class="modal-body">
                                    <div class="login-top-line"
                                         style="border-bottom: 1px solid gainsboro; padding-bottom: 0.5em;">
                                        <span>{!! trans('nav.lost_password') !!}</span>
                                    </div>
                                    @include('flash')
                                    @include('errors')
                                    <input type="text" name="mobile" id="mobile" class="form-control"
                                           placeholder="{!! trans('nav.your_mobile_number') !!}" value="{{ old('mobile') }}" required>
                                    <br>

                                    <div class="modal-footer">
                                        <div>
                                            <button type="submit"
                                                    class="btn btn-primary btn-lg btn-block button-bg-color">{!! trans('buttons.send') !!}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- End | Lost Password Form -->
                        </div>
                        <!-- End # DIV Form -->
                    </div>
                </div>
            </div>

        @endif
    </div>
</nav>


<script type="text/javascript">

    $('#viva_login').click(function () {
        $('#login-modal .modal-dialog').removeClass('modal_center').addClass('modal_position');
        $('#register_modal .modal-dialog').removeClass('modal_center').addClass('modal_position');
        $('#lost-password-modal .modal-dialog').removeClass('modal_center').addClass('modal_position');
        $('#login-modal').modal('show');

    });

    function lazyloadRegisterModal() {
        $('#register_modal').modal('show');
    }

    $('#login_register_btn2').click(function () {
        $('#login-modal').modal('hide');
        setTimeout(lazyloadRegisterModal, 350);
    })

    function lazyloadLostModal() {
        $('#lost-password-modal').modal('show');
    }

    $('#login_lost_btn2').click(function () {
        $('#login-modal').modal('hide');
        setTimeout(lazyloadLostModal, 350);
    });
    //lost-password-modal

    //this line is used to check if my web is in a i-frame
    //if so then make my web to the top of the window for preventing clickjack attack
    if (window != top) top.location.href = location.href;

</script>