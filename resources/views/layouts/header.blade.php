<div class="header">
    <!-- navbar -->
    <nav class="navbar-classic navbar navbar-expand-lg">
        <a id="nav-toggle" href="#"><i class="nav-icon me-2 icon-xs">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                </svg>
            </i></a>
        <div class="ms-lg-3 d-none d-md-none d-lg-block">
            <!-- Form -->
            <form class="d-flex align-items-center">
                <input type="search" class="form-control" placeholder="Search" />
            </form>
        </div>

        <!--Navbar nav -->
        <ul class="navbar-nav navbar-right-wrap ms-auto d-flex nav-top-wrap">

            <li class="dropdown stopevent">
                <a class="btn btn-light btn-icon rounded-circle indicator
                  indicator-primary text-muted"
                    href="#" role="button" id="dropdownNotification" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="icon-xs">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-bell" viewBox="0 0 16 16">
                            <path
                                d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6" />
                        </svg>
                    </i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end" aria-labelledby="dropdownNotification">
                    <div class="">
                        <div
                            class="border-bottom px-3 pt-2 pb-3 d-flex
                      justify-content-between align-items-center">
                            <p class="mb-0 text-dark fw-medium fs-4">Notifications</p>
                            <a href="#" class="text-muted">
                                <span>
                                    <i class="me-1 icon-xxs" data-feather="settings"></i>
                                </span>
                            </a>
                        </div>
                        <!-- List group -->
                        <ul class="list-group list-group-flush notification-list-scroll">
                            <!-- List group item -->
                            <li class="list-group-item bg-light">


                                <a href="#" class="text-muted">
                                    <h5 class="fw-bold mb-1">Rishi Chopra</h5>
                                    <p class="mb-0">
                                        Mauris blandit erat id nunc blandit, ac eleifend dolor pretium.
                                    </p>
                                </a>
                            </li>
                            <!-- List group item -->
                            <li class="list-group-item">


                                <a href="#" class="text-muted">
                                    <h5 class="fw-bold mb-1">Neha Kannned</h5>
                                    <p class="mb-0">
                                        Proin at elit vel est condimentum elementum id in ante. Maecenas et sapien
                                        metus.
                                    </p>
                                </a>
                            </li>
                            <!-- List group item -->
                            <li class="list-group-item">


                                <a href="#" class="text-muted">
                                    <h5 class="fw-bold mb-1">Nirmala Chauhan</h5>
                                    <p class="mb-0">
                                        Morbi maximus urna lobortis elit sollicitudin sollicitudieget elit vel pretium.
                                    </p>
                                </a>
                            </li>
                            <!-- List group item -->
                            <li class="list-group-item">


                                <a href="#" class="text-muted">
                                    <h5 class="fw-bold mb-1">Sina Ray</h5>
                                    <p class="mb-0">
                                        Sed aliquam augue sit amet mauris volutpat hendrerit sed nunc eu diam.
                                    </p>
                                </a>
                            </li>
                        </ul>
                        <div class="border-top px-3 py-2 text-center">
                            <a href="#" class="text-inherit fw-semi-bold">
                                View all Notifications
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <!-- List -->
            <li class="dropdown ms-2">
                <a class="rounded-circle" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md avatar-indicators avatar-online">
                        <img alt="avatar" src="{{ asset('assets') }}/images/avatar/avatar-1.jpg"
                            class="rounded-circle" />
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                    <div class="px-4 pb-0 pt-2">
                        <div class="lh-1 ">
                            <h5 class="mb-1"> {{ Auth::user()->name }}</h5>
                            <a href="#" class="text-inherit fs-6">View my profile</a>
                        </div>
                        <div class=" dropdown-divider mt-3 mb-2"></div>
                    </div>

                    <ul class="list-unstyled">

                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="me-2 icon-xxs dropdown-item-icon" data-feather="user"></i>Edit
                                Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="me-2 icon-xxs dropdown-item-icon" data-feather="activity"></i>Activity Log
                            </a>
                        </li>

                        <li>
                            <a class="dropdown-item text-primary" href="#">
                                <i class="me-2 icon-xxs text-primary dropdown-item-icon" data-feather="star"></i>Go Pro
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="me-2 icon-xxs dropdown-item-icon" data-feather="settings"></i>Account
                                Settings
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <i class="me-2 icon-xxs dropdown-item-icon" data-feather="power"></i>Sign Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>

                </div>
            </li>
        </ul>
    </nav>
</div>
