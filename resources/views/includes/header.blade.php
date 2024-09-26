<div class="header">
    <!-- navbar -->
    <nav class="navbar-classic navbar navbar-expand-lg">
        <!--Navbar nav -->
        <ul class="navbar-nav navbar-right-wrap ms-auto d-flex nav-top-wrap">
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
                            {{-- <a href="#" class="text-inherit fs-6">View my profile</a> --}}
                        </div>
                        <div class=" dropdown-divider mt-3 mb-2"></div>
                    </div>

                    <ul class="list-unstyled">

                        <li>
                            <a class="dropdown-item" href="{{ route('log-viewer') }}">
                                <i class="me-2 icon-xxs dropdown-item-icon" data-feather="settings"></i>Log-Viewer
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
