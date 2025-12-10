<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="{{ url('/admin/dashboard') }}" class="brand-link">
            <!--begin::Brand Image-->
            <img src="{{ asset('admin/assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Admin</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                aria-label="Main navigation" data-accordion="false" id="navigation">
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Category
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/admin/list/category')}}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/create/category')}}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Sub Category
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/admin/list/sub-category')}}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/create/sub-category')}}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Product
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/admin/list/product')}}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/create/product')}}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Orders
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/admin/show-orders/all')}}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>All Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/show-orders/pending')}}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Pending Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/show-orders/confirmed')}}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Confirmed Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/show-orders/delivered')}}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Delivered Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/show-orders/cancelled')}}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Cancelled Orders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/show-orders/returned')}}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Returned Orders</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Settings
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/admin/show-general-setting')}}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>General Setting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/show-policies')}}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Policies</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin/show-contact-massages')}}" class="nav-link">
                        <i class="nav-icon bi bi-palette"></i>
                        <p>Contact Messages</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('/admin/logout')}}" class="nav-link">
                        <i class="nav-icon bi bi-palette"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
