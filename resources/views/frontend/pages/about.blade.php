{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.index` --}}
@extends('frontend.layouts.index')
{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.index` --}}
@section('title')
Giới thiệu Shop Hoa tươi - Sunshine
@endsection
{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.index` --}}
@section('custom-css')
@endsection
{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.index` --}}
@section('main-content')

<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('theme/cozastore/images/bg-02.jpg') }}');">
    <h2 class="ltext-105 cl0 txt-center">
        Welcome to ARMY FASHION Shop
    </h2>
</section>

<!-- Content page -->
<section class="bg0 p-t-75 p-b-120">
    <div class="container">
        <div class="row p-b-148">
            <div class="col-md-7 col-lg-8">
                <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                    <h3 class="mtext-111 cl2 p-b-16" style="font-family: 'Lora', serif;">
                        Thời trang là chính mình
                    </h3>
                    <p class="stext-113 cl6 p-b-26" style="font-family: 'Lora', serif; font-size: 18px">
                    Người đam mê thời trang sẽ luôn tự tin với trang phục đang mặc. 
                    Cho dù đến cuối ngày họ nhận ra chiếc áo trên người vô cùng “choảng” với váy, hoặc áo đầm đã lỗi thời. 
                    Nhưng điều quan trọng là sẽ liên tục học hỏi và rút kinh nghiệm từ những lỗi trang phục đó. 
                    Điều quan trọng là sự tự tin sẽ làm cho thần thái của bạn toát lên nét đẹp gấp nhiều lần trang phục khoác trên người.
                    </p>
                    <p class="stext-113 cl6 p-b-26" style="font-family: 'Lora', serif; font-size: 18px">
                    Điều quan trọng nhất trước khi chọn trang phục, đó là bạn phải hiểu rõ DÁNG NGƯỜI bản thân.
                    Quần áo hàng hiệu, đắt tiền chưa hẳn bạn khoác lên người sẽ đẹp vì còn phụ thuộc vào sự PHÙ HỢP.
                    Dáng người nào cũng có ưu điểm và khuyết điểm, công việc bạn cần tìm hiểu tiếp theo là những trang phục nào giúp bạn “tôn vinh” những điểm mạnh (gương mặt ưa nhìn, bàn tay thon, đôi chân dài…) và “lu mờ” điểm yếu (lưng dài chân ngắn, chân cong chẳng hạn) trên cơ thể. 
                    </p>
                    <p class="stext-113 cl6 p-b-26" style="font-family: 'Lora', serif; font-size: 15px">
                        Hãy đến với chúng tôi - nơi tìm lại sự giản đơn của thời trang trong bạn! <br>
                        (+84) 326 4656 24
                    </p>
                </div>
            </div>
            <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                <div class="how-bor1 ">
                    <div class="hov-img0">
                        <img src="{{ asset('theme/cozastore/images/about-02.jpg') }}" alt="IMG">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16" style="font-family: 'Lora', serif; ">
                        Nhiệm vụ của chúng tôi
                    </h3>
                    <p class="stext-113 cl6 p-b-26" style="font-family: 'Lora', serif; font-size: 18px">
                        Đến với <b>ARMY FASHION Shop</b>, các bạn sẽ được tiếp cận phong cách thời trang tối giản và thanh lịch mang xu hướng Hàn Quốc.
                        Chúng tôi luôn cập nhật những sản phẩm tốt nhất cho khách hàng, mang đến trải nghiệm "đẹp cho chính mình" một cách chân thực. Thao tác mua hàng đơn giản, nhận hàng nhanh chóng.
                    </p>
                    <div class="bor16 p-l-29 p-b-9 m-t-22">
                        <p class="stext-114 cl6 p-r-40 p-b-11" style="font-family: 'Lora', serif; font-size: 15px">
                        “Đừng chạy theo xu hướng. Đừng lệ thuộc vào thời trang. Bạn có thể quyết định mình là ai, như thế nào thông qua cách bạn lựa chọn trang phục cũng như phong cách sống của mình”
                        </p>
                        <span class="stext-111 cl8">
                            -  Gianni Versace.
                        </span>
                    </div>
                </div>
            </div>
            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img src="{{ asset('theme/cozastore/images/about-01.jpg') }}" alt="IMG">
                    </div>
                </div>
            </div>
        </div>        
    </div>
</section>
@endsection
{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.index` --}}
@section('custom-scripts')
@endsection