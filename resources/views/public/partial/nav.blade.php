{{--
{{route('users.index')}}
--}}

<!-- HEADER MENU -->
<nav class="header_menu">
    <ul class="menu">
        <li class="current-menu-item">
            <a href="{{URL::to('/')}}">Home <span class="fa fa-caret-down"></span></a>
            <ul class="sub-menu">
                <li class="current-menu-item"><a href="index.html">Home 1</a></li>
                <li><a href="{{URL::to('/')}}">Home 2</a></li>
            </ul>
        </li>
        <li><a href="{{URL::to('/')}}">About</a></li>

        <li>
            <a href="#">Room <span class="fa fa-caret-down"></span></a>
            <ul class="sub-menu">
                <li><a href="{{URL::to('/')}}">Room 1</a></li>
                <li><a href="{{URL::to('/')}}">Room 2</a></li>
                <li><a href="{{URL::to('/')}}">Room 3</a></li>
                <li><a href="{{URL::to('/')}}">Room 4</a></li>
                <li><a href="{{URL::to('/')}}">Room 5</a></li>
                <li><a href="{{URL::to('/')}}">Room 6</a></li>
                <li><a href="{{URL::to('/')}}">Room Detail</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Restaurant <span class="fa fa-caret-down"></span></a>
            <ul class="sub-menu">
                <li><a href="{{URL::to('/')}}">Restaurant 1</a></li>
                <li><a href="{{URL::to('/')}}">Restaurant 2</a></li>
                <li><a href="{{URL::to('/')}}">Restaurant 3</a></li>
                <li><a href="{{URL::to('/')}}">Restaurant 4</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Reservation <span class="fa fa-caret-down"></span></a>
            <ul class="sub-menu">
                <li><a href="{{URL::to('/')}}">Reservation Step 1</a></li>
                <li><a href="{{URL::to('/')}}">Reservation Step 2</a></li>
                <li><a href="{{URL::to('/')}}">Reservation Step 3</a></li>
                <li><a href="{{URL::to('/')}}">Reservation Step 4</a></li>
                <li><a href="{{URL::to('/')}}">Reservation Step 5</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Page <span class="fa fa-caret-down"></span></a>
            <ul class="sub-menu">
                <li>
                    <a href="#">Guest Book <span class="fa fa-caret-right"></span></a>
                    <ul class="sub-menu">
                        <li><a href="{{URL::to('/')}}">Guest Book 1</a></li>
                        <li><a href="{{URL::to('/')}}">Guest Book 2</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#">Event <span class="fa fa-caret-right"></span></a>
                    <ul class="sub-menu">
                        <li><a href="{{URL::to('/')}}">Events</a></li>
                        <li><a href="{{URL::to('/')}}">Events Fullwidth</a></li>
                        <li><a href="{{URL::to('/')}}">Events Detail</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{URL::to('/')}}">Attractions</a>
                </li>
                <li>
                    <a href="#">Term Condition <span class="fa fa-caret-right"></span></a>
                    <ul class="sub-menu">
                        <li><a href="{{URL::to('/')}}">Term Condition 1</a></li>
                        <li><a href="{{URL::to('/')}}">Term Condition 2</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Activiti <span class="fa fa-caret-down"></span></a>
                    <ul class="sub-menu">
                        <li><a href="{{URL::to('/')}}">Activiti</a></li>
                        <li><a href="{{URL::to('/')}}">Activiti Detail</a></li>
                    </ul>
                </li>
                <li><a href="{{URL::to('/')}}">Check Out</a></li>
                <li><a href="{{URL::to('/')}}">ShortCode</a></li>
                <li><a href="{{URL::to('/')}}">404 Page</a></li>
                <li><a href="{{URL::to('/')}}">Comming Soon</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Gallery <span class="fa fa-caret-down"></span></a>
            <ul class="sub-menu">
                <li><a href="{{URL::to('/')}}">Gallery Style 1</a></li>
                <li><a href="{{URL::to('/')}}">Gallery Style 2</a></li>
                <li><a href="{{URL::to('/')}}">Gallery Style 3</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Blog <span class="fa fa-caret-down"></span></a>
            <ul class="sub-menu">
                <li><a href="{{URL::to('/')}}">Blog</a></li>
                <li><a href="{{URL::to('/')}}">Blog Detail</a></li>
                <li><a href="{{URL::to('/')}}">Blog Detail Fullwidth</a></li>
            </ul>
        </li>
        <li><a href="{{URL::to('/')}}">Contact</a></li>
    </ul>
</nav>
<!-- END / HEADER MENU -->