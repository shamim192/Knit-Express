@extends('frontend.main_layout')
@section('main')
    @include('frontend.body.header')
    <main class="category">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-12 col-md-4 col-lg-3 theme-background-color min-vh-100 p-0">
                    
                </div>

                <div class="col-sm-12 col-md-8 col-lg-9">
                    <div class="tab-content p-4">

                        @if ($parentCategories->isNotEmpty())
                            @foreach ($parentCategories as $key => $category)
                                <div class="tab-pane fade mt-md-2 mt-3" id="menu_cat{{ $category->id }}">
                                    <div class="row g-4">
                                        @if ($category->products->isNotEmpty())
                                            @foreach ($category->products as $product)
                                                <div class="col-lg-4 col-xxl-3">
                                                    <div class="card new-arrival-card border-0 rounded h-100">
                                                        <img src="{{ asset('storage/products/' . $product->image) }}"
                                                            alt="{{ $product->name }}" class="card-img-top img-fluid">
                                                        <div
                                                            class="card-footer d-flex justify-content-between align-items-center card-body">
                                                            <div class="card-text arrival-card-text">
                                                                <span class="d-block">{!! Str::limit($product->name, 20, '') !!}</span>
                                                            </div>
                                                            <div class="card-icon">
                                                                <a class="stretched-link"
                                                                    href="{{ route('product-details', $product->slug) }}"><i
                                                                        class="bi bi-arrow-right-circle text-white"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p>No products available in this category.</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No categories available.</p>
                        @endif

                        <div class="tab-pane fade mt-md-4 mt-3 px-xxl-4" id="swatch-card">
                            @if ($swatchCards->isNotEmpty())
                                <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xxl-2 g-4">
                                   
                                    @foreach ($swatchCards as $swatchCard)
                                        <div class="col">
                                            <div class="card p-0 border-0 shadow-sm">
                                                <div class="card-body p-0 m-0">
                                                </div>
                                                <img src="{{ asset('storage/swatch-cards/' . $swatchCard->image) }}"
                                                    class="img-fluid rounded-0 swatch-card-img" alt="...">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>No swatch cards available.</p>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
