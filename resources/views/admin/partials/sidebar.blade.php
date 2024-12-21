<!-- Sidebar -->
<div class="sidebar" data-background-color="white">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="orange">
            <a href="{{url('/')}}" class="logo text-white">
                <h2> CareTaker</h2>
                {{--                <img--}}
                {{--                    src="{{asset('assets/img/kaiadmin/logo_light.svg')}}"--}}
                {{--                    alt="navbar brand"--}}
                {{--                    class="navbar-brand"--}}
                {{--                    height="20"--}}
                {{--                />--}}
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                {{--                <li class="nav-item active">--}}
                {{--                    <a--}}
                {{--                        data-bs-toggle="collapse"--}}
                {{--                        href="#dashboard"--}}
                {{--                        class="collapsed"--}}
                {{--                        aria-expanded="false"--}}
                {{--                    >--}}
                {{--                        <i class="fas fa-home"></i>--}}
                {{--                        <p>Dashboard</p>--}}
                {{--                        <span class="caret"></span>--}}
                {{--                    </a>--}}
                {{--                    <div class="collapse" id="dashboard">--}}
                {{--                        <ul class="nav nav-collapse">--}}
                {{--                            <li>--}}
                {{--                                <a href="{{url('/')}}">--}}
                {{--                                    <span class="sub-item">Dashboard 1</span>--}}
                {{--                                </a>--}}
                {{--                            </li>--}}
                {{--                        </ul>--}}
                {{--                    </div>--}}
                {{--                </li>--}}
                <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                    <h4 class="text-section">Components</h4>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>User Management</p>
                        <span class="caret"></span>
                    </a>
                    <div
                        class="collapse{{isset($currentPage) && $currentPage == 'employers' || $currentPage == 'employee'?'show':''}}"
                        id="base">
                        <ul class="nav nav-collapse">
                            <li class="{{isset($currentPage) && $currentPage == 'employee' ?'active':''}}">
                                <a
                                    href="{{route('allUsers')}}">
                                    <span class="sub-item">Employee</span>
                                </a>
                            </li>
                            <li class="{{isset($currentPage) && $currentPage == 'employers' ?'active':''}}">
                                <a
                                    href="{{route('allCarees')}}">
                                    <span class="sub-item">Employers</span>
                                </a>
                            </li>
                            {{--                            <li>--}}
                            {{--                                <a href="#">--}}
                            {{--                                    <span class="sub-item">Deleted Users</span>--}}
                            {{--                                </a>--}}
                            {{--                            </li>--}}
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{isset($currentPage) && $currentPage == 'Country' ?'active':''}}">
                    <a href="{{route('country.all')}}">
                        <i class="fas fa-list"></i>
                        <p>Countries</p>
                        {{--                        <span class="badge badge-secondary">1</span>--}}
                    </a>
                </li>
                <li class="nav-item {{isset($currentPage) && $currentPage == 'State' ?'active':''}}">
                    <a href="{{route('state.all')}}">
                        <i class="fas fa-list"></i>
                        <p>State</p>
                        {{--                        <span class="badge badge-secondary">1</span>--}}
                    </a>
                </li>
                <li class="nav-item {{isset($currentPage) && $currentPage == 'City' ?'active':''}}">
                    <a href="{{route('city.all')}}">
                        <i class="fas fa-list"></i>
                        <p>City</p>
                        {{--                        <span class="badge badge-secondary">1</span>--}}
                    </a>
                </li>
                {{--                <li class="nav-item">--}}
                {{--                    <a data-bs-toggle="collapse" href="#sidebarLayouts">--}}
                {{--                        <i class="fas fa-th-list"></i>--}}
                {{--                        <p>Sidebar Layouts</p>--}}
                {{--                        <span class="caret"></span>--}}
                {{--                    </a>--}}
                {{--                    <div class="collapse" id="sidebarLayouts">--}}
                {{--                        <ul class="nav nav-collapse">--}}
                {{--                            <li>--}}
                {{--                                <a href="#">--}}
                {{--                                    <span class="sub-item">Sidebar Style 2</span>--}}
                {{--                                </a>--}}
                {{--                            </li>--}}
                {{--                            <li>--}}
                {{--                                <a href="#">--}}
                {{--                                    <span class="sub-item">Icon Menu</span>--}}
                {{--                                </a>--}}
                {{--                            </li>--}}
                {{--                        </ul>--}}
                {{--                    </div>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item">--}}
                {{--                    <a data-bs-toggle="collapse" href="#forms">--}}
                {{--                        <i class="fas fa-pen-square"></i>--}}
                {{--                        <p>Forms</p>--}}
                {{--                        <span class="caret"></span>--}}
                {{--                    </a>--}}
                {{--                    <div class="collapse" id="forms">--}}
                {{--                        <ul class="nav nav-collapse">--}}
                {{--                            <li>--}}
                {{--                                <a href="#">--}}
                {{--                                    <span class="sub-item">Basic Form</span>--}}
                {{--                                </a>--}}
                {{--                            </li>--}}
                {{--                        </ul>--}}
                {{--                    </div>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item">--}}
                {{--                    <a data-bs-toggle="collapse" href="#tables">--}}
                {{--                        <i class="fas fa-table"></i>--}}
                {{--                        <p>Tables</p>--}}
                {{--                        <span class="caret"></span>--}}
                {{--                    </a>--}}
                {{--                    <div class="collapse" id="tables">--}}
                {{--                        <ul class="nav nav-collapse">--}}
                {{--                            <li>--}}
                {{--                                <a href="#">--}}
                {{--                                    <span class="sub-item">Basic Table</span>--}}
                {{--                                </a>--}}
                {{--                            </li>--}}
                {{--                            <li>--}}
                {{--                                <a href="#">--}}
                {{--                                    <span class="sub-item">Datatables</span>--}}
                {{--                                </a>--}}
                {{--                            </li>--}}
                {{--                        </ul>--}}
                {{--                    </div>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item">--}}
                {{--                    <a data-bs-toggle="collapse" href="#maps">--}}
                {{--                        <i class="fas fa-map-marker-alt"></i>--}}
                {{--                        <p>Maps</p>--}}
                {{--                        <span class="caret"></span>--}}
                {{--                    </a>--}}
                {{--                    <div class="collapse" id="maps">--}}
                {{--                        <ul class="nav nav-collapse">--}}
                {{--                            <li>--}}
                {{--                                <a href="#">--}}
                {{--                                    <span class="sub-item">Google Maps</span>--}}
                {{--                                </a>--}}
                {{--                            </li>--}}
                {{--                            <li>--}}
                {{--                                <a href="#">--}}
                {{--                                    <span class="sub-item">Jsvectormap</span>--}}
                {{--                                </a>--}}
                {{--                            </li>--}}
                {{--                        </ul>--}}
                {{--                    </div>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item">--}}
                {{--                    <a data-bs-toggle="collapse" href="#charts">--}}
                {{--                        <i class="far fa-chart-bar"></i>--}}
                {{--                        <p>Charts</p>--}}
                {{--                        <span class="caret"></span>--}}
                {{--                    </a>--}}
                {{--                    <div class="collapse" id="charts">--}}
                {{--                        <ul class="nav nav-collapse">--}}
                {{--                            <li>--}}
                {{--                                <a href="#">--}}
                {{--                                    <span class="sub-item">Chart Js</span>--}}
                {{--                                </a>--}}
                {{--                            </li>--}}
                {{--                            <li>--}}
                {{--                                <a href="#">--}}
                {{--                                    <span class="sub-item">Sparkline</span>--}}
                {{--                                </a>--}}
                {{--                            </li>--}}
                {{--                        </ul>--}}
                {{--                    </div>--}}
                {{--                </li>--}}
                {{--                <li class="nav-item">--}}
                {{--                    <a href="#">--}}
                {{--                        <i class="fas fa-desktop"></i>--}}
                {{--                        <p>Widgets</p>--}}
                {{--                        <span class="badge badge-success">4</span>--}}
                {{--                    </a>--}}
                {{--                </li>--}}

                {{--                <li class="nav-item">--}}
                {{--                    <a data-bs-toggle="collapse" href="#submenu">--}}
                {{--                        <i class="fas fa-bars"></i>--}}
                {{--                        <p>Menu Levels</p>--}}
                {{--                        <span class="caret"></span>--}}
                {{--                    </a>--}}
                {{--                    <div class="collapse" id="submenu">--}}
                {{--                        <ul class="nav nav-collapse">--}}
                {{--                            <li>--}}
                {{--                                <a data-bs-toggle="collapse" href="#subnav1">--}}
                {{--                                    <span class="sub-item">Level 1</span>--}}
                {{--                                    <span class="caret"></span>--}}
                {{--                                </a>--}}
                {{--                                <div class="collapse" id="subnav1">--}}
                {{--                                    <ul class="nav nav-collapse subnav">--}}
                {{--                                        <li>--}}
                {{--                                            <a href="#">--}}
                {{--                                                <span class="sub-item">Level 2</span>--}}
                {{--                                            </a>--}}
                {{--                                        </li>--}}
                {{--                                        <li>--}}
                {{--                                            <a href="#">--}}
                {{--                                                <span class="sub-item">Level 2</span>--}}
                {{--                                            </a>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </li>--}}
                {{--                            <li>--}}
                {{--                                <a data-bs-toggle="collapse" href="#subnav2">--}}
                {{--                                    <span class="sub-item">Level 1</span>--}}
                {{--                                    <span class="caret"></span>--}}
                {{--                                </a>--}}
                {{--                                <div class="collapse" id="subnav2">--}}
                {{--                                    <ul class="nav nav-collapse subnav">--}}
                {{--                                        <li>--}}
                {{--                                            <a href="#">--}}
                {{--                                                <span class="sub-item">Level 2</span>--}}
                {{--                                            </a>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </li>--}}
                {{--                            <li>--}}
                {{--                                <a href="#">--}}
                {{--                                    <span class="sub-item">Level 1</span>--}}
                {{--                                </a>--}}
                {{--                            </li>--}}
                {{--                        </ul>--}}
                {{--                    </div>--}}
                {{--                </li>--}}
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
