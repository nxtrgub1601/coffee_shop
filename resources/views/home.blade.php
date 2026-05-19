@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')
<div class="container mt-4">

<!-- BANNER -->
<div id="bannerCarousel" 
     class="carousel slide carousel-fade mb-5"
     data-bs-ride="carousel"
     data-bs-interval="4000"
     data-bs-pause="false">

    <div class="carousel-indicators">
        <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner rounded-4 overflow-hidden">

        <div class="carousel-item active">
            <img src="{{ asset('images/banner_1.jpg') }}" 
                 class="d-block w-100 banner-img" 
                 alt="Banner 1">
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/banner_2.jpg') }}" 
                 class="d-block w-100 banner-img" 
                 alt="Banner 2">
        </div>

        <div class="carousel-item">
            <img src="{{ asset('images/banner_3.jpg') }}" 
                 class="d-block w-100 banner-img" 
                 alt="Banner 3">
        </div>

    </div>
</div>

    <!-- TITLE -->
    <h3 class="mb-4">Sản phẩm nổi bật</h3>

    <!-- PRODUCTS -->
    <div class="row">

        @foreach($sanPhams as $sp)

            @if($sp->trangThai != 'Ngừng kinh doanh' && $sp->trangThai != null)

            <div class="col-md-3 mb-4">

                <div class="card product-card p-3 h-100 position-relative">

                    @if(isset($sp->phanTramGiam) && $sp->phanTramGiam > 0)

                    <div class="sale-ribbon">
                        🔥 Giảm {{ $sp->phanTramGiam }}%
                    </div>

                    @endif

                    <img src="{{ asset('images/' . $sp->hinh_anh) }}"
                         class="card-img-top mb-3"
                         style="height:200px; object-fit:cover;">

                    <h6 class="product-title">
                        {{ $sp->tenSanPham }}
                    </h6>

                    <p class="text-muted small">
                        {{ $sp->theLoai }}
                    </p>

                    @if(isset($sp->phanTramGiam) && $sp->phanTramGiam > 0)

                        <p class="fw-bold">

                            <span class="text-danger fs-5">
                                {{ number_format($sp->gia) }} ₫
                            </span>

                            <br>

                            <small class="text-muted text-decoration-line-through">
                                {{ number_format($sp->gia_goc ?? $sp->gia) }} ₫
                            </small>

                        </p>

                    @else

                        <p class="text-success fw-bold">
                            {{ number_format($sp->gia) }} ₫
                        </p>

                    @endif

                    <a href="{{ route('sanpham.show', $sp->idSanPham) }}"
                       class="btn btn-detail w-100 mb-2">

                        Xem món

                    </a>

                    <form action="{{ route('cart.add') }}" method="POST">

                        @csrf

                        <input type="hidden"
                               name="idSanPham"
                               value="{{ $sp->idSanPham }}">

                        <button class="btn btn-spotify w-100">
                            Thêm vào giỏ
                        </button>

                    </form>

                </div>

            </div>

            @endif

        @endforeach

    </div>

</div>

<!-- FOOTER -->
<footer class="footer-highlands mt-5 pt-5 pb-3">

    <div class="container">

        <div class="row">

            <!-- Cột 1 -->
            <div class="col-md-4 mb-4">

                <h4 class="fw-bold mb-3 footer-title">
                    Highlands Coffee
                </h4>

                <p class="small footer-text">
                    Website bán cà phê trực tuyến với nhiều thức uống hấp dẫn,
                    giao hàng nhanh chóng và tiện lợi.
                </p>

            </div>

            <!-- Cột 2 -->
            <div class="col-md-4 mb-4">

                <h4 class="fw-bold mb-3 footer-title">
                    Liên hệ
                </h4>

                <p class="small mb-2">
                    📍 Hà Nội, Việt Nam
                </p>

                <p class="small mb-2">
                    📞 0123 456 789
                </p>

                <p class="small">
                    ✉️ highlandscoffee@gmail.com
                </p>

            </div>

            <!-- Cột 3 -->
            <div class="col-md-4 mb-4">

                <h4 class="fw-bold mb-3 footer-title">
                    Theo dõi chúng tôi
                </h4>

                <a href="https://www.facebook.com/highlandscoffeevietnam/?locale=vi_VN" class="d-block mb-2 footer-link">
                    Facebook
                </a>

                <a href="https://www.instagram.com/highlandscoffeevietnam/" class="d-block mb-2 footer-link">
                    Instagram
                </a>

                <a href="https://www.tiktok.com/@highlandscoffeevietnam" class="footer-link">
                    TikTok
                </a>

            </div>

        </div>

        <hr class="footer-line">

        <div class="text-center small pt-2">
            © {{ date('Y') }} Highlands Coffee. All rights reserved.
        </div>

    </div>

</footer>
@endsection