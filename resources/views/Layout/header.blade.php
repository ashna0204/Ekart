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
        <div class="dropdown">
            <a href="{{route('product.index')}}" class="nav-link text-dark mx-2" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'" onmouseenter="this.nextElementSibling.style.display='block'" onmouseleave="this.nextElementSibling.style.display='none'">Fashion</a>
            <div class="dropdown-menu" style="display: none; position: absolute;" onmouseenter="this.style.display='block'" onmouseleave="this.style.display='none'">
            <div class="dropdown">
                <a href="#" class="dropdown-item" onmouseenter="this.nextElementSibling.style.display='block'" onmouseleave="this.nextElementSibling.style.display='none'">Men's Wear</a>
                <div class="dropdown-menu" style="display: none; position: absolute; left: 100%; top: 0;" onmouseenter="this.style.display='block'" onmouseleave="this.style.display='none'">
                <a href="#" class="dropdown-item">Formal Wear</a>
                <a href="#" class="dropdown-item">Active Wear</a>
                <a href="#" class="dropdown-item">Casual Wear</a>
                <a href="#" class="dropdown-item">Footwear</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" class="dropdown-item" onmouseenter="this.nextElementSibling.style.display='block'" onmouseleave="this.nextElementSibling.style.display='none'">Women's Wear</a>
                <div class="dropdown-menu" style="display: none; position: absolute; left: 100%; top: 0;" onmouseenter="this.style.display='block'" onmouseleave="this.style.display='none'">
                <a href="#" class="dropdown-item">Formal Wear</a>
                <a href="#" class="dropdown-item">Active Wear</a>
                <a href="#" class="dropdown-item">Casual Wear</a>
                <a href="#" class="dropdown-item">Footwear</a>
                </div>
            </div>
            <div class="dropdown">
                <a href="#" class="dropdown-item" onmouseenter="this.nextElementSibling.style.display='block'" onmouseleave="this.nextElementSibling.style.display='none'">Kids' Wear</a>
                <div class="dropdown-menu" style="display: none; position: absolute; left: 100%; top: 0;" onmouseenter="this.style.display='block'" onmouseleave="this.style.display='none'">
                    <a href="#" class="dropdown-item">Girls' Clothing</a>
                    <a href="#" class="dropdown-item">Boys' Clothing</a>
                    <a href="#" class="dropdown-item">Girls' Footwear</a>
                    <a href="#" class="dropdown-item">Boys' Footwear</a>
                </div>
            </div>
            </div>
        </div>
        <a href="#" class="nav-link text-dark mx-2" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Electronics</a>
        <a href="#" class="nav-link text-dark mx-2" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Home & Kitchen</a>
        <a href="#" class="nav-link text-dark mx-2" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Health & Beauty</a>
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