<ul class="nav navbar-nav navbar-right">
    <li>
        <!-- Notification -->
        <div class="notification-box">
            <ul class="list-inline m-b-0">
                <li>
                    <a href="javascript:void(0);" class="right-bar-toggle">
                        <i class="zmdi zmdi-notifications-none"></i>
                    </a>
                    <div class="noti-dot">
                        <span class="dot"></span>
                        <span class="pulse"></span>
                    </div>
                </li>
            </ul>
        </div>
        <!-- End Notification bar -->
    </li>
    <li class="hidden-xs">
        <form role="search" class="app-search">
            <input type="text" placeholder="به دنبال چه می گردی ؟؟؟"
                   class="form-control">
            <a href=""><i class="fa fa-search"></i></a>
        </form>
    </li>
</ul>
@yield('navbar-right')
