 <!-- Page Preloder -->


 <!-- Offcanvas Menu Begin -->
 <div class="offcanvas-menu-overlay"></div>
 <div class="offcanvas-menu-wrapper">
     <div class="offcanvas__close">+</div>
     <ul class="offcanvas__widget">
         <li><span class="icon_search search-switch"></span></li>
         <li><a href="#"><span class="icon_heart_alt"></span>
                 <div class="tip">2</div>
             </a></li>
         <li><a href="#"><span class="icon_bag_alt"></span>
                 <div class="tip">2</div>
             </a></li>
     </ul>
     <div class="offcanvas__logo">
         <a href="./index.html"><img src="./public/img/logo.png" alt=""></a>
     </div>
     <div id="mobile-menu-wrap"></div>
     <div class="offcanvas__auth">
         <a href="#">Login</a>
         <a href="#">Register</a>
     </div>
 </div>
 <!-- Offcanvas Menu End -->
 <header class="header">
     <div class="container-fluid">
         <div class="row">
             <div class="col-xl-3 col-lg-2">
                 <div class="header__logo">
                     <a href="./index.html"><img src="{{ url('./public/img/logo.png')}}" alt=""></a>
                 </div>
             </div>
             <div class="col-xl-6 col-lg-7">
                 <nav class="header__menu">
                     <ul>
                         <li class="active"><a href="home">Home</a></li>
                         <li><a href="categories">Women’s</a></li>
                         <li><a href="categories">Men’s</a></li>
                         <li><a href="categories">Shop</a></li>
                         <li><a href="#">Pages</a>
                             <ul class="dropdown">
                                
                                 <li><a href="cart">Shop Cart</a></li>
                                 <li><a href="cart">Checkout</a></li>
                                
                             </ul>
                         </li>
                         <li><a href="./blog.html">Blog</a></li>
                         <li><a href="./contact.html">Contact</a></li>



                     </ul>
                 </nav>
             </div>
             <div class="col-lg-3">
                 <div class="header__right">
                     <div class="header__right__auth">
                         @guest
                         @if (Route::has('login'))
                         <a href="{{ route('login') }}">{{ __('Login') }}</a>
                         @endif
                         @if (Route::has('register'))
                         <a href="{{ route('register') }}">{{ __('Register') }}</a>
                         @endif
                         @else

                         <a href="{{ route('logout') }}">
                             {{ Auth::user()->name }}
                         </a>

                         <a  href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>

                         @endguest
                     </div>
                     <ul class="header__right__widget">
                         <li><span class="icon_search search-switch"></span></li>
                         <li><a href="#"><span class="icon_heart_alt"></span>
                                 <div class="tip">2</div>
                             </a></li>
                         <li><a href="cart"><span class="icon_bag_alt"></span>
                                 <div class="tip">2</div>
                             </a></li>
                     </ul>
                 </div>
             </div>
         </div>
         <div class="canvas__open">
             <i class="fa fa-bars"></i>
         </div>
     </div>
 </header>