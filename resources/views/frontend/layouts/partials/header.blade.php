<header class="header-v4">
    <!-- Header desktop -->
    <div class="container-menu-desktop ">
      <!-- Topbar -->
      <div class="top-bar">
        <div class="content-topbar flex-sb-m h-full container">
          <div class="left-top-bar" style="font-family: 'Lora', serif; font-size: 17px ">
            Miễn phí vận chuyển với hóa đơn từ 500.000 VNĐ trở lên! 
          </div>
          <div class="right-top-bar flex-w h-full">
            @if (Auth::guest())
            <a href="{{ route('frontend.login') }}" class="flex-c-m trans-04 p-lr-25" style="font-family: 'Lora', serif; font-size: 17px  ">
              Tài khoản của bạn
            </a>
            @else
            <a href="{{ route('frontend.login') }}" class="flex-c-m trans-04 p-lr-25" style="font-family: 'Lora', serif; font-size: 17px  ">
              Chào &nbsp <b>{{ Auth::user()->name }}</b>
            </a>
            @endif
            <!-- <a href="#" class="flex-c-m trans-04 p-lr-25"> -->
            <a class="flex-c-m trans-04 p-lr-25" href="{{ route('logout') }}" onclick="event.preventDefault();
												document.getElementById('logout-form').submit();" style="font-family: 'Lora', serif; font-size: 17px ">Đăng xuất
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
             <!-- Đăng xuất
            </a> -->
            <a href="{{ route('app.setLocale', ['locale' => 'en']) }}" class="flex-c-m trans-04 p-lr-25" style="font-size: 17px ">
              EN
            </a>
            <a href="{{ route('app.setLocale', ['locale' => 'vi']) }}" class="flex-c-m trans-04 p-lr-25" style="font-size: 17px ">
              VI
            </a>
          </div>
        </div>
      </div>
      <div class="wrap-menu-desktop">
        <nav class="limiter-menu-desktop container">
          
          <!-- Logo desktop -->    
          <a href="{{ route('frontend.home') }}" class="logo">
            <img src="{{ asset('theme/cozastore/images/icons/logoAF22.png') }}" alt="IMG-LOGO">
          </a>
          <!-- Menu desktop -->
          <div class="menu-desktop">
            <ul class="main-menu">
              <li class="{{ Request::is('') ? 'active-menu' : '' }}">
                <a href="{{ route('frontend.home') }}" style="font-family: 'Lora', serif; font-size: 17px">TRANG CHỦ</a>
              </li>
              <li class="label1 {{ Request::is('san-pham') ? 'active-menu' : '' }}" data-label1="hot">
                <a href="{{ route('frontend.product') }}"style="font-family: 'Lora', serif; font-size: 17px">SẢN PHẨM</a>
              </li>
              <!-- <li class="label1" data-label1="hot">
                <a href="#"style="font-family: 'Lora', serif; font-size: 17px">KHUYẾN MÃI</a>
              </li> -->
              <li class="label1 {{ Request::is('thu-do-online') ? 'active-menu' : '' }}" data-label1="new">
                <a href="{{ route('frontend.tryingonl') }}"style="font-family: 'Lora', serif; font-size: 17px">THỬ ĐỒ ONLINE</a>
              </li>
              <li class="{{ Request::is('gioi-thieu') ? 'active-menu' : '' }}">
                <a href="{{ route('frontend.about') }}"style="font-family: 'Lora', serif; font-size: 17px">GIỚI THIỆU</a>
              </li>
              <li class="{{ Request::is('lien-he') ? 'active-menu' : '' }}">
                <a href="{{ route('frontend.contact') }}"style="font-family: 'Lora', serif; font-size: 17px">LIÊN HỆ</a>
              </li>

              <li class="{{ Request::is('giohangz') ? 'active-menu' : '' }} wrap-icon-header flex-w flex-c-m">
                <a href="{{ route('gh') }}"class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 " 
                      data-notify="">  <span style="font-family: 'Lora', serif; font-size: 17px">GIỎ HÀNG </span>&nbsp;
                      <span class=" zmdi zmdi-shopping-cart"></span>
                </a>
              </li>
            </ul>
          </div>  
        </nav>
      </div>  
    </div>
    
</header>