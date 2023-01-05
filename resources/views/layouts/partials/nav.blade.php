 {{-- <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src={{asset('Dashboard/dist/img/LOGO.png')}} class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
            <form action="{{route('logout')}}" method="post">
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
          <li class="nav-item has-treeview menu-open">
            <a href="" class="nav-link ">
              <i class="nav-icon fas fa-store"></i>
              <p>
                       التصنيفات
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('dashboard.categories.index')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>جميع التصنيفات</p>
                  </a>
                </li>
              </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('dashboard.categories.create')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>إضافة تصنيف جديد</p>
                </a>
              </li>
            </ul>
          </li>
               <!--- End Catefories --->

            <!--- Start Products --->
            <li class="nav-item has-treeview menu-open">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-bullhorn"></i>
                    <p>
                            المنتجات
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('dashboard.products.index')}}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>جميع المنتجات</p>
                        </a>
                    </li>
                    </ul>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{route('dashboard.products.create')}}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>إضافة منتج جديد</p>
                    </a>
                    </li>
                </ul>
            </li>
                <!--- End products --->

            <!--- Start Users --->
            <li class="nav-item has-treeview menu-open">
                <a href="" class="nav-link ">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                            المستخدمين
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('dashboard.products.index')}}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>جميع المستخدمين</p>
                        </a>
                    </li>
                    </ul>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{route('dashboard.products.create')}}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>إضافة مستخدم جديد</p>
                    </a>
                    </li>
                </ul>
            </li>
                <!--- End Users --->


                <!--- Start Sales --->
            <li class="nav-item has-treeview menu-open">
                <a href="" class="nav-link active">
                    <i class="nav-icon fas fa-gift"></i>
                    <p>
                            العروض
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('dashboard.products.index')}}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>جميع المستخدمين</p>
                        </a>
                    </li>
                    </ul>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{route('dashboard.products.create')}}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>إضافة مستخدم جديد</p>
                    </a>
                    </li>
                </ul>
            </li>
                <!--- End Sales --->


            <!--- Start Jobs --->
            <li class="nav-item has-treeview menu-open">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-hourglass"></i>
                    <p>
                            الوظائف
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('dashboard.products.index')}}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>جميع الوظائف</p>
                        </a>
                    </li>
                    </ul>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{route('dashboard.products.create')}}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>إضافة وظيفة جديدة</p>
                    </a>
                    </li>
                </ul>
            </li>
                <!--- End Jobs --->


                        <!--- Start customers --->
            <li class="nav-item has-treeview menu-open">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>
                            عملاؤنا
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('dashboard.products.index')}}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>جميع العملاء</p>
                        </a>
                    </li>
                    </ul>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{route('dashboard.products.create')}}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>إضافة عميل جديد</p>
                    </a>
                    </li>
                </ul>
            </li>
                        <!--- End customers --->

                         <!--- Start orders --->
            <li class="nav-item has-treeview menu-open">
                <a href="" class="nav-link">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>
                            الطلبات
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('dashboard.orders.index')}}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>جميع الطلبات</p>
                        </a>
                    </li>
                    </ul>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{route('dashboard.orders.create')}}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>إضافة طلب جديد</p>
                    </a>
                    </li>
                </ul>
            </li>
                        <!--- End customers --->

















        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar --> --}}
