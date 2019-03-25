<header class="header-v4">
    <!-- Header desktop -->
    <div class="container-menu-desktop">
      <!-- Topbar -->
      <div class="top-bar">
        <div class="content-topbar flex-sb-m h-full container">
          <div class="left-top-bar">
            Miễn phí ship với hóa đơn trên 500.000VNĐ
          </div>
          <div class="right-top-bar flex-w h-full">
           
            @if (Auth::guest())
            <a href="{{ route('frontend.login') }}" class="flex-c-m trans-04 p-lr-25">
              Tài khoản của bạn
            </a>
            @else
            <a href="{{ route('frontend.login') }}" class="flex-c-m trans-04 p-lr-25">
              Chào  {{ Auth::user()->name }}
            </a>
            @endif
            <!-- <a href="#" class="flex-c-m trans-04 p-lr-25"> -->
            <a class="flex-c-m trans-04 p-lr-25" href="{{ route('logout') }}" onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">Đăng xuất
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
             <!-- Đăng xuất
            </a> -->
            <a href="{{ route('app.setLocale', ['locale' => 'en']) }}" class="flex-c-m trans-04 p-lr-25">
              EN
            </a>
            <a href="{{ route('app.setLocale', ['locale' => 'vi']) }}" class="flex-c-m trans-04 p-lr-25">
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
                <a href="{{ route('frontend.home') }}">{{ __('sunshine.home') }}</a>
              </li>
              <li class="{{ Request::is('san-pham') ? 'active-menu' : '' }}">
                <a href="{{ route('frontend.product') }}">{{ __('sunshine.product') }}</a>
              </li>
              <li class="label1" data-label1="hot">
                <a href="#">Khuyến mâi</a>
              </li>
              <li class="label1 {{ Request::is('thu-do-online') ? 'active-menu' : '' }}" data-label1="new">
                <a href="#">Thử đồ Online</a>
              </li>
              <li class="{{ Request::is('gioi-thieu') ? 'active-menu' : '' }}">
                <a href="{{ route('frontend.about') }}">{{ __('sunshine.about') }}</a>
              </li>
              <li class="{{ Request::is('lien-he') ? 'active-menu' : '' }}">
                <a href="{{ route('frontend.contact') }}">{{ __('sunshine.contact') }}</a>
              </li>
            </ul>
          </div>  
         
          <!-- Icon header -->
          <div class="wrap-icon-header flex-w flex-r-m">
            <!-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
              <i class="zmdi zmdi-search"></i>
            </div> -->
             <!-- Hiển thị nút summart cart -->
                <a href="{{ route('gh') }}" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 " data-notify=""> <!--icon-header-noti-->
                    <span class="zmdi zmdi-shopping-cart"></span>
                </a>
							</div>
          </div>
        </nav>
      </div>  
    </div>
    
  </header>