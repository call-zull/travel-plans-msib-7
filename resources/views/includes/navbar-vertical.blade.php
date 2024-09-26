 <!-- Sidebar -->
 <nav class="navbar-vertical navbar">
     <div class="nav-scroller">
         <!-- Brand logo -->
         <a class="navbar-brand" href="/">
             <img src="{{ asset('assets') }}/images/brand/logo/logo.svg" alt="" />
         </a>
         <!-- Navbar nav -->
         <ul class="navbar-nav flex-column" id="sideNavbar">
            {{-- navbar dashboard --}}
             <li class="nav-item">
                 <a class="nav-link has-arrow" href="/">
                     <i data-feather="home" class="nav-icon icon-xs me-2"></i> Dashboard
                 </a>
             </li>
            {{-- navbar travel plan --}}
             <li class="nav-item">
                 <a class="nav-link has-arrow" href="/travel-plans">
                     <i data-feather="calendar" class="nav-icon icon-xs me-2"></i> Travel Plans
                 </a>
             </li>
         </ul>
     </div>
 </nav>
