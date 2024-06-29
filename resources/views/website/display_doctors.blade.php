@if (count($doctors) > 0)
    @if (isset($doctors['data']))
        @php
            $data = $doctors['data'];
        @endphp
    @else
        @php
            $data = $doctors;
        @endphp
    @endif
    {{-- <div class="mainDiv">
            <div
                class="mainDiv1 p-10 h-full border border-white-light 1xl:h-[350px] xxmd:h-[300px] xmd:h-[300px] msm:h-[300px]">
                <img class="1xl:mt-8 msm:mt-2 xsm:mt-0 xxsm:mt-0 border-2 border-primary rounded-full p-0.5 m-auto mt-12 object-cover w-36 h-36"
                    src="{{ url($doctor['fullImage']) }}" alt="" />
                <h5 class="font-fira-sans font-normal text-lg leading-6 text-black text-center md:text-md pt-5">
                    {{ $doctor['name'] }}</h5>
                <p class="font-normal leading-4 text-sm text-primary text-center font-fira-sans md:text-md py-2">
                    {{ $doctor['treatment']['name'] }}</p>
                <p class="font-normal leading-4 text-sm text-gray text-center md:text-md"><i
                        class="fa-solid fa-star text-yellow"></i> {{ $doctor['rate'] }}
                    ({{ $doctor['review'] }}{{ __(' reviews') }})
                </p>
            </div>

            <div
                class="hoverDoc bg-white shadow-2xl p-5 relative hover:z-50 xxsm:w-full xlg:w-[450px] lg:h-[300px] lg:overflow-y-auto xl:w-[685px] 1xl:h-[350px] 1xl:overflow-y-auto">
                <div data-id="{{ $doctor['id'] }}"
                    class="cursor-pointer absolute flex align-center justify-center shadow-2xl bg-white-50 add-favourite p-4 rounded-full text-primary">
                    <i class="{{ $doctor['is_fav'] == 'true' ? 'fa fa-bookmark' : 'fa-regular fa-bookmark' }}"></i>
                </div>
                <div
                    class="flex gap-10 mt-10 items-center xmd:ml-10 lg:ml-0 xxsm:ml-0 xlg:ml-0 xxsm:flex-col md:flex-row lg:flex-col xl:flex-row">
                    <div class="">
                        <img class="border-2 border-primary rounded-full p-0.5 object-cover w-36 h-36 ml-5"
                            src="{{ url($doctor['fullImage']) }}" alt="" />
                        <h5 class="font-fira-sans font-normal text-xl leading-6 text-black-dark pt-5 text-center">
                            {{ $doctor['name'] }}</h5>
                        <p class="font-normal leading-4 text-sm text-primary font-fira-sans py-2 text-center">
                            {{ $doctor['treatment']['name'] }}</p>
                        <p class="font-normal leading-4 text-sm text-gray text-center"><i
                                class="fa-solid fa-star text-yellow"></i> {{ $doctor['rate'] }}
                            ({{ $doctor['review'] }}{{ __(' reviews') }})</p>
                    </div>
                    <div
                        class="xxsm:pl-0 xmd:pl-10 xxsm:ml-0 xlg:pl-0 lg:ml-0 lg:pl-0 xlg:ml-5 md:pl-5 md:border-l-2 md:border-white-light xxsm:border-l-0 lg:border-l-0 xl:border-l-2 xl:pl-5">
                        <div>
                            <div class="mb-10">
                                <h2 class="font-fira-sans font-normal text-sm leading-4 text-gray">
                                    {{ $doctor['category']['name'] }}</h2>
                                @foreach ($doctor['hospital'] as $hospital)
                                    @if ($loop->iteration <= 2)
                                        <p
                                            class="font-fira-sans font-medium text-base leading-5 text-black-dark text-left pt-3">
                                            {{ $hospital['name'] }}</p>
                                        <p
                                            class="font-fira-sans font-normal text-sm leading-4 text-gray text-left pt-2">
                                            <span class="mr-2">
                                                <i class="fa-solid fa-location-dot"></i></span
                                                class="ml-2">{{ $hospital['address'] }}
                                        </p>
                                    @else
                                        <a
                                            href="{{ url('doctor-profile/' . $doctor['id'] . '/' . Str::slug($doctor['name'])) }}">
                                            <p
                                                class="font-fira-sans font-normal text-sm leading-4 text-black text-right">
                                                {{ __('More...') }} </p>
                                        </a>
                                    @break
                                @endif
                            @endforeach
                        </div>
                        <h1
                            class="font-fira-sans font-semibold text-2xl text-primary leading-7 pt-5 xmd:pt-2 sm:pt-1 mb-5">
                            <span class="font-light">{{ $currency }}</span> {{ $doctor['appointment_fees'] }}
                        </h1>
                        <div
                            class="flex xl:flex-row xlg:flex-row lg:flex-row xsm:flex-row xxsm:flex-col items-center">
                            <a href="{{ url('booking/' . $doctor['id'] . '/' . Str::slug($doctor['name'])) }}"
                                class="font-fira-sans text-white bg-primary hover:bg-primary text-sm text-center py-2.5 px-5">{{ __('Make Appointment') }}</a>
                            <a href="{{ url('doctor-profile/' . $doctor['id'] . '/' . Str::slug($doctor['name'])) }}"
                                class="font-fira-sans text-primary text-sm font-normal leading-4 underline py-2 ml-3">{{ __('View Profile') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

    {{-- <div class="px-2"> --}}
    @foreach ($data as $doctor)
        <div class="hidden col-md-4 px-2" id="doc-grid">
            <div class="">
                <a href="{{ url('doctor-profile/' . $doctor['id'] . '/' . Str::slug($doctor['name'])) }}">
                    <div class="doctor-profile-widget doc-grid">
                        <div class="doc-pro-img">
                            <a href="{{ url('doctor-profile/' . $doctor['id'] . '/' . Str::slug($doctor['name'])) }}">
                                <div class="doctor-profile-img">
                                    <img src="{{ url($doctor['fullImage']) }}" class="img-fluid" alt="John Doe">
                                </div>
                            </a>
                            <div class="d-flex justify-content-around reviews-favourite">
                                <div class="reviews-ratings">
                                    <p>
                                        <span><i class="fas fa-star"></i> {{ $doctor['rate'] }}
                                            ({{ $doctor['review'] }})
                                        </span>
                                    </p>
                                </div>
                                <div class="favourite-btn">
                                    <a href="javascript:void(0)" class="favourite-icon">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="doc-content" style="max-width: 303px;">
                            <div class="doc-pro-info">
                                <div class="doc-pro-name">
                                    <h4 class="text-capitalize"><a
                                            href="{{ url('doctor-profile/' . $doctor['id'] . '/' . Str::slug($doctor['name'])) }}">{{ $doctor['name'] }}</a><i
                                            class="fas fa-circle-check"></i></h4>
                                    <p class="text-capitalize">{{ $doctor['category']['name'] }}</p>
                                </div>
                                <div class="review-price ">
                                    <p class="mt-2">$1100.00<span>/hr</span></p>
                                </div>
                            </div>
                            <div class="doc-pro-location text-wrap">
                                @foreach ($doctor['hospital'] as $hospital)
                                    <div class="d-flex">
                                        <i class="fa-solid fa-location-dot pt-1"></i>
                                        <p class="text-capitalize ms-2" class="text-wrap">
                                            {{ $hospital['address'] }}</p>
                                    </div>
                                @endforeach
                                <p class="text-capitalize"><i class="fa-solid fa-certificate"></i>
                                    <span>{{ date('Y') - $doctor['experience'] }}</span> Ans d'expérience
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div id="doc-liste">
            <div class="card mb-3 w-100">
                <div class="card-body">
                    <div class="d-flex card_doc_profile">
                        <div class="doc-info-left d-flex">
                            <a href="{{ url('doctor-profile/' . $doctor['id'] . '/' . Str::slug($doctor['name'])) }}">
                                <div class="doctor-img">
                                    <img src="{{ url($doctor['fullImage']) }}" class="img-fluid" alt="User Image">
                                </div>
                            </a>
                            <a href="{{ url('doctor-profile/' . $doctor['id'] . '/' . Str::slug($doctor['name'])) }}">

                                <div class="doc-info-cont mt-2">
                                    <h4 class="doc-name">{{ $doctor['name'] }}</h4>
                                    {{-- @foreach ($treatments as $treatment) --}}
                                    <p class="doc-speciality">{{ $doctor['treatment']['name'] }}</p>
                                    {{-- @endforeach --}}
                                    <p class="doc-department"><img src="{{ $doctor['category']['fullImage'] }}"
                                            class="img-fluid" alt="Speciality">{{ $doctor['category']['name'] }}</p>
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">(35)</span>
                                    </div>
                                    <div class="clinic-details">
                                        @foreach ($doctor['hospital'] as $hospital)
                                            <p class="doc-location"><i class="fas fa-map-marker-alt"></i>
                                                {{ $hospital->address }}
                                                <a href="javascript:void(0);" style="color: #09e5ab;">Get Directions</a>
                                            </p>
                                        @endforeach
                                        <ul class="clinic-gallery">
                                            {{-- $doctors = $doctor->toArray(); --}}
                                            {{-- @foreach ($doctors['hospital'] as $hospital)
                                            @foreach ($hospital->hospital_gallery as $hospital_gallery)
                                                <li>
                                                    <a href="assets/img/features/feature-01.jpg" data-fancybox="gallery">
                                                        <img src="{{ asset('/images/upload/' . $hospital_gallery['image']) }}"
                                                            alt="Feature">
                                                    </a>
                                                </li>
                                            @endforeach --}}
                                            {{-- @endforeach --}}
                                        </ul>
                                    </div>
                                    <div class="clinic-services">
                                        <span>Dental Fillings</span>
                                        <span>Teeth Whitneing</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="doc-info-right">
                            <div class="clini-infos">
                                <ul>
                                    {{-- <li><i class="far fa-thumbs-up"></i> 99%</li>
                                    <li><i class="far fa-comment"></i> 35 Feedback</li> --}}
                                    @foreach ($doctor['hospital'] as $hospital)
                                        <li><i class="fas fa-map-marker-alt"></i> {{ $hospital->address }}</li>
                                    @endforeach
                                    <li><i class="far fa-money-bill-alt"></i>
                                        {{ $currency }}{{ $doctor['appointment_fees'] }} </li>
                                </ul>
                            </div>
                            <div class="doctor-action">
                                <a href="javascript:void(0)" class="btn btn-white fav-btn">
                                    <i class="far fa-bookmark"></i>
                                </a>
                                <a href="mailto:{{ $doctor['user']['email'] }}" class="btn btn-white msg-btn">
                                    <i class="far fa-comment-alt"></i>
                                </a>
                                <a href="tel:{{ $doctor['user']['phone'] }}" class="btn btn-white call-btn"
                                    data-bs-toggle="modal" data-bs-target="#voice_call">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-white call-btn" data-bs-toggle="modal"
                                    data-bs-target="#video_call">
                                    <i class="fas fa-video"></i>
                                </a>
                            </div>
                            <div class="clinic-booking">
                                <a class="apt-btn"
                                    href="{{ url('booking/' . $doctor['id'] . '/' . Str::slug($doctor['name'])) }}">{{ __('Make Appointment') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- </div> --}}
    </div>
@endif
