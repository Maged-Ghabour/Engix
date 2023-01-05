 <!-- Sidebar -->
 <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
             <img src={{ asset('Dashboard/dist/img/LOGO.png') }} class="img-circle elevation-2" alt="User Image">
         </div>
         <div class="info">
             <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
             <form action="{{ route('dashboard.Admin.Logout') }}" method="post">
                 @csrf
                 <button class="btn btn-outline-danger my-2">تسجيل الخروج</button>
             </form>
         </div>
     </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
             <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

             <!--- Start Categories --->
             @foreach ($items as $item)
                 <li
                     class="nav-item has-treeview {{ $item['route1'] == $active || $item['route2'] == $active ? 'menu-open' : 'menu-close' }} ">
                     <a href=""
                         class="nav-link {{ $item['route1'] == $active || $item['route2'] == $active ? 'active' : '' }}">
                         <i class="{{ $item['icon'] }}"></i>
                         <p>
                             {{ $item['head'] }}
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>

                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route($item['route1']) }}"
                                 class="nav-link {{ $item['route1'] == $active ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>{{ $item['title1'] }}</p>
                             </a>
                         </li>
                     </ul>

                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route($item['route2']) }}"
                                 class="nav-link {{ $item['route2'] == $active ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>{{ $item['title2'] }}</p>
                             </a>
                         </li>
                     </ul>

                  @if(isset($item['title3']))
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route($item['route3']) }}"
                                class="nav-link {{ $item['route3'] == $active ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ $item['title3'] }}</p>
                            </a>
                        </li>
                    </ul>
                  @endif


                 </li>
             @endforeach



             <!--- End Catefories --->

            <!-- Start Logout --->
             <li class="nav-item has-treeview">
                <a href="" class="nav-link">
                    <form action="{{ route('dashboard.settings.index') }}" method="post">
                        @csrf
                        <i class="fas fa-user-cog"></i>
                        <button class="btn btn-link text-white m-0 p-0 text-decoration-none"> اعدادت الموقع</button>
                    </form>
                </a>
            </li>

             <!-- End Logout --->

              <!-- Start Settings --->
              <li class="nav-item has-treeview">
                <a href="" class="nav-link">
                    <form action="{{ route('dashboard.Admin.Logout') }}" method="post">
                        @csrf
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <button class="btn btn-link text-white m-0 p-0 text-decoration-none">تسجيل الخروج</button>
                    </form>
                </a>
            </li>
              <!-- End  Settings --->















         </ul>
     </nav>
     <!-- /.sidebar-menu -->
 </div>
 <!-- /.sidebar -->
