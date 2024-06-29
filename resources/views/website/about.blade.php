@extends('layout.mainlayout',['activePage' => 'terms'])

@section('content')

<div>
    <div class="about">
        <div class="about-title">
            <h1>About Us</h1>
            <span><a href={{ url('/') }}>Home /</a> About Us</span>
        </div>
        <div class="container mt-10">
            <div class="row">
                <div class="row col-md-6 about-left ps-5">
                    <div class="col-md-6">
                        <div class="img-1">
                            <img src={{ url('/assets/image/about-img1.jpg') }} alt="">
                        </div>
                        <div class="img-2">
                            <img src={{ url('/assets/image/about-img2.jpg') }} alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-box">
                            <h4>Over 25+ Years Experience</h4>
                        </div>
                        <div class="img-3">
                            <img src={{ url('/assets/image/about-img3.jpg') }} alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 about-right">
                    <h6 for="">About Our Company</h6>
                    <h2>We Are Always Ensure Best Medical Treatment For Your Health</h2>

                    <div class="about-text">
                        {!! $aboutUs !!}
                    </div>
                    <div class="about-contact">
                        <div class="about-contact-icon">
                            <img src={{ url('assets/image/icons/phone-icon.svg') }} alt="">
                        </div>
                        <div class="about-contact-left">
                            <label for="">Need Emergency?</label>
                            <h4 class="m-0">{{ $phone }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
