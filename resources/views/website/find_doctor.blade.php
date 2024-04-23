@extends('layout.mainlayout', ['activePage' => 'doctors'])

@section('css')
    <style>
        .mainDiv .hoverDoc {
            display: none;
        }

        .mainDiv:hover .mainDiv1 {
            display: none;
        }

        .mainDiv:hover .hoverDoc,
        .mainDiv1 {
            display: block;
        }
    </style>
@endsection

@section('content')
    {{-- Your Home For Health --}}
    <div class="pt-14 border-b border-white-light mb-10 pb-10">
        <h1 class="font-fira-sans font-semibold text-5xl text-center leading-10">{{ __('Your Home For') }} <span
                class="text-primary">{{ __('Health') }}</span></h1>
        <div class="p-5">
            <p class="font-fira-sans font-normal text-lg text-center leading-5 text-gray">
                {{ __('Find Better. Appoint Better') }}</p>
        </div>
        {{-- Search bar --}}
        <form action="{{ url('show-doctors') }}" id="searchForm" method="post">
            @csrf
            <div
                class="flex justify-center 2xl:flex-row xl:flex-row xlg:flex-row lg:flex-row xmd:flex-row md:flex-row sm:flex-row msm:flex-col
                xsm:flex-col xxsm:flex-col space-x-5 xmd:space-y-0 sm:space-y-0 sm:space-x-5 msm:space-x-0 xsm:space-x-0 xxsm:space-x-0 msm:p-5 msm:space-y-2 xsm:space-y-2 xsm:p-5 xxsm:space-y-2 xxsm:p-2">
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <input type="search" name="search_doctor"
                        class="block p-2 pl-10 text-sm text-black-700 bg-white-50 border border-white-light 2xl:w-96 xmd:w-72 !sm:w-32 msm:w-40 h-12"
                        placeholder="{{ __('Search Doctor...') }}">
                </div>
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <input type="hidden" name="from" value="js">
                    <input type="search" id="autocomplete"
                        class="block p-2 pl-10 text-sm text-black-700 bg-white-50 border border-white-light 2xl:w-96 xmd:w-72 !sm:w-32 msm:w-40 h-12"
                        placeholder="{{ __('Set your location') }}">
                    <input type="hidden" name="doc_lat">
                    <input type="hidden" name="doc_lang">
                </div>
                <button type="button" onclick="searchDoctor()" data-te-ripple-init data-te-ripple-color="light"
                    class="text-white bg-primary text-center px-6 py-2 text-base font-normal leading-5 font-fira-sans sm:w-32 msm:w-32 xsm:w-32 xxsm:w-32 h-12"><i
                        class="fa-solid fa-magnifying-glass"></i> {{ __('Search') }}</button>
            </div>
        </form>
    </div>

    <div class="xl:w-3/4 mx-auto">
        <div
            class="flex pt-5 2xl:flex-row xl:flex-row xlg:flex-row lg:flex-row xmd:flex-row md:flex-row sm:flex-row xsm:flex-col xxsm:flex-col">
            {{-- side bar --}}
            <div class="2xl:w-1/4 xl:w-1/4 xlg:w-1/4 lg:w-1/4 sm:w-72 px-4 py-5">
                <form id="filter_form" method="post">
                    <div class="flex justify-center">
                        <div class="w-full">
                            <select name="sort_by"
                                class="form-select appearance-none block w-full px-3 py-1.5 text-sm font-normal text-gray bg-white-50 bg-clip-padding bg-no-repeat border border-solid border-white-light transition ease-in-out m-0 focus:text-gray-700 focus:bg-white-50 focus:border-primary focus:outline-none"
                                aria-label="Default select example">
                                <option value="" selected>{{ __('Sort By') }}</option>
                                <option value="rating">{{ __('Rating') }}</option>
                                <option value="popular">{{ __('Popular') }}</option>
                                <option value="latest">{{ __('Latest') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-2">
                        <h1 class="font-fira-sans font-medium text-base leading-5 text-black-dark mt-5">{{ __('Gender') }}
                        </h1>
                        <div class="form-check p-1">
                            <input class="" name="gender_type" type="radio" value="male" id="male">
                            <label
                                class="font-fira-sans form-check-label inline-block font-normal text-black text-sm leading-4"
                                for="male">
                                {{ __('Male') }}
                            </label>
                        </div>
                        <div class="form-check p-1">
                            <input class=" " name="gender_type" type="radio" value="female" id="female">
                            <label
                                class="font-fira-sans form-check-label inline-block font-normal text-black text-sm leading-4"
                                for="female">
                                {{ __('Female') }}
                            </label>
                        </div>
                    </div>
                    <div>
                        <h1 class="font-fira-sans font-medium text-base leading-5 text-black-dark mt-5">
                            {{ __('Select Specialist') }}
                        </h1>
                        @foreach ($categories as $category)
                            <div class="form-check p-1">
                                <input name="select_specialist"
                                    class="form-check-input appearance-none h-4 w-4 border border-white-light rounded-sm bg-white checked:bg-primary checked:border-primary focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                    type="checkbox" value="{{ $category->id }}" id="category{{ $category->id }}">
                                <label
                                    class="font-fira-sans form-check-label inline-block font-normal text-black text-sm leading-4"
                                    for="category{{ $category->id }}">
                                    {{ $category->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>

            <div class="w-full">
                @if (count($doctors['data']) > 0)
                    <div
                        class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 xlg:grid-cols-2 lg:grid-cols-2 2xl:grid-cols-3 dispDoctor">
                        @include('website.display_doctors', ['doctor' => $doctors])
                    </div>
                @else
                    {{-- <div class="flex justify-center mt-10 font-fira-sans font-normal text-base text-gray">
                        {{ __('No Data Avalaible') }}
                    </div> --}}


                    @endif
                </div>
            </div>
            
            <div class="card doctor-card">
                <div class="card-body">
                    <div class="doctor-widget-one" style="padding: 10px 10px 0 10px;">
                        <div class="doctor-img">
                            <a href="">
                                <img src="https://doccure.dreamstechnologies.com/laravel/template/public/assets/img/doctors/doctor-13.jpg"
                                    class="img-fluid" alt="John Doe">
                            </a>
                            <div class="favourite-btn">
                                <a href="javascript:void(0)" class="favourite-icon">
                                    <i class="fas fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="doc-info-cont">
                            <h4 class="doc-name">
                                <a href="">Dr.John
                                    Doe</a>
                                <i class="fas fa-circle-check"></i>
                            </h4>
                            <p class="doc-speciality">MBBS, Dentist</p>
                            <div class="clinic-details">
                                <p class="doc-location">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span>0.9</span> mi - Newyork, USA <a href="javascript:void(0);">Get
                                        Direction</a>
                                </p>
                                <p class="doc-location">
                                    <i class="fa-solid fa-certificate"></i> <span>20</span> Years of
                                    Experience
                                </p>
                            </div>
                            <div class="reviews-ratings">
                                <p>
                                    <span><i class="fas fa-star"></i> 4.5</span> (35 Reviews)
                                </p>
                            </div>
                        </div>
                        <div class="doc-info-right">
                            <div class="clini-infos">
                                <ul>
                                    <li>
                                        <i class="fa-regular fa-clock available-icon"></i>
                                        <span class="available-date available-today">Available
                                            Today</span>
                                    </li>
                                    <li><i class="fa-solid fa-thumbs-up available-icon"></i> 98% <span
                                            class="votes">(252 Votes)</span></li>
                                    <li><i class="fa-solid fa-dollar-sign available-icon"></i> $1500 <i
                                            class="fa-solid fa-circle-info available-icon"></i></li>
                                </ul>
                            </div>
                            <div class="clinic-booking book-appoint">
                                <a class="btn btn-primary" href="">Book
                                    Appointment</a>
                                <a class="btn btn-outline-primary mt-2" href="">Book
                                    Online
                                    Consultation</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="doctor-profile-widget doc-grid">
                        <div class="doc-pro-img">
                            <a href="">
                                <div class="doctor-profile-img">
                                    <img src="https://doccure.dreamstechnologies.com/laravel/template/public/assets/img/doctors/doctor-13.jpg"
                                        class="img-fluid" alt="John Doe">
                                </div>
                            </a>
                            <div class="reviews-ratings">
                                <p>
                                    <span><i class="fas fa-star"></i> 4.5</span>
                                </p>
                            </div>
                            <div class="favourite-btn">
                                <a href="javascript:void(0)" class="favourite-icon">
                                    <i class="fas fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="doc-content">
                            <div class="doc-pro-info">
                                <div class="doc-pro-name">
                                    <h4><a href="">Dr.John
                                            Doe</a><i class="fas fa-circle-check"></i></h4>
                                    <p>Cardiology</p>
                                </div>
                                <div class="review-price ">
                                    <p class="mt-2">$1100.00<span>/hr</span></p>
                                </div>
                            </div>
                            <div class="doc-pro-location">
                                <p><i class="fa-solid fa-location-dot"></i> <span>0.9</span> mi - New York, USA</p>
                                <p><i class="fa-solid fa-certificate"></i> <span>15</span> Years of Experience</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="doctor-profile-widget doc-grid">
                        <div class="doc-pro-img">
                            <a href="">
                                <div class="doctor-profile-img">
                                    <img src="https://doccure.dreamstechnologies.com/laravel/template/public/assets/img/doctors/doctor-13.jpg"
                                        class="img-fluid" alt="John Doe">
                                </div>
                            </a>
                            <div class="reviews-ratings">
                                <p>
                                    <span><i class="fas fa-star"></i> 4.5</span>
                                </p>
                            </div>
                            <div class="favourite-btn">
                                <a href="javascript:void(0)" class="favourite-icon">
                                    <i class="fas fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="doc-content">
                            <div class="doc-pro-info">
                                <div class="doc-pro-name">
                                    <h4><a href="">Dr.John
                                            Doe</a><i class="fas fa-circle-check"></i></h4>
                                    <p>Cardiology</p>
                                </div>
                                <div class="review-price ">
                                    <p class="mt-2">$1100.00<span>/hr</span></p>
                                </div>
                            </div>
                            <div class="doc-pro-location">
                                <p><i class="fa-solid fa-location-dot"></i> <span>0.9</span> mi - New York, USA</p>
                                <p><i class="fa-solid fa-certificate"></i> <span>15</span> Years of Experience</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="doctor-profile-widget doc-grid">
                        <div class="doc-pro-img">
                            <a href="">
                                <div class="doctor-profile-img">
                                    <img src="https://doccure.dreamstechnologies.com/laravel/template/public/assets/img/doctors/doctor-13.jpg"
                                        class="img-fluid" alt="John Doe">
                                </div>
                            </a>
                            <div class="reviews-ratings">
                                <p>
                                    <span><i class="fas fa-star"></i> 4.5</span>
                                </p>
                            </div>
                            <div class="favourite-btn">
                                <a href="javascript:void(0)" class="favourite-icon">
                                    <i class="fas fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="doc-content">
                            <div class="doc-pro-info">
                                <div class="doc-pro-name">
                                    <h4><a href="">Dr.John
                                            Doe</a><i class="fas fa-circle-check"></i></h4>
                                    <p>Cardiology</p>
                                </div>
                                <div class="review-price ">
                                    <p class="mt-2">$1100.00<span>/hr</span></p>
                                </div>
                            </div>
                            <div class="doc-pro-location">
                                <p><i class="fa-solid fa-location-dot"></i> <span>0.9</span> mi - New York, USA</p>
                                <p><i class="fa-solid fa-certificate"></i> <span>15</span> Years of Experience</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{-- profile dortor --}}
        <div class="card mb-3">
            <div class="card-body">
                <div class="doctor-widget justify-content-between">
                    <div class="doc-info-left">
                        <div class="doctor-img">
                            <img src="https://doccure.dreamstechnologies.com/laravel/template/public/assets/img/doctors/doctor-thumb-02.jpg"
                                class="img-fluid" alt="User Image">
                        </div>
                        <div class="doc-info-cont">
                            <h4 class="doc-name">Dr. Darren Elder</h4>
                            <p class="doc-speciality">BDS, MDS - Oral & Maxillofacial Surgery</p>
                            <p class="doc-department"><img
                                    src="https://doccure.dreamstechnologies.com/laravel/template/public/assets/img/specialities/specialities-05.png"
                                    class="img-fluid" alt="Speciality">Dentist</p>
                            <div class="rating">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star"></i>
                                <span class="d-inline-block average-rating">(35)</span>
                            </div>
                            <div class="clinic-details">
                                <p class="doc-location"><i class="fas fa-map-marker-alt"></i> Newyork, USA - <a
                                        href="javascript:void(0);" style="color: #09e5ab;">Get Directions</a></p>
                                <ul class="clinic-gallery">
                                    <li>
                                        <a href="assets/img/features/feature-01.jpg" data-fancybox="gallery">
                                            <img src="https://media.lesechos.com/api/v1/images/view/636a35936c7f0a323d425176/1280x720/0702727334137-web-tete.jpg" alt="Feature">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="assets/img/features/feature-02.jpg" data-fancybox="gallery">
                                            <img src="https://france3-regions.francetvinfo.fr/image/L33LogEHsjSiZw5rpREBP1C4n3Q/1200x900/regions/2022/09/21/632b13ec179f1_geriatrie-hospi-senior-13web-chu-angers-credit-c-jouannet.jpg" alt="Feature Image">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="assets/img/features/feature-03.jpg" data-fancybox="gallery">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRRWnhTTv3bLiER9RzVf9iXD3pWDO9Z1LySuuxlm8x6TA&s" alt="Feature">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="assets/img/features/feature-04.jpg" data-fancybox="gallery">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRzGRXUIQhnpkjWIFKFjP84G-vc5SyS1SupFdnJuIBDrg&s" alt="Feature">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="clinic-services">
                                <span>Dental Fillings</span>
                                <span>Teeth Whitneing</span>
                            </div>
                        </div>
                    </div>
                    <div class="doc-info-right">
                        <div class="clini-infos">
                            <ul>
                                <li><i class="far fa-thumbs-up"></i> 99%</li>
                                <li><i class="far fa-comment"></i> 35 Feedback</li>
                                <li><i class="fas fa-map-marker-alt"></i> Newyork, USA</li>
                                <li><i class="far fa-money-bill-alt"></i> $100 per hour </li>
                            </ul>
                        </div>
                        <div class="doctor-action">
                            <a href="javascript:void(0)" class="btn btn-white fav-btn">
                                <i class="far fa-bookmark"></i>
                            </a>
                            <a href="https://doccure.dreamstechnologies.com/laravel/template/public/chat"
                                class="btn btn-white msg-btn">
                                <i class="far fa-comment-alt"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-white call-btn" data-bs-toggle="modal"
                                data-bs-target="#voice_call">
                                <i class="fas fa-phone"></i>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-white call-btn" data-bs-toggle="modal"
                                data-bs-target="#video_call">
                                <i class="fas fa-video"></i>
                            </a>
                        </div>
                        <div class="clinic-booking">
                            <a class="apt-btn"
                                href="https://doccure.dreamstechnologies.com/laravel/template/public/booking">Book
                                Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (count($doctors) > 0)
            @if ($doctors['current_page'] != $doctors['last_page'])
                <div
                    class="flex justify-center pt-8 pb-32 2xl:ml-64 xl:ml-72 xlg:ml-64 lg:ml-54 xmd:ml-44 sm:ml-20 xsm:ml-5 xxsm:ml-4">
                    <div class="sm:py-3 md:py-0 msm:py-3 xsm:py-3 xxsm:py-3" id="">
                        <button id="more-doctor" type="button" data-te-ripple-init data-te-ripple-color="light"
                            class="text-sm font-normal font-fira-sans leading-4 md:text-sm text-primary border border-primary text-center py-3.5 px-6">{{ __('View More') }}</button>
                    </div>
                </div>
            @endif
        @else
        @endif
    </div>
@endsection
@section('js')
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ App\Models\Setting::first()->map_key }}&sensor=false&libraries=places">
    </script>
    <script src="{{ url('assets/js/doctor_list.js') }}"></script>
@endsection
