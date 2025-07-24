<div class="bg-dark text-white py-2">
    <div class="container d-flex justify-content-between">
        <div>
            <small><i class="fa fa-envelope mr-2"></i>info@example.com</small>
            <small class="ml-4"><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</small>
        </div>
        <div>
            <a href="#" class="text-white ml-3"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white ml-3"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white ml-3"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-white ml-3"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>
</div>

<!-- Main Navbar -->
<header class="bg-light">
<div class="container p-2 m-4 d-flex justify-content-between align-items-center">
     <!-- FASHION -->
     <div class="dropdown position-relative mr-3">
            <a href="{{ route('products.by.category', $fashionCategory->slug) }}"
            class="nav-link text-dark "
             style="text-decoration: none;"
            onmouseover="this.style.textDecoration='underline'"
            onmouseout="this.style.textDecoration='none'"
            onmouseenter="this.nextElementSibling.style.display='block'"
            onmouseleave="this.nextElementSibling.style.display='none'">
             Fashion
                        </a>

         <div class="dropdown-menu" style="display: none; position: absolute;" onmouseenter="this.style.display='block'" onmouseleave="this.style.display='none'">
                    @foreach($fashionCategory->subcategories as $subcategory)
             <div class="dropdown">
                    <a href="{{ route('products.by.subcategory', $subcategory->slug) }}"
                     class="dropdown-item"
                     onmouseenter="this.nextElementSibling.style.display='block'"
                     onmouseleave="this.nextElementSibling.style.display='none'">
                     {{ $subcategory->name }}
                    </a>

                    @if($subcategory->childcategories->count())
                 <div class="dropdown-menu" style="display: none; position: absolute; left: 100%;    top: 0;" onmouseenter="this.style.display='block'" onmouseleave="this.style.display='none'">
                          @foreach($subcategory->childcategories as $child)
                        <a href="{{ route('products.by.subcategory.childcategory', ['subcategory_slug' => $subcategory->slug, 'childcategory_slug' => $child->slug]) }}"class="dropdown-item">
                            {{ $child->name }}
                        </a>
                            @endforeach
                            </div>
                             @endif
                </div>
               @endforeach
            </div>
           </div>

    <!-- Electronics -->
        <div class="dropdown position-relative mr-3">
                <a href="{{route('products.by.category', $electronicsCategory->slug)}}" class="nav-link text-dark" style="text-decoration: none;" 
                onmouseenter="this.nextElementSibling.style.display='block'"
                onmouseleave="this.nextElementSibling.style.display='none'"
                >Electronics</a>

            <div class="dropdown-menu" style="display: none ; position: absolute;" onmouseenter="this.style.display='block' " onmouseleave="this.style.display='none'">
            @foreach($electronicsCategory->subcategories as $subcategory)
            <div class="dropdown">
                <a href="{{route('products.by.subcategory', $subcategory->slug)}}"
                class="dropdown-item">
                {{$subcategory->name}}
                </a>
            </div>
            @endforeach
         </div>
        </div>

    <!-- Home & Kitchen -->
    <div class="dropdown position-relative mr-3">
        <a href="{{route('products.by.category', $homeKitchenCategory->slug)}}"
        class="nav-link text-dark" style="text-decoration: none;"
        onmouseenter ="this.nextElementSibling.style.display='block'"
        onmouseleave = "this.nextElementSibling.style.display='none'">
        Home & Kitchen</a>

        <div class="dropdown-menu" style="display: none; position: absolute;"
        onmouseenter="this.style.display='block' " onmouseleave="this.style.display='none'">
        @foreach($homeKitchenCategory->subcategories as $subcategory)
        <div class="dropdown">
            <a href="{{route('products.by.subcategory', $subcategory->slug)}}"
            class="dropdown-item">
                {{$subcategory->name}}
            </a>
        </div>
        @endforeach
    </div>
</div>
    <!-- Health & Beauty -->
        <div class="dropdown position-relative mr-3">
            <a href="{{route('products.by.category', $healthBeautyCategory->slug)}}"
            class="nav-link text-dark" style="text-decoration: none;"
            onmouseenter ="this.nextElementSibling.style.display='block'"
            onmouseleave = "this.nextElementSibling.style.display='none'">
        Health & Beauty</a>

        <div class="dropdown-menu" style="display: none; position: absolute;"
            onmouseenter="this.style.display='block' " onmouseleave="this.style.display='none'">
        @foreach($healthBeautyCategory->subcategories as $subcategory)
        <div class="dropdown">
            <a href="{{route('products.by.subcategory', $subcategory->slug)}}"
            class="dropdown-item">
                {{$subcategory->name}}
            </a>
        </div>
        @endforeach
    </div>
</div>


        <div class="d-flex align-items-center">
            <form action="" class="mr-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
            <a href="" class="btn px-0 ml-3">
                <i class="fas fa-shopping-cart"></i>
                <span class="badge border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
            </a>
            <div class="btn-group ml-3">
                <img src="https://static-assets-web.flixcart.com/batman-returns/batman-returns/p/images/profile-52e0dc.svg" alt="Profile" class="rounded-circle" style="width: 30px; height: 30px;">
                <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                <div class="dropdown-menu dropdown-menu-right">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </div>
        </div>
    </div>
 </header>

 <script>
    window.addEventListener('scroll', function() {
        const header = document.querySelector('header');
        if (window.scrollY > 0) {
            header.classList.add('fixed-top');
        } else {
            header.classList.remove('fixed-top');
        }
    });
  </script>
