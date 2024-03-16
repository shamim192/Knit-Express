<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $meta->meta_title }}</title>
    <meta name="keywords" content="{{ $meta->meta_keywords }}">
    <meta name="description" content="{{ $meta->meta_description }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/img//logo/blocktech1.png') }}">


    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- bootstrap-icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <!-- animate.css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- owl-carousel theame css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- owl-carousel theame min.css -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- fonts.google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@300;400&family=Frank+Ruhl+Libre:wght@300;400&family=Lato:wght@300;400;700;900&family=Montserrat:wght@400;500&family=Noto+Sans&family=Oswald:wght@300;400&family=Raleway&family=Roboto+Slab:wght@300;400&&family=Manrope:wght@300;400;500&display=swap"
        rel="stylesheet">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- ScrollReveal CDN -->
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>


    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.mod.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style-axis.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/category.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/contact.css') }}">

</head>

<body>

    <!-- header-area -->

    {{-- @include('frontend.body.header') --}}

    <!-- header-area-end -->

    <!-- main-area -->
    <main>

        @yield('main')

    </main>
    <!-- main-area-end -->



    <!-- Footer-area -->
    @include('frontend.body.footer')
    <!-- Footer-area-end -->





    <!-- JS here -->
    <script src="{{ asset('frontend/js/product.js') }}"></script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>


    <!-- owl-carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>


    <!-- imagesLoaded CDN -->
    <script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
    <!-- Masonry CDN -->
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>




    <!-- navbar-scroll -->
    <script>
        window.addEventListener('scroll', function() {
            if (window.scrollY > 400) {
                document.getElementById('navbar_top').classList.add('bg-danger');
                document.getElementById('navbar_top').classList.remove('bg-light');
            } else {
                document.getElementById('navbar_top').classList.remove('bg-danger');
                document.getElementById('navbar_top').classList.add('bg-light');
            }
        });
    </script>


    <!-- autofocus-search -->
    <script>
        $('.modal').on('shown.bs.modal', function() {
            console.log('autofocus');
            $(this).find('.autofocus').focus();
        });
    </script>


    {{-- Gallery, News, Project and Team --}}
    <script>
        var grid = document.querySelector('.masonry-row');
        var msnry;

        imagesLoaded(grid, 'done', function() {
            msnry = new Masonry(grid, {
                percentPosition: true,
            });

            ScrollReveal().reveal('.masonry-col', {
                distance: '200px',
                duration: 1500,
                easing: 'ease-in-out',
                mobile: false,
            });
        });
    </script>


    {{-- new-desigine-start --}}
    <!-- our-product -->
    <script>
        var swiper = new Swiper(".our-product", {
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            loop: true,
            slidesPerView: 1,
            grid: {
                rows: 2,
            },
            speed: 3000,
            pagination: {
                // el: ".swiper-pagination",
                // clickable: false,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 0,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                    grid: {
                        rows: 2,
                    },
                },
            },
        });
    </script>


    <!-- .our-customer -->
    <script>
        $('.our-customer').owlCarousel({
            // stagePadding: 80,
            loop: true,
            margin: 10,
            dots: false,
            autoplay: true,
            autoplayTimeout: 4000,
            // autoplayHoverPause: true,
            autoplaySpeed: 1500,
            // slideTransition: 'linear',
            nav: false,
            responsive: {
                0: {

                    items: 1,
                },
                600: {

                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>


    {{-- new-desigine-end --}}








    <!--Product  Swiper -->
    {{-- <script>
        // Product
        var swiper = new Swiper(".product", {
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: true,
            loop: true,
            cardsEffect: {
                slideShadows: true,
            },
            grabCursor: false,
            centeredSlides: false,
            breakpoints: {
                480: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 40
                },
                1600: {
                    slidesPerView: 5,
                    spaceBetween: 50
                }
            },
        });

        var swiper = new Swiper(".client", {
            slidesPerView: 1,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: true,
            loop: true,
            cardsEffect: {
                slideShadows: true,
            },
            grabCursor: false,
            centeredSlides: false,
            breakpoints: {
                480: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                1024: {
                    slidesPerView: 5,
                    spaceBetween: 40
                },
                1600: {
                    slidesPerView: 6,
                    spaceBetween: 50
                }
            },
        });

        // Navbar Hover
        /* $('.navbar .dropdown').hover(function () {
            $(this).find('.dropdown-menu').first().stop(true, true).slideDown(150);
        }, function () {
            $(this).find('.dropdown-menu').first().stop(true, true).slideUp(105);
        }); */


        $('.dropdown').hover(
            function() {
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn();
            },
            function() {
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut();
            }
        );

        $('.dropdown-menu').hover(
            function() {
                $(this).stop(true, true);
            },
            function() {
                $(this).stop(true, true).delay(200).fadeOut();
            }
        );

        // Media
        var all_text = document.querySelectorAll("div#text");
        var continue_reading = document.querySelectorAll("a#continue-reading")
        var cr = 0;
        all_text.forEach((text) => {
            var length = text.innerHTML.length;
            if (length > 250) {
                text.innerText = text.innerText.substr(0, 250);
                continue_reading[cr].style.visibility = "visible";
            }
            cr += 1;
        })

        const navItems = document.querySelectorAll('.about-nav-link');
        for (var i = 0; i < navItems.length; i++) {
            navItems[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active-nav-link");
                current[0].className = current[0].className.replace(" active active-nav-link", "");
                this.className += " active active-nav-link";
            });
        }

        // Gallery, News, Project and Team
        var grid = document.querySelector('.masonry-row');
        var msnry;

        imagesLoaded(grid, 'done', function() {
            msnry = new Masonry(grid, {
                percentPosition: true,
            });

            ScrollReveal().reveal('.masonry-col', {
                distance: '200px',
                duration: 1500,
                easing: 'ease-in-out',
                mobile: false,
            });
        });
    </script> --}}


</body>

</html>
