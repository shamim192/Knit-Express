@extends('frontend.main_layout')
@section('main')
    @include('frontend.body.header')
    <main class="contact">
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe width="100%" height="450" id="gmap_canvas"
                    src="https://maps.google.com/maps?q=Axis%20Safety%20Engineering%20Ltd&t=&z=11&ie=UTF8&iwloc=&output=embed"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                </iframe>
            </div>
        </div>

        <div class="container-fluid container-lg mt-md-5 mt-lg-0">
            <div class="row p-3 m-md-4 p-md-4 m-lg-5 p-lg-5 box-shadow rounded-4">
                <div class="col-sm-12 col-md-6 col-lg-5 border-end border-2">
                    <address class="d-flex flex-column">
                        <h2 class="">Kint Express Fabric Ltd.</h2>
                        <h6 class="fw-medium mt-3">Corporate Headquarters</h6>
                        <p>House# 02, Road#12/A Sector #10, Uttara Dhaka-1230</p>

                        <h6 class="fw-medium mt-3">Customer Service:</h6>
                        <a class="text-decoration-none" href="tel:+8801714980336">
                            <i class="bi bi-telephone-fill">
                                <span class="ps-2">+8801714980336</span>
                            </i>
                        </a>
                        <a class="text-decoration-none" href="tel:+8801712023146">
                            <i class="bi bi-telephone-fill">
                                <span class="ps-2 ">+8801712023146</span>
                            </i>
                        </a>

                        <h6 class="fw-medium mt-4">Technical Support:</h6>
                        <a class="text-decoration-none" href="tel:+8801714980336">
                            <i class="bi bi-telephone-fill">
                                <span class="ps-2">+8801714980336</span>
                            </i>
                        </a>
                        <a class="text-decoration-none" href="mailto:info@knitexpress.com.bd">
                            <i class="bi bi-envelope-fill">
                                <span class="ps-3">info@knitexpress.com.bd</span>
                            </i>
                        </a>
                    </address>
                </div>
                <div class="col-sm-12 col-md-6 ms-lg-5 mt-4 mt-md-0">
                    <h2>Contact Us</h2>
                    <form action="{{ route('contact-store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label fw-medium asterisk">First name, surname</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-medium asterisk">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-medium asterisk">Subject</label>
                            <input type="text" class="form-control" name="subject" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-medium">Your message (optional)</label>
                            <textarea class="form-control" name="message" id="" rows="2"></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger px-5 d-block mx-auto">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
