@extends('frontend.main_layout')
@section('main')
@include('frontend.body.header')
    <main class="gallery">
        <div class="container-fluid p-5">
            <h3 class="theme-font-color">Gallery</h3>
            <hr>
            <div class="row g-3 m-0 m-md-3 m-lg-4 masonry-row">
                @foreach ($galleries as $key => $gallery)
                    <div class="col-sm-12 col-md-6 col-lg-3 masonry-col">
                        <div class="card border-0 box-shadow" data-bs-toggle="modal" data-bs-target="#modalId">
                            <a href="#imageGallery" data-bs-slide-to="{{ $key }}">
                                <img class="card-img rounded-3" src="{{ asset('storage/galleries/' . $gallery->image) }}"
                                    alt="{{ $gallery->title }}">
                            </a>
                            <i class="bi bi-zoom-in fs-2 text-primary fw-bolder overlay-icon"></i>
                            <h6 class="overlay-title pt-1 pb-1">{{ $gallery->title }}</h6>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
                role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title pull-left theme-font-color" id="modalTitleId">Image Gallery</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="imageGallery" class="carousel slide" data-bs-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach ($galleries as $key => $gallery)
                                        <li data-bs-target="#imageGallery" data-bs-slide-to="{{ $key }}"
                                            aria-label="{{ $gallery->title }}" class="{{ $key == 0 ? 'active' : '' }}"
                                            aria-current="{{ $key == 0 ? 'true' : '' }} "></li>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    @foreach ($galleries as $key => $gallery)
                                        <div class="carousel-item  {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ asset('storage/galleries/' . $gallery->image) }}"
                                                class="img-fluid d-block w-100 modal-image-height rounded-3"
                                                alt="{{ $gallery->title }}">
                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>{{ $gallery->title }}</h5>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#imageGallery"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#imageGallery"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
