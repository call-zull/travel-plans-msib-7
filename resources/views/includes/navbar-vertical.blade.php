 <!-- Sidebar -->
 <nav class="navbar-vertical navbar">
     <div class="nav-scroller">
         <!-- Brand logo -->
         <a class="navbar-brand" href="/">
             <img src="{{ asset('assets') }}/images/brand/logo/logo.svg" alt="" />
         </a>
         <!-- Navbar nav -->
         <ul class="navbar-nav flex-column" id="sideNavbar">
             <li class="nav-item">
                 <a class="nav-link has-arrow" href="/">
                     <i data-feather="home" class="nav-icon icon-xs me-2"></i> Dashboard
                 </a>

             </li>

             <!-- Nav item -->
             <li class="nav-item">
                 <div class="navbar-heading">Layouts & Pages</div>
             </li>

             <!-- Nav item -->
             <li class="nav-item">
                 <a class="nav-link has-arrow" href="#!" data-bs-toggle="collapse" data-bs-target="#navPages"
                     aria-expanded="false" aria-controls="navPages">
                     <i data-feather="layers" class="nav-icon icon-xs me-2">
                     </i> Pages
                 </a>

                 <div id="navPages" class="collapse" data-bs-parent="#sideNavbar">
                     <ul class="nav flex-column">
                         <li class="nav-item">
                             <a class="nav-link has-arrow" href="">
                                 Settings
                             </a>

                         </li>
                     </ul>
                 </div>

             </li>
         </ul>
     </div>
 </nav>
