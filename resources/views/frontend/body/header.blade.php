<nav class="navbar navbar-expand-lg navbar-light sticky-top"
    style="background-color: #FFFFFF; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.1);">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img class="img-fluid" src="{{ asset('frontend/images/logo.png') }}" alt="" srcset="">
        </a> <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
            class="navbar-toggler shadow-none" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse"
            type="button"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
                <li class="nav-item">
                    <a class="nav-link text-dark" id="black-color" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('about-us') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('category') }}">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('gallery') }}">Gallery</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
