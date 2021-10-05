<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">

            <ul>

                <li>
                    <a href="{{route('dashboard.index')}}"  class="waves-effect active">
                        <i class="zmdi zmdi-view-dashboard"></i><span> داشبورد </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('dashboard.admins.index')}}">
                        <i class="zmdi zmdi-calendar"></i>
                        <span> کاربران پنل </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard.users.index')}}">
                        <i class="zmdi zmdi-calendar"></i>
                        <span> کاربران سایت </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard.categories.index')}}">
                        <i class="zmdi zmdi-calendar"></i>
                        <span> دسته بندی ها </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard.brands.index')}}">
                        <i class="zmdi zmdi-calendar"></i>
                        <span> برندها </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard.products.index')}}">
                        <i class="zmdi zmdi-calendar"></i>
                        <span> محصولات </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('dashboard.provinces.index')}}">
                        <i class="zmdi zmdi-calendar"></i>
                        <span> استان ها </span>
                    </a>
                </li>

                <li>
                    <a href="{{route('dashboard.cities.index')}}">
                        <i class="zmdi zmdi-calendar"></i>
                        <span> شهرها </span>
                    </a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
@yield('left-sidebar')
