@extends('frontend.main_layout')
@section('main')
    @include('frontend.body.header')
    <main class="about">

        <div class="container-fluid p-0 banner">
            <img src="{{ asset('frontend/images/about_us_banner.png') }}" class="img-fluid banner-image" alt="">
        </div>

        <section class="navbar-scrollspy container-fluid container-lg p-0 shadow-sm overflow-hidden">
            <div data-bs-spy="scroll" data-bs-target="#navbarId" data-bs-root-margin="" data-bs-smooth-scroll="true"
                class="scrollspyId scrollspy-container rounded-2" tabindex="0">
                <div class="content" id="scrollspyHeading1">
                    <div class="row d-flex justify-content-evenly align-items-start py-5 px-3" id="scrollspyHeading1">
                        <div class="col-sm-12 col-md-7 order-1 order-md-0">
                            <h3 class="mb-2">The best knit Fabric company | A Message from the Chairman</h3>
                            <p class="decoration">At Knit Express BD, we are dedicated to achieving excellence in fabric
                                knitting. Our commitment goes beyond mere production; it's about ensuring quality,
                                efficiency, and innovation in every step of the knitting process.At Knit Express BD, we are
                                committed to sustainable practices in fabric knitting. We prioritize eco-friendly materials
                                and processes, minimizing waste and reducing our environmental footprint. Our goal is to
                                create fabrics that not only meet the highest quality standards but also contribute to a
                                greener, more sustainable future.We offer a wide range of knitted fabrics to cater to
                                diverse needs and applications. From lightweight jersey knits to heavy-duty ribbed fabrics,
                                our product portfolio is designed to meet the demands of various industries, including
                                fashion, sportswear, and home textiles. Additionally, we provide custom knitting services to
                                accommodate unique design specifications and preferences.

                                At Knit Express BD, fabric knitting isn't just a process—it's a passion. We are dedicated to
                                pushing the boundaries of innovation, quality, and sustainability to deliver the best
                                possible fabric solutions to our customers. Join us on our journey to redefine the art of
                                fabric knitting.</p>
                        </div>
                        <div class="col-sm-12 col-md-4 order-0 order-md-1 pb-5">
                            <div class="card rounded-0 border-0">
                                <img class="img-fluid rounded-0 border-0"
                                    src="{{ asset('frontend/images/about_us_chairman.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content" id="scrollspyHeading2">
                    <div class="row d-flex justify-content-evenly align-items-start py-5 px-3" id="scrollspyHeading2">
                        <div class="col-sm-12 col-md-7 order-1 order-md-0">
                            <h3 class="mb-2">About best knit fabric company | A Message from the Director.</h3>
                            <p class="decoration">WOur ultimate goal is customer satisfaction. We work closely with our
                                clients to understand their unique requirements and deliver tailored fabric solutions that
                                exceed their expectations. With a focus on reliability, flexibility, and responsiveness, we
                                strive to build long-lasting partnerships based on trust and mutual success. We prioritize
                                eco-friendly materials
                                and processes, minimizing waste and reducing our environmental footprint. Our goal is to
                                create fabrics that not only meet the highest quality standards but also contribute to a
                                greener, more sustainable future.We offer a wide range of knitted fabrics to cater to
                                diverse needs and applications. From lightweight jersey knits to heavy-duty ribbed fabrics,
                                our product portfolio is designed to meet the demands of various industries, including
                                fashion, sportswear, and home textiles. Additionally, we provide custom knitting services to
                                accommodate unique design specifications and preferences.

                                At Knit Express BD, fabric knitting isn't just a process—it's a passion. We are dedicated to
                                pushing the boundaries of innovation, quality, and sustainability to deliver the best
                                possible fabric solutions to our customers. Join us on our journey to redefine the art of
                                fabric knitting.</p>
                        </div>
                        <div class="col-sm-12 col-md-4 order-0 order-md-1 pb-5">
                            <div class="card border-0 rounded-0">
                                <img class="img-fluid rounded-0 border-0"
                                    src="{{ asset('frontend/images/about_us_md.jpg') }}"alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content" id="scrollspyHeading4">
                    <div class="row d-flex justify-content-evenly align-items-start py-5 px-3" id="scrollspyHeading4">
                        <div class="col-sm-12 col-md-7 order-1 order-md-0">
                            <h3 class="mb-2">Our Mission</h3>
                            <p class="decoration">At Knit Express BD, our mission is to revolutionize the fabric knitting
                                industry in Bangladesh and beyond. We are committed to fostering economic growth by
                                providing superior fabric knitting solutions while prioritizing the satisfaction of our
                                clients.We strive to ensure that every fabric knitted meets the highest standards of quality
                                and compliance. With a deep understanding of national and international regulations,
                                including industry standards like NFPA and BNBC, we guarantee that our products adhere to
                                the strictest guidelines.</p>
                        </div>
                        <div class="col-sm-12 col-md-4 order-0 order-md-1 pb-5">
                            <div class="card border-0 rounded-0">
                                <img class="img-fluid rounded-0 border-0"src="{{ asset('frontend/images/mission.png') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content" id="scrollspyHeading5">
                    <div class="row d-flex justify-content-evenly align-items-start py-5 px-3">
                        <div class="col-sm-12 col-md-7 order-1 order-md-0">
                            <h3 class="mb-2">Our Vision</h3>
                            <p class="decoration">As we work towards realizing our vision, we remain guided by our core
                                values of integrity, excellence, and customer-centricity. We are committed to staying true
                                to our mission, embracing change, and continuously striving for improvement. Together, we
                                will shape a future where Knit Express BD is synonymous with excellence, innovation, and
                                sustainability in fabric knitting.</p>
                        </div>
                        <div class="col-sm-12 col-md-4 order-0 order-md-1 pb-5">
                            <div class="card border-0 rounded-0">
                                <img class="img-fluid rounded-0 border-0"
                                    src="{{ asset('frontend/images/vission.png') }}"alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
