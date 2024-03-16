@extends('frontend.main_layout')
@section('main')
@include('frontend.body.header')

    <main class="product-details pb-5 overflow-hidden">
        <div class="container-fluid ps-0 pe-0">
            <div class="container-fluid p-0 banner">
                <img src="{{ asset('storage/categories/' . $category->banner_image) }}" alt="{{ $category->name }}"
                    class="img-fluid w-100 banner-image">
            </div>
            <h1 class="text-center pt-4 theme-font-color">{{ $category->name }}</h1>

            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 row-cols-xxl-5 g-4 px-md-5 px-2 py-3">
                @if ($products->count() > 0)
                    @foreach ($products as $key => $product)


                        {{-- <div class="col d-flex justify-content-center">
                            <a href="{{ route('product-details', $product->slug) }}" style="text-decoration: none;">
                                <div class="card border-0">
                                    <img class="card-img-top " src="{{ asset('storage/products/' . $product->image) }}"
                                        alt="{{ $product->name }}">
                                    <div class="card-body d-flex justify-content-between align-items-center border-1">
                                        <h6 class="card-title">{{ excerpt($product->name, 55) }}</h6>
                                        <i class="fas fa-regular fa-angle-right fs-5"></i>
                                    </div>
                                </div>
                            </a>
                        </div> --}}

                        <div class="col">
                            <div class="card new-arrival-card border-0 rounded h-100 ">
                                <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top img-fluid" >
    
                                <div class="card-footer d-flex justify-content-between align-items-center card-body">
                                    <div class=" card-text arrival-card-text">
                                        <span class="d-block">{!! Str::limit($product->name, 30, '') !!} </span>
                                    </div>
    
                                    <div class="card-icon">
                                        <a class="stretched-link" href="{{ route('product-details', $product->slug) }}"><i class="bi bi-arrow-right-circle text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        


                    @endforeach
                @else
                    <div class="col-12 text-center">
                        <p>No Product found in this category.</p>
                    </div>
                @endif

            </div>
            <a class="btn ps-4 pe-4 m-4 ms-5 fw-bold fs-5 me-auto theme-background-color text-white"
                href="{{ route('category') }}" role="button"><i class="fas fa-regular fa-angle-left pe-2"></i>Back</a>
        </div>
    </main>
@endsection
