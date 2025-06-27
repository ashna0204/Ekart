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
            
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>