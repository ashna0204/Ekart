<div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            >
              <li class="nav-item">
                <a href="./generate/theme.html" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('products.index')}}" class="nav-link">
                  <i class="nav-icon bi "></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('subcategories.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>Sub categories</p>
                </a>
              </li>
               <li class="nav-item">
                <form action="{{route('admin.logout')}}" class="nav-link" method="POST">
                  @csrf
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <button type="submit" style="background: none; border: none; color: inherit; padding: 0; font: inherit; cursor: pointer;">
                  <p>Logout</p></button>
                </form>
              </li>
            
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>