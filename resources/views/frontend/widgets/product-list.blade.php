
  <div class="bg0 m-t-23 p-b-140">
    <div class="container">
      <div class="flex-w flex-sb-m p-b-52">
        <div class="flex-w flex-l-m filter-tope-group m-tb-10">
          <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*" style="font-family: 'Lora', serif; font-size: 16px">
          Tất cả
          </button>
          @foreach($danhsachloai as $loai)
          <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".loai-{{ $loai->l_ma }}" style="font-family: 'Lora', serif; font-size: 16px">
            {{ $loai->l_ten }}
          </button>
          @endforeach
        </div>
        <div class="flex-w flex-c-m m-tb-10" style="font-family: 'Lora', serif; font-size: 15px">
          <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
            <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
            <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
             Bộ lọc
          </div>

          <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search" style="font-family: 'Lora', serif; font-size: 15px">
            <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
            <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
            Tìm kiếm
          </div>

        </div>
        
  <!-- Search product -->
  
        <div class="dis-none panel-search w-full p-t-10 p-b-15">
          <form action="{{route('search')}}" method="get" role="search" id="searchForm">
            <div class="bor8 dis-flex p-l-15">
              <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                <i class="zmdi zmdi-search"></i>
              </button>
              <input style="font-family: 'Lora', serif; font-size: 15px" 
                    class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="key" 
                    placeholder="Nhập tên hoặc giá sản phẩm ...">
            </div>  
          </form>
        </div>
  

        <!-- Filter -->
        <div class="dis-none panel-filter w-full p-t-10">
          <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
            <div class="filter-col1 p-r-15 p-b-27">
              <div class="mtext-102 cl2 p-b-15" style="font-family: 'Lora', serif; font-size: 15px">
                Sắp xếp
              </div>
              <ul>
                <li class="p-b-6">
                  <a href="#" class="filter-link stext-106 trans-04" style="font-family: 'Lora', serif; font-size: 15px">
                    Mặc định
                  </a>
                </li>
                <li class="p-b-6">
                  <a href="#" class="filter-link stext-106 trans-04" style="font-family: 'Lora', serif; font-size: 15px">
                    Phổ biến
                  </a>
                </li>
                <li class="p-b-6">
                  <a href="#" class="filter-link stext-106 trans-04 " style="font-family: 'Lora', serif; font-size: 15px">
                    Mới nhất
                  </a>
                </li>
              </ul>
            </div>
            <div class="filter-col2 p-r-15 p-b-27">
              <div class="mtext-102 cl2 p-b-15" style="font-family: 'Lora', serif; font-size: 15px">
                Giá
              </div>
              <ul>
                <li class="p-b-6">
                  <a href="#" class="filter-link stext-106 trans-04 " style="font-family: 'Lora', serif; font-size: 15px">
                    Tất cả
                  </a>
                </li>
                <li class="p-b-6">
                  <a href="#" class="filter-link stext-106 trans-04" style="font-family: 'Lora', serif; font-size: 15px">
                    100.000 - 200.000
                  </a>
                </li>
                <li class="p-b-6">
                  <a href="#" class="filter-link stext-106 trans-04" style="font-family: 'Lora', serif; font-size: 15px">
                    200.000 - 400.000
                  </a>
                </li>
                <li class="p-b-6">
                  <a href="#" class="filter-link stext-106 trans-04" style="font-family: 'Lora', serif; font-size: 15px">
                    400.000 - 500.000
                  </a>
                </li>
                <li class="p-b-6">
                  <a href="#" class="filter-link stext-106 trans-04" style="font-family: 'Lora', serif; font-size: 15px">
                    500.000+
                  </a>
                </li>
              </ul>
            </div>
            <div class="filter-col3 p-r-15 p-b-27">
              <div class="mtext-102 cl2 p-b-15" style="font-family: 'Lora', serif; font-size: 15px">
                Màu sắc
              </div>
              <ul>
                <li class="p-b-6">
                  <span class="fs-15 lh-12 m-r-6" style="color: #222;">
                    <i class="zmdi zmdi-circle"></i>
                  </span>
                  <a href="#" class="filter-link stext-106 trans-04" style="font-family: 'Lora', serif; font-size: 15px">
                    Đen
                  </a>
                </li>
                <li class="p-b-6">
                  <span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
                    <i class="zmdi zmdi-circle"></i>
                  </span>
                  <a href="#" class="filter-link stext-106 trans-04 " style="font-family: 'Lora', serif; font-size: 15px">
                    Xanh dương
                  </a>
                </li>
                <li class="p-b-6">
                  <span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
                    <i class="zmdi zmdi-circle"></i>
                  </span>
                  <a href="#" class="filter-link stext-106 trans-04" style="font-family: 'Lora', serif; font-size: 15px">
                    Xám
                  </a>
                </li>
                <li class="p-b-6">
                  <span class="fs-15 lh-12 m-r-6" style="color: yellow;">
                    <i class="zmdi zmdi-circle"></i>
                  </span>
                  <a href="#" class="filter-link stext-106 trans-04" style="font-family: 'Lora', serif; font-size: 15px">
                    Vàng
                  </a>
                </li>
                <li class="p-b-6">
                  <span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
                    <i class="zmdi zmdi-circle"></i>
                  </span>
                  <a href="#" class="filter-link stext-106 trans-04" style="font-family: 'Lora', serif; font-size: 15px">
                    Đỏ
                  </a>
                </li>
                <li class="p-b-6">
                  <span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
                    <i class="zmdi zmdi-circle-o"></i>
                  </span>
                  <a href="#" class="filter-link stext-106 trans-04" style="font-family: 'Lora', serif; font-size: 15px">
                    Trắng
                  </a>
                </li>
                <li class="p-b-6">
                  <span class="fs-15 lh-12 m-r-6" style="color: pink;">
                    <i class="zmdi zmdi-circle"></i>
                  </span>
                  <a href="#" class="filter-link stext-106 trans-04" style="font-family: 'Lora', serif; font-size: 15px">
                    Hồng
                  </a>
                </li>
              </ul>
            </div>
            <div class="filter-col4 p-b-27">
              <div class="mtext-102 cl2 p-b-15" style="font-family: 'Lora', serif; font-size: 15px">
                Liên quan
              </div>
              <div class="flex-w p-t-4 m-r--5">
                <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5" style="font-family: 'Lora', serif; font-size: 15px">
                  Fashion
                </a>
                <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5" style="font-family: 'Lora', serif; font-size: 15px">
                  Lifestyle
                </a>
                <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5" style="font-family: 'Lora', serif; font-size: 15px">
                  Denim
                </a>
                <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5" style="font-family: 'Lora', serif; font-size: 15px">
                  Streetstyle
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      
<script>
  function submit(abc) {
    alert("Thêm vào giỏ hàng thành công!");
  }
</script>

    <!-- SHOW PRODUCT -->
      
      <div style="width:100%;">
                @foreach($data as $index=>$sp)

        <div  style="float:left; width:300px; height:500px; margin: 10px 10px;">
          <div class="block2" style="height:400px">
            <div class="block2-pic hov-img0">
              <img src="{{ asset('storage/photos/' . $sp->sp_hinh) }}" alt="IMG-PRODUCT" style="width:300px; height:400px">
              <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal" 
                  data-sp-ma="{{ $sp->sp_ma }}"> 
                Xem chi tiết
              </a>   
              </div>
            <div class="block2-txt flex-w flex-t p-t-14">
              <div class="block2-txt-child1 flex-col-l ">
                  <a class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                      <span style="color:blue; text-transform: uppercase;" style="font-family: 'Lora', serif; ">
                      {{ $sp->sp_ten }}
                      </span>
                  </a>
                  <span class="stext-105 cl3">
                   <b style="font-size:18px;">{{number_format( $sp->sp_giaBan )}}</b> <span>VNĐ</span>
                   <br>
                  <span class="stext-105 cl3">
                  <input type="text" value="{{ route('muahang',$sp->sp_ma ) }}" id="{{ $sp->sp_ma }}" style="display: none;">
                    <a href="{{ route('muahang',$sp->sp_ma ) }}" onclick="submit('{{$sp->sp_ma }}')" ><span style="font-family: 'Lora', serif; color: red; font-size: 18px" >Thêm vào Giỏ hàng </span></a>
                  </span>
              </div> 
            </div>
          </div>
          <!-- Modal quick view -->
              @include('frontend.widgets.product-quick-view', ['sp' => $sp])
            @endforeach
      </div>
        <!-- Load more -->
        <div class="flex-c-m flex-w w-full p-t-45">
        
        </div>
    </div>
  </div>
</div>