@extends('frontend.main_layout')
@section('main')
    <main class="home">


        <!-- transparent-nav -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="navbar_top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img class="img-fluid" src="{{ asset('frontend/images/logo.png') }}" alt="">
                </a> <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                    class="navbar-toggler shadow-none" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse"
                    type="button"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link " id="black-color" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('about-us') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('category') }}">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('gallery') }}">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blog') }}">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="carousel slide" data-bs-ride="carousel" id="carouselExampleIndicators">
            <div class="carousel-indicators">
                <button aria-label="Slide 1" class="active" data-bs-slide-to="0" data-bs-target="#carouselExampleIndicators"
                    type="button"></button> <button aria-label="Slide 2" data-bs-slide-to="1"
                    data-bs-target="#carouselExampleIndicators" type="button"></button> <button aria-label="Slide 3"
                    data-bs-slide-to="2" data-bs-target="#carouselExampleIndicators" type="button"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img alt="..." class="d-block w-100" src="{{ asset('frontend/images/banner_1.png') }}">
                    <div class="carousel-caption caption-1 text-center">
                        <h5 class="animated bounceInRight roboto-font fs-2" style="animation-delay: 1s">Knit Express
                            Bangladesh Ltd.</h5>
                    </div>
                    <div class="carousel-caption caption-2 d-md-block d-none">
                        <div class="row w-50 g-2">
                            <div class="col-md-3 p-0 animated fadeIn" style="animation-delay: 2s">
                                <img class="img-fluid w-50 fw-bold" src="{{ asset('frontend/images/icon-1.png') }}" alt=""
                                    srcset="">
                            </div>
                            <div class="col-md-3 p-0 animated fadeIn" style="animation-delay: 3s">
                                <img class="img-fluid w-50" src="{{ asset('frontend/images/icon-2.png') }}" alt=""
                                    srcset="">
                            </div>
                            <div class="col-md-3 p-0 animated fadeIn" style="animation-delay: 4s">
                                <img class="img-fluid w-50" src="{{ asset('frontend/images/icon-3.png') }}" alt=""
                                    srcset="">
                            </div>
                            <div class="col-md-3 animated fadeIn" style="animation-delay: 5s">
                                <img class="img-fluid w-50" src="{{ asset('frontend/images/icon-4.png') }}" alt=""
                                    srcset="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item" data-bs-interval="10000">
                    <img alt="..." class="d-block w-100" src="{{ asset('frontend/images/banner_2.png') }}">
                    <div class="carousel-caption caption-1 text-center">
                        <h5 class="animated bounceInRight roboto-font fs-2" style="animation-delay: 1s">Think Safety, Work
                            Safely</h5>
                    </div>
                    <div class="carousel-caption caption-2 d-md-block d-none">
                        <div class="row w-50 g-4">
                            <div class="col-md-3 p-0 animated fadeIn" style="animation-delay: 2s">
                                <img class="img-fluid w-50" src="{{ asset('frontend/images/icon-1.png') }}" alt=""
                                    srcset="">
                            </div>
                            <div class="col-md-3 p-0 animated fadeIn" style="animation-delay: 3s">
                                <img class="img-fluid w-50" src="{{ asset('frontend/images/icon-2.png') }}" alt=""
                                    srcset="">
                            </div>
                            <div class="col-md-3 p-0 animated fadeIn" style="animation-delay: 4s">
                                <img class="img-fluid w-50" src="{{ asset('frontend/images/icon-3.png') }}" alt=""
                                    srcset="">
                            </div>
                            <div class="col-md-3 animated fadeIn" style="animation-delay: 5s">
                                <img class="img-fluid w-50" src="{{ asset('frontend/images/icon-4.png') }}" alt=""
                                    srcset="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="10000">
                    <img alt="..." class="d-block w-100" src="{{ asset('frontend/images/banner_3.png') }}">
                    <div class="carousel-caption caption-1 text-center">
                        <h5 class="animated bounceInRight roboto-font fs-2" style="animation-delay: 1s">Best Fabric Production Team In Dhaka</h5>
                    </div>
                    <div class="carousel-caption caption-2 d-md-block d-none">
                        <div class="row w-50 g-4">
                            <div class="col-md-3 p-0 animated fadeIn" style="animation-delay: 2s">
                                <img class="img-fluid w-50" src="{{ asset('frontend/images/icon-1.png') }}" alt=""
                                    srcset="">
                            </div>
                            <div class="col-md-3 p-0 animated fadeIn" style="animation-delay: 3s">
                                <img class="img-fluid w-50" src="{{ asset('frontend/images/icon-2.png') }}" alt=""
                                    srcset="">
                            </div>
                            <div class="col-md-3 p-0 animated fadeIn" style="animation-delay: 4s">
                                <img class="img-fluid w-50" src="{{ asset('frontend/images/icon-3.png') }}" alt=""
                                    srcset="">
                            </div>
                            <div class="col-md-3 animated fadeIn" style="animation-delay: 5s">
                                <img class="img-fluid w-50" src="{{ asset('frontend/images/icon-4.png') }}" alt=""
                                    srcset="">
                            </div>
                        </div>
                    </div>
                </div>
            </div><button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselExampleIndicators"
                type="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span> <span
                    class="visually-hidden">Previous</span></button> <button class="carousel-control-next"
                data-bs-slide="next" data-bs-target="#carouselExampleIndicators" type="button"><span aria-hidden="true"
                    class="carousel-control-next-icon"></span> <span class="visually-hidden">Next</span></button>
        </div>


        <!-- about-section -->
        <section class="my-md-0 my-5 about-section d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 d-flex justify-content-center align-items-end order-md-0 order-1">
                        <div>
                            <h1 class="fs-3 bg-color-text fw-medium">Best Fabric Company in Bangladesh.</h1>
                            <p>
                                Knit Express Fabric is the best fabric company in Bangladesh. It promotes safety and security
                                to protect life and property across major industries namely residential and commercial
                                facilities, oil and gas refineries, airports and aviation, health care and education,
                                military and police, hospitality and leisure
                            </p>
                            <h2 class="fs-4 bg-color-text">Why we are the best Fabric company in Bangladesh?</h2>
                            <p>
                                <li>We provides fire protection systems, fire detection systems, fire extinguishers and fire
                                    alarms.</li>
                                <li>Extensive experience and expertise in the fire safety industry.</li>
                                <li>Knowledge and skills to design, install, and maintain fire safety systems effectively
                                </li>
                                <li>We provide high-quality fire safety equipment and technologies.</li>
                                <li>We emphasize training and education for our clients</li>
                                <li>We provide regular maintenance and support service</li>
                                <li>As a top fire safety company, we have gained customer satisfaction</li>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 position-relative order-md-1 order-0 about-img-container">
                        <img class="img-fluid position-absolute about-img-1"
                            src="{{ asset('frontend/images/about-2.png') }}" alt="" srcset="">
                        <img class="img-fluid position-absolute about-img-2"
                            src="{{ asset('frontend/images/about-1.png') }}" alt="" srcset="">
                    </div>
                </div>
            </div>
        </section>


        <!-- partner -->
        <section class="my-5 py-md-5" style="background-color: Lavender;">
            <div class="container py-md-5 py-3">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-5">
                        <h2 class="fs-1 bg-color-text">Our Partner</h2>
                        <p style="text-align: justify">We value the strong partnership we have developed and look forward
                            to continuing to work closely
                            together to enhance our fire safety measures and respond effectively to any challenges that may
                            arise. Our professionalism, knowledge, and proactive approach make you an invaluable partner in
                            safeguarding our premises and the people within it.</p>
                    </div>
                    <div class="col-md-7 d-flex justify-content-center align-items-center mt-md-0 mt-3">
                        <div class="row g-md-4 g-3">

                            @foreach ($partners as $item)
                                <div class="col-6 col-md-3">
                                    <img class="img-fluid partner-img"
                                        src="{{ asset('storage/partners/' . $item->image) }}" alt=""
                                        srcset="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- category -->
        <section class="my-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="category-hero-container p-0">
                            <div class="category-hero-image p-0">
                                <div class="category-hero-text px-4" style="background-color: #D84A9A">
                                    <h3 class="mt-1">Double Jersey Fabric</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 position-relative category-img">
                        <div class="category-hero-container">
                            <div class="category-hero-image-2">
                                <div class="category-hero-text px-4" style="background-color: #e4b90d">
                                    <h3 class="text-white mt-1">Single Jersey Fabric</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="category-hero-container">
                            <div class="category-hero-image-3">
                                <div class="category-hero-text px-4" style="background-color: #5EC3DC">
                                    <h3 class="text-white mt-1">Knit Fabric</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="category-hero-container">
                            <div class="category-hero-image-4">
                                <div class="category-hero-text px-4" style="background-color: #8DD36E">
                                    <h3 class="text-white mt-1">Woven Fabric</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- all-product -->
        <section class="my-5">
            <div class="container">
                <!-- Swiper -->
                <h2 class="text-center py-md-4 my-3 bg-color-text">Our Products At A Glance</h2>
                <div class="swiper our-product">
                    <div class="swiper-wrapper">
                        @foreach ($products as $item)
                            <div class="swiper-slide row  d-flex justify-content-center align-items-center">
                                <div class="col-6">
                                    {!! MediaUploader::showImg('products', $item->image, [
                                        'class' => 'img-fluid',
                                        'alt' => $item->name,
                                        'fakeImg' => asset('assets/images/no-image.jpg'),
                                    ]) !!}
                                </div>
                                <div class="col-6 text-start">
                                    <h6>{{ $item->name }}</h6>
                                    <a class="text-decoration-none stretched-link"
                                        href="{{ route('product-details', $item->slug) }}"><small
                                            class="bg-color-text">Learn
                                            More</small></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>


        <!-- overview -->
        <section class="parallax-container my-5">
            <div class="parallax-content d-flex justify-content-center align-items-start">
                <div class="container text-white mt-5">
                    <div class="parallax-content-container">
                        <div>
                            <small>Think Safety, Work Safely</small>
                            <h3 class="mb-3">Few Facts About Knit Express Fabric</h3>
                            <p class="">Best Fabric Company in Bangladesh with having a great vision of to be
                                Number 1,
                                Engineering Solution provider. We never compromise on safety & quality.</p>
                        </div>

                        <div class="row justify-content-center px-md-5 mt-md-0 mt-5">
                            <div
                                class=" col-6 d-flex justify-content-center align-items-center flex-column border-bottom border-end py-md-3">
                                <h1 class="mb-2">60+</h1>
                                <h5>Engineers</h5>
                            </div>
                            <div
                                class="col-6 d-flex justify-content-center align-items-center flex-column border-bottom py-md-3">
                                <h1>150+</h1>
                                <h5>Projects</h5>
                            </div>
                            <div
                                class="col-6 d-flex justify-content-center align-items-center flex-column border-end py-md-3">
                                <h1>5</h1>
                                <h5>Years of Business</h5>
                            </div>
                            <div class="col-6 d-flex justify-content-center align-items-center flex-column py-md-3">
                                <h1>1000+</h1>
                                <h5>Products</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- customer -->
        <section class="my-5">
            <div class="container">
                <h2 class="text-center bg-color-text">Our Customer</h2>
                <div class="owl-carousel owl-theme  our-customer py-md-5">
                    @foreach ($clients as $item)
                        <div class="item d-flex justify-content-center align-items-center mb-4">
                            <img class="mx-auto customer-img img-fluid"
                                src="{{ asset('storage/clients/' . $item->image) }}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
            </div>
        </section>
    </main>
@endsection
