<aside id="aside" class="app-aside hidden-xs bg-dark">
    <div class="aside-wrap">
        <div class="navi-wrap">

            <!-- user -->
            <div class="clearfix hidden-xs text-center hide" id="aside-user">
                <div class="dropdown wrapper">
                    <a href="app.page.profile">
                        <span class="thumb-lg w-auto-folded avatar m-t-sm">
                            <img src="{{ getMediaUrl('img/a0.jpg') }}" class="img-full" alt="...">
                        </span>
                    </a>
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle hidden-folded">
                        <span class="clear">
                            <span class="block m-t-sm">
                                <strong class="font-bold text-lt">John.Smith</strong>
                                <b class="caret"></b>
                            </span>
                            <span class="text-muted text-xs block">Art Director</span>
                        </span>
                    </a>
                    <!-- dropdown -->
                    <ul class="dropdown-menu animated fadeInRight w hidden-folded">
                        <li class="wrapper b-b m-b-sm bg-info m-t-n-xs">
                            <span class="arrow top hidden-folded arrow-info"></span>
                            <div>
                                <p>300mb of 500mb used</p>
                            </div>
                            <div class="progress progress-xs m-b-none dker">
                                <div class="progress-bar bg-white" data-toggle="tooltip" data-original-title="50%" style="width: 50%"></div>
                            </div>
                        </li>
                        <li>
                            <a href>Settings</a>
                        </li>
                        <li>
                            <a href="page_profile.html">Profile</a>
                        </li>
                        <li>
                            <a href>
                                <span class="badge bg-danger pull-right">3</span> Notifications
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="page_signin.html">Logout</a>
                        </li>
                    </ul>
                    <!-- / dropdown -->
                </div>
                <div class="line dk hidden-folded"></div>
            </div>
            <!-- / user -->

            <!-- nav -->
            <nav ui-nav class="navi clearfix">
                <ul class="nav">
                    @if( isSuperAdmin() )
                    <li class="dashboard-menu">
                        <a href="{{ route('home') }}">
                            <i class="glyphicon glyphicon-stats icon text-primary-dker"></i>
                            <span class="font-bold">Dashboard</span>
                        </a>
                    </li>
                    @endif
                    @if( isAuth('AdminUser', 'index') )
                        <li class="adminuser-menu">
                            <a href="{{ route('admin.adminUsers.index') }}">
                                <i class="icon-users icon font-bold icon "></i>
                                <span class="font-bold">Admin Users</span>
                            </a>
                        </li>
                    @endif

                    @if( isAuth('Item', 'stocks') )
                    <li class="stockmanagement-menu">
                        <a href="{{ route('admin.items.stocks') }}">
                            <i class="glyphicon glyphicon-equalizer icon text-info-lter"></i>
                            <span class="font-bold">Warehouse Management</span>
                        </a>
                    </li>
                    @endif

                    @if( isAuth('Report', 'index') )
                        <li class="report-menu">
                            <a href="{{ route('admin.reports.index') }}">
                                <i class="glyphicon glyphicon-th-list icon text-info-lter"></i>
                                <span class="font-bold">Reports</span>
                            </a>
                        </li>
                    @endif

                    @if(
                        isAuth('Item', 'index') ||
                        isAuth('Store', 'index') ||
                        isAuth('Vendor', 'index') ||
                        isAuth('Unit', 'index') ||
                        isAuth('ItemType', 'index') ||
                        isAuth('Location', 'index')
                    )
                    <li class="master-menu">
                        <a href="#">
                            <i class="glyphicon glyphicon-briefcase icon text-muted"></i>
                            <span class="font-bold">Master</span>
                        </a>
                        <ul class="nav nav-sub dk">

                            <li class="itemlist-menu">
                                <a href="{{ route('admin.itemMasters.index') }}">
                                    <span>Item Master</span>
                                </a>
                            </li>

                            @if( isAuth('Item', 'index') )
                            <li class="stocklist-menu">
                                <a href="{{ route('admin.items.index') }}">
                                    <span>Stock List</span>
                                </a>
                            </li>
                            @endif

                            @if( isAuth('Store', 'index') )
                            <li class="store-menu">
                                <a href="{{ route('admin.stores.index') }}">
                                    <span>Warehouses</span>
                                </a>
                            </li>
                            @endif

                            {{-- @if( isAuth('Vendor', 'index') )
                            <li class="vendor-menu">
                                <a href="{{ route('admin.vendors.index') }}">
                                    <span>Vendors</span>
                                </a>
                            </li>
                            @endif --}}

                            @if( isAuth('Unit', 'index') )
                            <li class="unit-menu">
                                <a href="{{ route('admin.units.index') }}">
                                    <span>Units</span>
                                </a>
                            </li>
                            @endif

                            @if( isAuth('ItemType', 'index') )
                            <li class="stock-menu">
                                <a href="{{ route('admin.itemTypes.index') }}">
                                    <span>Item Type</span>
                                </a>
                            </li>
                            @endif

                            @if( isAuth('Location', 'index') )
                            <li class="location-menu">
                                <a href="{{ route('admin.locations.index') }}">
                                    <span>Location</span>
                                </a>
                            </li>
                            @endif

                        </ul>
                    </li>
                    @endif

                    <li class="line dk"></li>
                </ul>
            </nav>
            <!-- nav -->
        </div>
    </div>
</aside>