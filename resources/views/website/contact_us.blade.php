@extends('layout.mainlayout', ['activePage' => 'terms'])

@section('content')
    <div>
        <div class="contact">
            <div class="contact-title">
                <h1>Contact Us</h1>
                <span><a href={{ url('/') }}>Home /</a> Contact Us</span>
            </div>
            <div class="container mt-10">
                <div class="row">
                    <div class="col-md-6 contact-left">
                        <label for="" class="contact-left-subtitle">Get in touch</label>
                        <h2 class="contact-left-title">Have Any Question?</h2>
                        <div class="contact-left-address">
                            <div class="icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <h5>Address</h5>
                                <label>8432 Mante Highway, Aminaport, USA</label>
                            </div>
                        </div>
                        <div class="contact-left-phone">
                            <div class="icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <h5>Phone Number</h5>
                                <label>+212 681783861</label>
                            </div>
                        </div>
                        <div class="contact-left-email">
                            <div class="icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div>
                                <h5>Email</h5>
                                <label>Abde@example.com</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 contact-right">
                        <div class="contact-right-form">
                            <form action="{{ route('send.email') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="" class="mb-2 fw-bold">Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter Your Name">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="" class="mb-2 fw-bold">Email Address</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Enter Email Address">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="" class="mb-2 fw-bold">Phone Number</label>
                                        <input type="number" name="phone" class="form-control"
                                            placeholder="Enter Phone Number">
                                    </div>
                                    <div class="col-md-6 mb-3 fw-bold">
                                        <label for="" class="mb-2">Services</label>
                                        <input type="text" name="services" class="form-control"
                                            placeholder="Enter Services">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label fw-bold">Message</label>
                                        <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"
                                            placeholder="Enter your comments"></textarea>
                                    </div>
                                    <div class="pt-4 px-3">
                                        <button type="submit" id="submit_contact" class="btn btn-primary px-3 fw-bold">Send
                                            Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
