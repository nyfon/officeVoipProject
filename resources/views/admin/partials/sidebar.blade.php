<div class="page-sidebar" id="sidebar">

    <!-- /Page Sidebar Header -->
    <!-- Sidebar Menu -->
    <ul class="nav sidebar-menu">

        <!--Dashboard-->
        <li>
            <a href="{{ route('admin.panel.index') }}">
                <i class="menu-icon glyphicon glyphicon-home"></i>
                <span class="menu-text"> داشبورد </span>
            </a>
        </li>

        <li class="">
            <a href="{{ route('admin.reservedVirtualNumber.index') }}">
                <i class="menu-icon glyphicon glyphicon-home"></i>
                <span class="menu-text"> شماره مجازی </span>
            </a>
        </li>

        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-table"></i>
                <span class="menu-text">سرویس ها</span>

                <i class="menu-expand"></i>
            </a>

            <ul class="submenu">
                <li>
                    <a href="{{ route('admin.service.index', 'active') }}">
                        <span class="menu-text">سرویس های فعال</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.service.index', 'inactive') }}">
                        <span class="menu-text">سرویس های غیر فعال</span>
                    </a>
                </li>

            </ul>
        </li>


        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-table"></i>
                <span class="menu-text"> پزشکان </span>

                <i class="menu-expand"></i>
            </a>

            <ul class="submenu">
                <li>
                    <a href="{{ route('admin.doctor.index') }}">
                        <span class="menu-text">همه پزشکان</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.doctor.create') }}">
                        <span class="menu-text">افزودن پزشک</span>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-table"></i>
                <span class="menu-text">بیماران</span>

                <i class="menu-expand"></i>
            </a>

            <ul class="submenu">
                <li>
                    <a href="{{ route('admin.patient.index') }}">
                        <span class="menu-text">همه بیماران</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.patient.create') }}">
                        <span class="menu-text">افزودن بیمار</span>
                    </a>
                </li>
            </ul>
        </li>



        <!--Tables-->

    </ul>
    <!-- /Sidebar Menu -->
</div>
