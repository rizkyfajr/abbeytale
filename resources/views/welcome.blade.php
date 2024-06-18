@extends('frontend.layout.home-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title')
@section('content')


<section id="banner" style="background: #F9F3EC;">
    <div class="container">
        <div class="swiper main-swiper">
            <div class="swiper-wrapper">

                <div class="swiper-slide py-5">
                    <div class="row banner-content align-items-center">
                        <div class="img-wrapper col-md-5">
                            <img src="/frontend/images/banner-img.png" class="img-fluid">
                        </div>
                        <div class="content-wrapper col-md-7 p-5 mb-5">
                            <div class="secondary-font text-primary text-uppercase mb-4">Save 10 - 20 % off</div>
                            <h2 class="banner-title display-1 fw-normal">Best destination for <span
                                    class="text-primary">your
                                    pets</span>
                            </h2>
                            <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                                shop now
                                <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                                    <use xlink:href="#arrow-right"></use>
                                </svg></a>
                        </div>

                    </div>
                </div>
                <div class="swiper-slide py-5">
                    <div class="row banner-content align-items-center">
                        <div class="img-wrapper col-md-5">
                            <img src="/frontend/images//banner-img3.png" class="img-fluid">
                        </div>
                        <div class="content-wrapper col-md-7 p-5 mb-5">
                            <div class="secondary-font text-primary text-uppercase mb-4">Save 10 - 20 % off</div>
                            <h2 class="banner-title display-1 fw-normal">Best destination for <span
                                    class="text-primary">your
                                    pets</span>
                            </h2>
                            <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                                shop now
                                <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                                    <use xlink:href="#arrow-right"></use>
                                </svg></a>
                        </div>

                    </div>
                </div>
                <div class="swiper-slide py-5">
                    <div class="row banner-content align-items-center">
                        <div class="img-wrapper col-md-5">
                            <img src="/frontend/images/banner-img4.png" class="img-fluid">
                        </div>
                        <div class="content-wrapper col-md-7 p-5 mb-5">
                            <div class="secondary-font text-primary text-uppercase mb-4">Save 10 - 20 % off</div>
                            <h2 class="banner-title display-1 fw-normal">Best destination for <span
                                    class="text-primary">your
                                    pets</span>
                            </h2>
                            <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                                shop now
                                <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                                    <use xlink:href="#arrow-right"></use>
                                </svg></a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="swiper-pagination mb-5"></div>

        </div>
    </div>
</section>

<section id="categories">
    <div class="container my-3 py-5">
        <div class="row my-5">
            <div class="col text-center">
                <a href="#" class="categories-item">
                    <iconify-icon class="category-icon" icon="ph:mouse"></iconify-icon>
                    <h5>Pakaian Pria</h5>
                </a>
            </div>
            <div class="col text-center">
                <a href="#" class="categories-item">
                    <iconify-icon class="category-icon" icon="ph:dress"></iconify-icon>
                    <h5>Pakaian Wanita</h5>
                </a>
            </div>
            <div class="col text-center">
                <a href="#" class="categories-item">
                    <iconify-icon class="category-icon" icon="ph:shirt"></iconify-icon>
                    <h5>Kaos</h5>
                </a>
            </div>
            <div class="col text-center">
                <a href="#" class="categories-item">
                    <iconify-icon class="category-icon" icon="ph:suitcase"></iconify-icon>
                    <h5>Pakaian Formal</h5>
                </a>
            </div>
            <div class="col text-center">
                <a href="#" class="categories-item">
                    <iconify-icon class="category-icon" icon="ph:tie"></iconify-icon>
                    <h5>Aksesoris</h5>
                </a>
            </div>
        </div>
    </div>
</section>

<section id="clothing" class="my-5 overflow-hidden">
    <div class="container pb-5">

        <div class="section-header d-md-flex justify-content-between align-items-center mb-3">
            <h2 class="display-3 fw-normal">Pet Clothing</h2>
            <div>
                <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                    shop now
                    <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                        <use xlink:href="#arrow-right"></use>
                    </svg></a>
            </div>
        </div>

        <div class="products-carousel swiper">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
                        New
                    </div>
                    <div class="card position-relative">
                        <a href="single-product.html"><img src="/frontend/images/item1.jpg" class="img-fluid rounded-4"
                                alt="image"></a>
                        <div class="card-body p-0">
                            <a href="single-product.html">
                                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                            </a>

                            <div class="card-text">
                                <span class="rating secondary-font">
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    5.0
                                </span>

                                <h3 class="secondary-font text-primary">$18.00</h3>

                                <div class="d-flex flex-wrap mt-3">
                                    <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                        <h5 class="text-uppercase m-0">Add to Cart</h5>
                                    </a>
                                    <a href="#" class="btn-wishlist px-4 pt-3 ">
                                        <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                    </a>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              New
            </div> -->
                    <div class="card position-relative">
                        <a href="single-product.html"><img src="/frontend/images/item2.jpg" class="img-fluid rounded-4"
                                alt="image"></a>
                        <div class="card-body p-0">
                            <a href="single-product.html">
                                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                            </a>

                            <div class="card-text">
                                <span class="rating secondary-font">
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    5.0
                                </span>

                                <h3 class="secondary-font text-primary">$18.00</h3>

                                <div class="d-flex flex-wrap mt-3">
                                    <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                        <h5 class="text-uppercase m-0">Add to Cart</h5>
                                    </a>
                                    <a href="#" class="btn-wishlist px-4 pt-3 ">
                                        <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
                        -10%
                    </div>
                    <div class="card position-relative">
                        <a href="single-product.html"><img src="/frontend/images/item3.jpg" class="img-fluid rounded-4"
                                alt="image"></a>
                        <div class="card-body p-0">
                            <a href="single-product.html">
                                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                            </a>

                            <div class="card-text">
                                <span class="rating secondary-font">
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    5.0
                                </span>

                                <h3 class="secondary-font text-primary">$18.00</h3>

                                <div class="d-flex flex-wrap mt-3">
                                    <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                        <h5 class="text-uppercase m-0">Add to Cart</h5>
                                    </a>
                                    <a href="#" class="btn-wishlist px-4 pt-3 ">
                                        <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                    </a>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              New
            </div> -->
                    <div class="card position-relative">
                        <a href="single-product.html"><img src="/frontend/images/item4.jpg" class="img-fluid rounded-4"
                                alt="image"></a>
                        <div class="card-body p-0">
                            <a href="single-product.html">
                                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                            </a>

                            <div class="card-text">
                                <span class="rating secondary-font">
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    5.0
                                </span>

                                <h3 class="secondary-font text-primary">$18.00</h3>

                                <div class="d-flex flex-wrap mt-3">
                                    <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                        <h5 class="text-uppercase m-0">Add to Cart</h5>
                                    </a>
                                    <a href="#" class="btn-wishlist px-4 pt-3 ">
                                        <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                    </a>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              New
            </div> -->
                    <div class="card position-relative">
                        <a href="single-product.html"><img src="/frontend/images/item7.jpg" class="img-fluid rounded-4"
                                alt="image"></a>
                        <div class="card-body p-0">
                            <a href="single-product.html">
                                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                            </a>

                            <div class="card-text">
                                <span class="rating secondary-font">
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    5.0
                                </span>

                                <h3 class="secondary-font text-primary">$18.00</h3>

                                <div class="d-flex flex-wrap mt-3">
                                    <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                        <h5 class="text-uppercase m-0">Add to Cart</h5>
                                    </a>
                                    <a href="#" class="btn-wishlist px-4 pt-3 ">
                                        <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                    </a>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              New
            </div> -->
                    <div class="card position-relative">
                        <a href="single-product.html"><img src="/frontend/images/item8.jpg" class="img-fluid rounded-4"
                                alt="image"></a>
                        <div class="card-body p-0">
                            <a href="single-product.html">
                                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                            </a>

                            <div class="card-text">
                                <span class="rating secondary-font">
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    5.0
                                </span>

                                <h3 class="secondary-font text-primary">$18.00</h3>

                                <div class="d-flex flex-wrap mt-3">
                                    <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                        <h5 class="text-uppercase m-0">Add to Cart</h5>
                                    </a>
                                    <a href="#" class="btn-wishlist px-4 pt-3 ">
                                        <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                    </a>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- / products-carousel -->


    </div>
</section>

<section id="banner-2" class="my-3" style="background: #F9F3EC;">
    <div class="container">
        <div class="row flex-row-reverse banner-content align-items-center">
            <div class="img-wrapper col-12 col-md-6">
                <img src="/frontend/images/banner-img2.png" class="img-fluid">
            </div>
            <div class="content-wrapper col-12 offset-md-1 col-md-5 p-5">
                <div class="secondary-font text-primary text-uppercase mb-3 fs-4">Upto 40% off</div>
                <h2 class="banner-title display-1 fw-normal">Clearance sale !!!
                </h2>
                <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                    shop now
                    <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                        <use xlink:href="#arrow-right"></use>
                    </svg></a>
            </div>

        </div>
    </div>
</section>

<section id="testimonial">
    <div class="container my-5 py-5">
        <div class="row">
            <div class="offset-md-1 col-md-10">
                <div class="swiper testimonial-swiper">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="row ">
                                <div class="col-2">
                                    <iconify-icon icon="ri:double-quotes-l" class="quote-icon text-primary">
                                    </iconify-icon>
                                </div>
                                <div class="col-md-10 mt-md-5 p-5 pt-0 pt-md-5">
                                    <p class="testimonial-content fs-2">At the core of our practice is the idea that
                                        cities are the
                                        incubators of our
                                        greatest achievements, and the best hope for a sustainable future.</p>
                                    <p class="text-black">- Joshima Lin</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="row ">
                                <div class="col-2">
                                    <iconify-icon icon="ri:double-quotes-l" class="quote-icon text-primary">
                                    </iconify-icon>
                                </div>
                                <div class="col-md-10 mt-md-5 p-5 pt-0 pt-md-5">
                                    <p class="testimonial-content fs-2">At the core of our practice is the idea that
                                        cities are the
                                        incubators of our
                                        greatest achievements, and the best hope for a sustainable future.</p>
                                    <p class="text-black">- Joshima Lin</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="row ">
                                <div class="col-2">
                                    <iconify-icon icon="ri:double-quotes-l" class="quote-icon text-primary">
                                    </iconify-icon>
                                </div>
                                <div class="col-md-10 mt-md-5 p-5 pt-0 pt-md-5">
                                    <p class="testimonial-content fs-2">At the core of our practice is the idea that
                                        cities are the
                                        incubators of our
                                        greatest achievements, and the best hope for a sustainable future.</p>
                                    <p class="text-black">- Joshima Lin</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="swiper-pagination"></div>

                </div>
            </div>
        </div>
    </div>

</section>

<section id="bestselling" class="my-5 overflow-hidden">
    <div class="container py-5 mb-5">

        <div class="section-header d-md-flex justify-content-between align-items-center mb-3">
            <h2 class="display-3 fw-normal">Best selling products</h2>
            <div>
                <a href="#" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">
                    shop now
                    <svg width="24" height="24" viewBox="0 0 24 24" class="mb-1">
                        <use xlink:href="#arrow-right"></use>
                    </svg></a>
            </div>
        </div>

        <div class=" swiper bestselling-swiper">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              New
            </div> -->
                    <div class="card position-relative">
                        <a href="single-product.html"><img src="/frontend/images/item5.jpg" class="img-fluid rounded-4"
                                alt="image"></a>
                        <div class="card-body p-0">
                            <a href="single-product.html">
                                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                            </a>

                            <div class="card-text">
                                <span class="rating secondary-font">
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    5.0
                                </span>

                                <h3 class="secondary-font text-primary">$18.00</h3>

                                <div class="d-flex flex-wrap mt-3">
                                    <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                        <h5 class="text-uppercase m-0">Add to Cart</h5>
                                    </a>
                                    <a href="#" class="btn-wishlist px-4 pt-3 ">
                                        <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                    </a>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              New
            </div> -->
                    <div class="card position-relative">
                        <a href="single-product.html"><img src="/frontend/images/item6.jpg" class="img-fluid rounded-4"
                                alt="image"></a>
                        <div class="card-body p-0">
                            <a href="single-product.html">
                                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                            </a>

                            <div class="card-text">
                                <span class="rating secondary-font">
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    5.0
                                </span>

                                <h3 class="secondary-font text-primary">$18.00</h3>

                                <div class="d-flex flex-wrap mt-3">
                                    <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                        <h5 class="text-uppercase m-0">Add to Cart</h5>
                                    </a>
                                    <a href="#" class="btn-wishlist px-4 pt-3 ">
                                        <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
                        Sale
                    </div>
                    <div class="card position-relative">
                        <a href="single-product.html"><img src="/frontend/images/item7.jpg" class="img-fluid rounded-4"
                                alt="image"></a>
                        <div class="card-body p-0">
                            <a href="single-product.html">
                                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                            </a>

                            <div class="card-text">
                                <span class="rating secondary-font">
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    5.0
                                </span>

                                <h3 class="secondary-font text-primary">$18.00</h3>

                                <div class="d-flex flex-wrap mt-3">
                                    <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                        <h5 class="text-uppercase m-0">Add to Cart</h5>
                                    </a>
                                    <a href="#" class="btn-wishlist px-4 pt-3 ">
                                        <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                    </a>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              New
            </div> -->
                    <div class="card position-relative">
                        <a href="single-product.html"><img src="/frontend/images/item8.jpg" class="img-fluid rounded-4"
                                alt="image"></a>
                        <div class="card-body p-0">
                            <a href="single-product.html">
                                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                            </a>

                            <div class="card-text">
                                <span class="rating secondary-font">
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    5.0
                                </span>

                                <h3 class="secondary-font text-primary">$18.00</h3>

                                <div class="d-flex flex-wrap mt-3">
                                    <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                        <h5 class="text-uppercase m-0">Add to Cart</h5>
                                    </a>
                                    <a href="#" class="btn-wishlist px-4 pt-3 ">
                                        <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                    </a>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
                        -10%
                    </div>
                    <div class="card position-relative">
                        <a href="single-product.html"><img src="/frontend/images/item3.jpg" class="img-fluid rounded-4"
                                alt="image"></a>
                        <div class="card-body p-0">
                            <a href="single-product.html">
                                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                            </a>

                            <div class="card-text">
                                <span class="rating secondary-font">
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    5.0
                                </span>

                                <h3 class="secondary-font text-primary">$18.00</h3>

                                <div class="d-flex flex-wrap mt-3">
                                    <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                        <h5 class="text-uppercase m-0">Add to Cart</h5>
                                    </a>
                                    <a href="#" class="btn-wishlist px-4 pt-3 ">
                                        <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                    </a>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <!-- <div class="z-1 position-absolute rounded-3 m-3 px-3 border border-dark-subtle">
              New
            </div> -->
                    <div class="card position-relative">
                        <a href="single-product.html"><img src="/frontend/images/item4.jpg" class="img-fluid rounded-4"
                                alt="image"></a>
                        <div class="card-body p-0">
                            <a href="single-product.html">
                                <h3 class="card-title pt-4 m-0">Grey hoodie</h3>
                            </a>

                            <div class="card-text">
                                <span class="rating secondary-font">
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    <iconify-icon icon="clarity:star-solid" class="text-primary"></iconify-icon>
                                    5.0
                                </span>

                                <h3 class="secondary-font text-primary">$18.00</h3>

                                <div class="d-flex flex-wrap mt-3">
                                    <a href="#" class="btn-cart me-3 px-4 pt-3 pb-3">
                                        <h5 class="text-uppercase m-0">Add to Cart</h5>
                                    </a>
                                    <a href="#" class="btn-wishlist px-4 pt-3 ">
                                        <iconify-icon icon="fluent:heart-28-filled" class="fs-5"></iconify-icon>
                                    </a>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- / category-carousel -->


    </div>
</section>

<section id="register" style="background: url('/frontend/images/background-img.png') no-repeat;">
    <div class="container ">
        <div class="row my-5 py-5">
            <div class="offset-md-3 col-md-6 my-5 ">
                <h2 class="display-3 fw-normal text-center">Get 20% Off on <span class="text-primary">first
                        Purchase</span>
                </h2>
                <form>
                    <div class="mb-3">
                        <input type="email" class="form-control form-control-lg" name="email" id="email"
                            placeholder="Enter Your Email Address">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control form-control-lg" name="email" id="password1"
                            placeholder="Create Password">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control form-control-lg" name="email" id="password2"
                            placeholder="Repeat Password">
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-dark btn-lg rounded-1">Register it now</button>
                    </div>
                </form>
            </div>
        </div>
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
                        <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
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
                        <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
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
                        <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
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
                        <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="insta" class="my-5">
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
</section>



@endsection
