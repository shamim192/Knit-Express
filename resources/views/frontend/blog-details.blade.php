@extends('frontend.main_layout')
@section('main')
    @include('frontend.body.header')
    <!-- BLOG-DETAILS-BANNER -->
    <section class="blog-details-banner mt-1">
        <div class="container blog-details-container py-3">
            <div class="width-80 mx-auto">
                <img src="{{ asset('storage/blogs/' . $blog_details->image) }}" class="img-fluid "
                    alt="{{ $blog_details->title }}">
                <h3 class="mt-2 blog-details-title pe-lg-5"> {{ $blog_details->title }} </h3>
                <small class="m-0 p-0">{{ Carbon\Carbon::parse($blog_details->created_at)->format('d M Y') }}</small>
                <div class="my-5 blog-details-text">
                    <p class="">{!! $blog_details->details !!}</p>
                </div>
            </div>
        </div>
    </section>


    <!-- More Topic -->
    <section class="small-img-container my-3">
        <div class="container more-topic-container pb-4">
            <div class="width-80 mx-auto ">
                <h2 class="text-center py-4">More Topic</h2>
                <div
                    class="row row-cols-1 row-cols-md-3 g-5 d-flex justify-content-md-start justify-content-center align-items-center">
                    @foreach ($moreBlogs as $key => $item)
                        <div class="col">
                            <img src="{{ asset('storage/blogs/' . $item->image) }}" class="img-fluid"
                                alt="{{ $item->title_en }}" srcset="">
                            <div class="my-2 text-start">
                                <h5> {!! excerpt($item->title, 35) !!} </h5>
                                <button type="button" class="btn border-0 rounded-0 mt-2" style="background: #087194">
                                    <a href="{{ route('blog-details', $item->slug) }}"
                                        class="text-decoration-none text-light">Read More</a>
                                    <i class="fa-solid fa-caret-right mt-1 ms-2 text-white"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
