
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column p-0">
                    <li class="nav-divider">
                        منو
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-users"></i> مدیریت مشتریان </a>
                        <div id="submenu-2" class="collapse px-0 submenu" style="">
                            <ul class="nav flex-column pr-4">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('customers')}}"> <i class="fa fa-fw fa-list"></i> لیست مشتریان </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('customers/create')}}"> <i class="fa fa-fw fa-user-plus"></i> اضافه کردن مشتری </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
