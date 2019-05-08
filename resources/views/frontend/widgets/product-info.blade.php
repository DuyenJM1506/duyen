<div class="container" >
  <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
    <button class="how-pos3 hov3 trans-04 js-hide-modal" data-sp-ma="{{ $sp->sp_ma }}">
      <img src="{{ asset('theme/cozastore/images/icons/icon-close.png') }}" alt="CLOSE">
    </button>
    <div class="row">
      <div class="col-md-6 col-lg-7 p-b-30">
        <div class="p-l-25 p-r-30 p-lr-0-lg">
          <div class="wrap-slick3 flex-sb flex-w">
            <div class="wrap-slick3-dots"></div>
            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
            <div class="slick3 gallery-lb">
              <div class="item-slick3" data-thumb="{{ asset('storage/photos/' . $sp->sp_hinh) }}">
                <div class="wrap-pic-w pos-relative">
                  <img src="{{ asset('storage/photos/' . $sp->sp_hinh) }}" alt="IMG-PRODUCT">
                  <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('storage/photos/' . $sp->sp_hinh) }}">
                    <i class="fa fa-expand"></i>
                  </a>
                </div>
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

      <div class="col-md-6 col-lg-5 p-b-30">
        <div class="p-r-50 p-t-5 p-lr-0-lg">
          <h4 class="mtext-105 cl2 js-name-detail p-b-14" style="font-family: 'Lora', serif;">
            <a href="{{ route('frontend.productDetail', ['id' => $sp->sp_ma]) }}">{{ $sp->sp_ten }}</a>
          </h4>
          <span class="mtext-106 cl2">
            <span class="stext-102 cl3 p-t-23" style="font-family: 'Lora', serif;font-size:18px; ">Giá: </span>{{ number_format( $sp->sp_giaBan ) }} <span>VNĐ</span>
          </span>

           <p class="mtext-106 cl2">
           <span class="stext-102 cl3 p-t-23" style="font-family: 'Lora', serif;font-size:18px; ">Số lượng hiện tại: </span> {{ $sp->sp_soLuongHienTai }}
          </p>
         
          <p class="mtext-106 cl2">
           <span class="stext-102 cl3 p-t-23" style="font-family: 'Lora', serif;font-size:18px; ">
           Màu sắc: @if(isset($sp->maus->m_ten)) <b>{{$sp->maus->m_ten}}</b> @endif</span> 

          </p>

          <p class="mtext-106 cl2">
           <span class="stext-102 cl3 p-t-23" style="font-family: 'Lora', serif;font-size:18px; ">
           Xuất xứ: @if(isset($sp->xuatxus->xx_ten)) <b>{{$sp->xuatxus->xx_ten}}</b> @endif</span> 
          </p>
          
        
       </br>
            <div class="flex-w flex-r-m p-b-10">
              <div class="size-204 flex-w flex-m respon6-next">
                <ngcart-addtocart template-url="#" 
                  id="{{ $sp->sp_ma }}" 
                  name="{{ $sp->sp_ten }}" 
                  price="{{ $sp->sp_giaBan }}" 
                  quantity="1" 
                  quantity-max="100" 
                  data="{ sp_hinh_url: '{{ asset('storage/photos/' . $sp->sp_hinh) }}' }"></ngcart-addtocart>
                  <div class="btn-group" role="group" >
                    <a href="{{ route('muahang',$sp->sp_ma ) }}" onclick="submit('{{$sp->sp_ma }}')" >
                    <button type="button" class="btn btn-default"><b><font style="font-size:18px">Thêm vào giỏ hàng</font></b></button> 
                    <img src="{{asset('storage/photos/shopping-01-512.png')}}" alt="img" width= "40px" height="36px"></button>
                    </a>
                  </div>
              </div>
            </div>
          </div>
          <!-- sns -->
         
        </div>
      </div>
    </div>
  </div>
</div>