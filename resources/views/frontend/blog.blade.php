@extends('frontend.main_layout')
@section('main')
@include('frontend.body.header')
<!-- BLOG-CARD -->
<main class="blog-section">
    <section>
        <div class="container d-flex justify-content-center align-items-center">
            <div class="blog-main-container py-1">
                @foreach ($blogs as $key => $blog)
                <div class="row mx-md-2">
                    @if($key % 2 == 0)
                        <div class="col-md-6 blog-card-img pt-md-0 pt-4">
                            <img src="{{ asset('storage/blogs/' . $blog->image) }}" class="img-fluid  text-center p-lg-3" alt="">
                        </div>
                    @endif
                    <div class="col-md-6 blog-text-container pb-md-0 pb-4">
                        <div class="p-lg-3 blog-main">
                            <h4 class="blog-title">{{ $blog->title }}</h4>
                            <p class="card-text"><small class="text-muted">{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</small></p>
                            <p class="blog-text p-0 m-0">{!! excerpt($blog->details, 450) !!}</p>
                            <button type="button" class="btn border-0 rounded-0 mt-3 d-flex justify-content-center align-items-center" style="background: #087194">
                                <a class="text-decoration-none text-light" href="{{ route('blog-details', $blog->slug) }}" role="button">Read More</a>
                                <i class="fa-solid fa-caret-right mt-1 ms-2 text-white"></i>
                            </button>
                        </div>
                    </div>
                    @if($key % 2 != 0)
                        <div class="col-md-6 blog-card-img pt-md-0 pt-4">
                            <img src="{{ asset('storage/blogs/' . $blog->image) }}" class="img-fluid  text-center p-lg-3" alt="">
                        </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection
