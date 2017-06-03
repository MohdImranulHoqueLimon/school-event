<div class="profile-sidebar">
    <!-- SIDEBAR USERPIC -->
    <div class="profile-userpic">
        <img src="{{asset(auth()->user()->avatar_url)}}" class="img-responsive" alt="">
    </div>
    <!-- END SIDEBAR USERPIC -->
    <!-- SIDEBAR USER TITLE -->
    <div class="profile-usertitle">
        <div class="profile-usertitle-name">
            {{auth()->user()->name}}
        </div>
        <div class="profile-usertitle-job">
            {{auth()->user()->mobile}}
        </div>
    </div>
    <!-- END SIDEBAR USER TITLE -->

    <!-- SIDEBAR MENU -->
    <div class="profile-usermenu">
        <ul class="nav">
            <li @if(request()->is('dashboard')) class="active" @endif>
                <a href="{{route('dashboard')}}"><i class="glyphicon glyphicon-dashboard"></i>
                    {!! trans('label.dashboard') !!}
                </a>
            </li>
            <li @if(request()->is('users/me')) class="active" @endif>
                <a href="{{route('my-profile')}}">
                    <i class="glyphicon glyphicon-user"></i>{!! trans('side_bar.my_profile') !!}
                </a>
            </li>

            <li class="collapsed">

                <a href="javascript:;" data-toggle="collapse" data-target="#subscription-management-settings">
                    <i class="glyphicon glyphicon-user"></i> {!! trans('side_bar.subscription') !!}
                    <span class="arrow"></span>
                </a>

                <ul class="nav collapse @if(active_menu('subscription_management')) in @endif extra-padding"
                    id="subscription-management-settings">

                    <li class="@if(Request::is('users/subscription/sdf')) active @endif">
                        <a href="{!! route('sdf.index') !!}">{!! trans('side_bar.vas') !!}</a>
                    </li>
                    <li class="@if(Request::is('users/newspaper')) active @endif">
                        <a href="{!! route('newspaper.index') !!}">{!! trans('side_bar.news_papers') !!}</a>
                    </li>

                    {{--<li class="@if(Request::is('users/subscription/groupy')) active @endif"><a
                                href="{!! route('groupy.index') !!}">Groupy</a></li>--}}
                </ul>

            </li>

            <li @if(request()->is('users/me/contacts')) class="active" @endif>
                <a href="{{url('/users/me/contacts')}}">
                    <i class="glyphicon glyphicon-file"></i>
                    {!! trans('side_bar.my_contacts') !!}
                </a>
            </li>

            <li @if(request()->is('users/me/inbox')) class="active" @endif>
                <a href="{{url('/users/me/inbox')}}">
                    <i class="glyphicon glyphicon-file"></i>
                    {!! trans('side_bar.my_inbox') !!}
                    <span style="display: none" id="total_message" class="badge"></span>
                </a>
            </li>

            <li @if(request()->is('users/me/highlights')) class="active" @endif>
                <a href="{{url('/users/me/highlights')}}"><i class="glyphicon glyphicon-sd-video"></i>
                    {!! trans('side_bar.highlights') !!}
                </a>
            </li>
            <li @if(request()->is('support*')) class="active" @endif>
                <a href="{{route('support.tickets.active')}}">
                    <i class="glyphicon glyphicon-flag"></i>{!! trans('side_bar.support') !!}
                </a>
            </li>

            <li @if(request()->is('users/me/settings*')) class="active" @endif>
                <a href="{{url('/users/me/settings')}}"><i class="glyphicon glyphicon-cog"></i>
                    {!! trans('side_bar.settings') !!}
                </a>
            </li>


        </ul>
    </div>
    <!-- END MENU -->

    <script>
        getMessageCount();
        function getMessageCount() {
            $.ajax({
                url: "/getMessageCount",
                type: "GET",
                success: function (data) {
                    if (data == 0) {
                        $('#total_message').hide();
                    } else {
                        $('#total_message').show();
                        $('#total_message').html(data);
                    }
                }
            });
        }
        setInterval(getMessageCount, 60000);
    </script>
</div>