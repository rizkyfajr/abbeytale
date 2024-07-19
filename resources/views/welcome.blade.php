@extends('frontend.layout.home-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home - Abbytale')
@section('content-frontend')


@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i> {{-- Ikon dari Font Awesome --}}
        <div>
            {{ session('success') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center" role="alert">
        <i class="fas fa-exclamation-triangle me-2"></i> {{-- Ikon dari Font Awesome --}}
        <div>
            {{ session('error') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


<section id="banner" style="background: #F9F3EC;">
    <div class="container">
        <div class="swiper main-swiper">
            <div class="swiper-wrapper">

                @foreach ($banners as $banner)
                    <div class="swiper-slide py-5">
                        <div class="row banner-content align-items-center">
                            <div class="img-wrapper col-md-5">
                                <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}" class="img-fluid">
                            </div>
                            <div class="content-wrapper col-md-7 p-5 mb-5">
                                <div class="secondary-font text-primary text-uppercase mb-4">{{ $banner->subtitle }}</div>
                                <h2 class="banner-title display-1 fw-normal">{{ $banner->title }}</h2>
                                @if ($banner->link != null)
                                <a href="{{ $banner->link }}" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                                    Shop Now
                                    <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                                        <use xlink:href="#arrow-right"></use>
                                    </svg>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

            <div class="swiper-pagination mb-5"></div>

        </div>
    </div>
</section>

<section id="categories">
    <div class="container my-3 py-5">
        <div class="row my-5">
            @foreach($productType as $productType)
                <div class="col text-center">
                    <a href="#" class="categories-item">
                        {{-- <iconify-icon class="category-icon" icon="ph:mouse"></iconify-icon> --}}
                            <iconify-icon class="category-icon" icon="ph:{{ $productType->icon }}"></iconify-icon>
                        <h5>{{ $productType->nama }}</h5>
                    </a>
                </div>
            @endforeach


        </div>
    </div>
</section>

<section id="clothing" class="my-5 overflow-hidden">
    <div class="container pb-5">

        <div class="section-header d-md-flex justify-content-between align-items-center mb-3">
            <h2 class="display-3 fw-normal">Produk Pilihan</h2>
            <div>
                <a href="{{ route('shop') }}" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                    shop now
                    <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                        <use xlink:href="#arrow-right"></use>
                    </svg></a>
            </div>
        </div>

        <div class="products-carousel swiper">
            <div class="swiper-wrapper">

                @foreach ($products as $product)
                <div class="swiper-slide">
                    <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
                        @if($product->discounts->isNotEmpty())
                            Diskon
                        @else
                            New
                        @endif
                    </div>

                    <div class="card position-relative">
                        <a href="#"><img src="{{ asset('storage/' . $product->gambar) }}" class="img-fluid rounded-4" style="aspect-ratio: 1 / 1; object-fit: cover;" alt="image"></a>
                        <div class="card-body p-0">
                            <a href="#">
                                <h3 class="card-title pt-4 m-0">{{ $product->nama }}</h3>
                            </a>
                            <div class="card-text">   <span class="rating secondary-font">
                                @for ($i = 0; $i < $product->rating; $i++)
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                @endfor
                                {{ $product->rating }}
                            </span>

                            @if ($product->harga != $product->discountedPrice)
                                <h3 class="secondary-font text-primary">Rp. <del>{{ number_format($product->harga, 0, ',', '.') }}</del></h3>
                                <h4 class="primary-font text-primary">Rp. {{ number_format($product->discountedPrice, 0, ',', '.') }}</h4>
                            @else
                                <h3 class="secondary-font text-primary">Rp. {{ number_format($product->harga, 0, ',', '.') }}</h3>
                            @endif
                            <small class="secondary-font text-primary">Jumlah Stok {{ $product->productStock->stok }}</small>

                                <div class="d-flex flex-wrap mt-3">
                                    @auth
                                        {{-- Jika sudah login, tampilkan form tambah ke keranjang --}}
                                        <form action="{{ route('cart.add', $product->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="btn btn-primary">Tambahkan ke Keranjang</button>
                                        </form>
                                    @else
                                        {{-- Jika belum login, tampilkan tombol dengan tautan ke halaman login --}}
                                        <a href="{{ route('login') }}" class="btn btn-primary">Login untuk Membeli</a>
                                    @endauth

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach



            </div>
        </div>
        <!-- / products-carousel -->


    </div>
</section>



<section id="service">
    <div class="container py-5 my-5">
        <div class="row g-md-5 pt-4 card-equal-height">
            <div class="col-md-3 my-3">
                <div class="card">
                    <div>
                        <iconify-icon class="service-icon text-primary" icon="la:shopping-cart"></iconify-icon>
                    </div>
                    <h3 class="card-title py-2 m-0">Free Delivery</h3>
                    <div class="card-text">
                        {{-- <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-3 my-3">
                <div class="card">
                    <div>
                        <iconify-icon class="service-icon text-primary" icon="la:user-check"></iconify-icon>
                    </div>
                    <h3 class="card-title py-2 m-0">100% secure payment</h3>
                    <div class="card-text">
                        {{-- <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-3 my-3">
                <div class="card">
                    <div>
                        <iconify-icon class="service-icon text-primary" icon="la:tag"></iconify-icon>
                    </div>
                    <h3 class="card-title py-2 m-0">Daily Offer</h3>
                    <div class="card-text">
                        {{-- <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-3 my-3">
                <div class="card">
                    <div>
                        <iconify-icon class="service-icon text-primary" icon="la:award"></iconify-icon>
                    </div>
                    <h3 class="card-title py-2 m-0">Quality guarantee</h3>
                    <div class="card-text">
                        {{-- <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <section id="insta" class="my-5">
    <div class="row g-0 py-5">
        <div class="col instagram-item  text-center position-relative">
            <div class="icon-overlay d-flex justify-content-center position-absolute">
                <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
            </div>
            <a href="#">
                <img src="/frontend/images/insta1.jpg" alt="insta-img" class="img-fluid rounded-3">
            </a>
        </div>
        <div class="col instagram-item  text-center position-relative">
            <div class="icon-overlay d-flex justify-content-center position-absolute">
                <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
            </div>
            <a href="#">
                <img src="/frontend/images/insta2.jpg" alt="insta-img" class="img-fluid rounded-3">
            </a>
        </div>
        <div class="col instagram-item  text-center position-relative">
            <div class="icon-overlay d-flex justify-content-center position-absolute">
                <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
            </div>
            <a href="#">
                <img src="/frontend/images/insta3.jpg" alt="insta-img" class="img-fluid rounded-3">
            </a>
        </div>
        <div class="col instagram-item  text-center position-relative">
            <div class="icon-overlay d-flex justify-content-center position-absolute">
                <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
            </div>
            <a href="#">
                <img src="/frontend/images/insta4.jpg" alt="insta-img" class="img-fluid rounded-3">
            </a>
        </div>
        <div class="col instagram-item  text-center position-relative">
            <div class="icon-overlay d-flex justify-content-center position-absolute">
                <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
            </div>
            <a href="#">
                <img src="/frontend/images/insta5.jpg" alt="insta-img" class="img-fluid rounded-3">
            </a>
        </div>
        <div class="col instagram-item  text-center position-relative">
            <div class="icon-overlay d-flex justify-content-center position-absolute">
                <iconify-icon class="text-white" icon="la:instagram"></iconify-icon>
            </div>
            <a href="#">
                <img src="/frontend/images/insta6.jpg" alt="insta-img" class="img-fluid rounded-3">
            </a>
        </div>
    </div>
</section> --}}



@endsection
