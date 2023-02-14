 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">Admin</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">Alexander Pierce</a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <li class="nav-item menu-open">
                   
                 <li class="nav-item">
                <a href="#" class="nav-link">
                    <p>
                        Member
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ url('register_member') }}" class="nav-link">
                            <p>
                                {{ __('Registration') }}
                            </p>
                        </a>
                        <a href="{{ url('User_Active') }}" class="nav-link">
                            <p>
                                {{ __('User Active') }}
                            </p>
                        </a>
                        <a href="{{ url('Student_details') }}" class="nav-link">
                            <p>
                                {{ __('Users Details') }}
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <p>
                        Course
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{ url('Courses_view') }}" class="nav-link">
                            <p>
                                {{ __('Course') }}
                            </p>
                        </a>
                        <li class="nav-item">
                            <a href="{{ url('Courses_add') }}" class="nav-link">
                                <p>
                                    {{ __('Courses Add') }}
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a href="{{url('Courses_Registration_Member') }}" class="nav-link">
                            <p>
                                {{ __('Course Registration') }}
                            </p>
                        </a>
                        </li>
                    </li>
                </ul>
            </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>