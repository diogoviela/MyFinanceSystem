<div class="container-fluid">
    <div class="d-flex d-lg-none me-2">
        <button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
            <i class="ph-list"></i>
        </button>
    </div>


    <div class="navbar-collapse flex-lg-1 order-2 order-lg-1 collapse" id="navbar_search">
        <div class="navbar-search flex-fill dropdown mt-2 mt-lg-0">
            <div class="form-control-feedback form-control-feedback-start flex-grow-1">

                <div class="position-static">
                </div>
            </div>
        </div>
    </div>

    <ul class="nav hstack gap-sm-1 flex-row justify-content-end order-1 order-lg-2">

        <li class="nav-item nav-item-dropdown-lg dropdown">
            <a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
                <div class="status-indicator-container">
                    <img src="/avatars/{{ Auth::user()->avatar }}"
                         class="w-32px h-32px rounded-pill" alt="">
                    <span class="status-indicator bg-success"></span>
                </div>
                <span class="d-none d-lg-inline-block mx-lg-2">{{ Auth::user()->name }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-end">
                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                    <i class="ph-user-circle me-2"></i>
                    My profile
                </a>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="dropdown-item">
                    <i class="ph-sign-out me-2"></i>
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</div>
