@extends('frontend.main_layout')
@section('main')
@include('frontend.body.header')
<main class="">
    <div class="container-fluid">
        <div class="row mx-0 mx-md-3 mx-lg-5 my-5 px-0 px-md-3 px-lg-2 py-4 shadow rounded justify-content-center ">
            <div class="col-sm-12 col-md-5 border-end">
                <img class="img-fluid" src="{{ asset('storage/products/' . $product->image) }}"
                    alt="{{ $product->name }}">
            </div>
            <div class="col-sm-12 col-md-7 pe-0 ">
                <div class=" row ">
                    <div class="col-md-7">
                        <h3 class="bg-color-text text-wrap me-2">{{ $product->name }}</h3>
                    </div>

                    <div class="col-md-5">
                        @if (isset($product->product_pdf))
                        {{-- <a name="" id="" class="btn btn-danger ps-3 pe-3 fw-semibold float-end"
                            href="{{ route('download-product', $product->id) }}" role="button" target="_blank">PDF
                            Download</a> --}}

                        {{-- <a name="" id="" class="btn btn-danger ps-3 pe-3 me-3 fw-semibold float-end"
                            href="{{ route('pdf', [ 'slug'=> $product->slug, 'pdf'=> $product->product_pdf, 'certificate'=> $product->product_certificate]) }}"
                            role="button" target="_blank">PDF View</a> --}}

                        <a name="" id="" class="btn btn-danger bg-color ps-3 pe-3 me-3 fw-semibold float-end "
                            href="{{ route('pdf', $product->slug) }}" role="button" target="_blank">PDF View</a>
                        @endif

                        {{-- @if (isset($product->product_certificate))

                        <a name="" id="" class="btn btn-danger bg-color ps-3 pe-3 me-3 fw-semibold float-end"
                            href="{{ route('certificate', $product->slug) }}" role="button" target="_blank">Certificate
                            View</a>
                        @endif --}}
                    </div>

                </div>
                <div class="mt-5 mt-lg-4">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active bg-color-text fw-semibold fs-5" data-bs-toggle="tab"
                                aria-current="page" href="#tab1">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-color-text fw-semibold fs-5" data-bs-toggle="tab"
                                href="#tab2">Specification</a>
                        </li>
                    </ul>

                    <div class="tab-content mt-3">
                        <div class="tab-pane container active" id="tab1">
                            {!! $product->details !!}
                        </div>
                        <div class="tab-pane container fade" id="tab2">
                            {!! $product->specification !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <a class="btn ps-4 pe-4 m-4 ms-5 fw-bold fs-5 me-auto bg-danger text-white"
            href="{{ route('product', $product->category->slug) }}" role="button"><i class="fas fa-regular fa-angle-left pe-2"></i>Back</a> --}}

            <a class="btn btn-danger ps-4 pe-4 m-4 ms-5 fw-bold fs-5 me-auto  bg-color text-white" href="{{ url()->previous() }}" role="button"><i class="fas fa-regular fa-angle-left pe-2"></i>Back</a>

             
    </div>
</main>
@endsection