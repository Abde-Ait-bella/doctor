@extends('layout.mainlayout', ['activePage' => 'doctors'])

@section('css')
    <link rel="stylesheet" href="{{ url('assets/css/intlTelInput.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.5/dist/flowbite.min.css" />
    <style>
        .text-danger {
            color: red;
        }

        .error-message {
            display: none;
        }
    </style>
    <style>
        .custom-error {
            font-size: 12px;
            color: #d20f0f;
            font-weight: bold;
        }

        .activeAddress {
            border-color: #5da1ff !important;
            background-color: #f4fbfd;
        }

        .activeTimeslots {
            border-color: var(--site_color) !important;
            background-color: var(--site_color) !important;
            color: white !important;
        }

        .activeTimeslots svg {
            display: inline !important
        }

        svg {
            display: inline !important;
        }

        .datepicker-footer {
            position: inherit !important;
        }

        #offer-code {
            --tw-ring-shadow: 0px;
        }

        .datepicker-header {
            height: 45px;
            background-color: transparent;
        }

        .datepicker-cell.focused {
            border-radius: 50%;
            border-radius: 50%;
            height: 50px;
            width: 50px;
            line-height: 50px;
        }

        .datepicker-cell.focused {
            border-radius: 50%;
            border-radius: 50%;
            height: 50px;
            width: 50px;
            line-height: 50px;
        }

        .datepicker-cell {
            height: 50px;
            width: 50px;
            line-height: 50px !important;
        }

        .datepicker-cell:hover {
            border-radius: 50%;
        }

        #datepickerId .datepicker-picker.shadow-lg {
            box-shadow: none;
        }

        .datepicker.datepicker-inline.active.block {
            display: inline !important;
        }

        #datepickerId {
            text-align: center;
        }

        .datepicker-view {
            display: flow-root !important;
        }

        .datepicker-grid {
            width: 100% !important;
        }

        .paymentDiv {
            /* width: 148px !important; */
            height: 87px !important;
            /* padding: 1rem !important; */
            cursor: pointer;
        }

        .activePayment {
            color: #2563eb !important;
            background: #f4fbfd !important;
        }

        .mapClass {
            height: 235px;
            border-radius: 12px;
        }

        .select2-container--default .select2-selection--single {
            border-radius: 0px;
            height: 35px !important;
            /* height: 100% !important; */
        }

        .select2-container--default .select2-selection--multiple {
            height: 35px !important;
            border-radius: 0px !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #2563eb;
            border: 1px solid #2563eb;
        }
    </style>
@endsection

@section('content')
    <div class="xl:w-3/4 mx-auto">
        <div class="xsm:mx-4 xxsm:mx-5 pt-10 mb-3">
            <h1 class="font-fira-sans font-medium text-4xl text-center leading-10 pb-5">{{ __('Prise de rendez-vous') }}</h1>

            <div class="Appointment-detail position-relative">
                <div class="progress">
                    <div class="progress" id="progress"></div>
                </div>
                <div class="d-flex justify-content-around w-full position-absolute" style="top: -6px;">
                    <div class="circle progress_active ">1</div>
                    <div class="circle">2</div>
                    <div class="circle">3</div>
                </div>
            </div>

            <div class=" d-flex justify-content-around mt-3 fw-bold text-secondary">
                <div class="progress_text progress_active">Date/Heure</div>
                <div class="progress_text">Vérification</div>
                <div class="progress_text">Confirmation</div>
            </div>
        </div>

        <div class="fixed top-0 left-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
            id="exampleModalCenteredScrollable" tabindex="-1" role="dialog">
            <div
                class="relative bg-white rounded-lg shadow dark:bg-gray-700 transition-all duration-300 ease-in-out w-full max-w-2xl max-h-full">
                <div
                    class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white-50 bg-clip-padding rounded-md outline-none text-current">
                    <div
                        class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-white-light rounded-t-md">
                        <h5 class="text-xl font-medium leading-normal text-gray-800"
                            id="exampleModalCenteredScrollableLabel">
                            {{ __('Add Address') }}
                        </h5>
                        <button type="button" data-te-modal-dismiss
                            class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                            data-bs-dismiss="modal" data-modal-hide="exampleModalCenteredScrollable" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="modal-body relative p-4">
                        <form class="addAddress" method="post">
                            <input type="hidden" name="from" value="add_new">
                            <div class="w-auto border border-white-light" id="map" style="height: 200px">
                                {{ __('Rajkot') }}</div>
                            <input type="hidden" name="lat" id="lat" value="{{ $setting->lat }}">
                            <input type="hidden" name="lang" id="lng" value="{{ $setting->lang }}">
                            {{-- <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> --}}
                            <textarea name="address"
                                class="mt-2 form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white-50 bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="exampleFormControlTextarea1" rows="3" placeholder="Your message"></textarea>
                            <span class="invalid-div text-red"><span
                                    class="address text-sm  text-red-600 font-fira-sans"></span></span>
                        </form>
                    </div>
                    <div
                        class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-white-light rounded-b-md">
                        <button type="button" data-modal-hide="exampleModalCenteredScrollable" data-te-ripple-color="light"
                            class="modelCloseBtn inline-block px-6 py-2.5 bg-white-50 text-gray font-medium text-xs leading-tight uppercase rounded shadow-md active:shadow-lg transition duration-150 ease-in-out">{{ __('Close') }}</button>
                        <button type="button" onclick="addAddress()"
                            class="inline-block px-6 py-2.5 !bg-primary text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">{{ __('Add Address') }}</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="doctor-profile-img d-flex">
                        @php
                            $date = Carbon\Carbon::now(env('timezone'));
                        @endphp
                        <img src="{{ url($doctor['fullImage']) }}" class="img-fluid" alt="John Doe">
                        <div class="booking-info ms-3">
                            <h4 class="fw-bold text-muted text-capitalize">{{ $doctor['name'] }}</h4>
                            <div class="rating mt-1 mb-1">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star "></i>
                                <span class="d-inline-block average-rating">35</span>
                            </div>
                            <p class="text-muted mb-0">
                                @foreach ($doctor->hospital as $hospital)
                                    @if ($loop->first)
                                        <i class="fas fa-map-marker-alt me-2"></i>
                                        {{ $hospital['address'] }}
                                    @endif
                                @endforeach

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <form id="appointmentForm">
                <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                <input type="hidden" id="doctor_name" value="{{ $doctor['name'] }}">
                <input type="hidden" name="currency" value="{{ $setting->currency_code }}">
                <input type="hidden" name="company_name" value="{{ $setting->business_name }}">
                {{-- <input type="hidden" name="user_name" value="{{ auth()->user()->name }}"> --}}
                {{-- <input type="hidden" name="patient_name" value="{{ auth()->user()->name }}"> --}}
                {{-- <input type="hidden" name="email" value="{{ auth()->user()->email }}"> --}}
                {{-- <input type="hidden" name="phone_no" value="{{ auth()->user()->phone }}"> --}}
                <input type="hidden" name="payment_type" value="COD">
                <input type="hidden" name="amount" step="any" value="{{ $doctor->appointment_fees }}">
                <input type="hidden" name="payment_token">
                <input type="hidden" name="payment_status" value="0">
                <input type="hidden" name="discount_price">
                <input type="hidden" name="discount_id">

                @foreach ($doctor->hospital as $hospital)
                    @if ($loop->first)
                        @php
                            $hospital_name = $hospital->name;
                            $address = $hospital->address;
                        @endphp
                        <input type="hidden" name="hospital_id" value="{{ $hospital->id }}">
                    @endif
                @endforeach

                <div id="step1" class="block">

                    <div class="header-booking row border rounded mb-5">
                        <ul class="header-booking-table d-flex justify-content-around fw-bold py-2 px-3 position-relative">
                            <li class="arow-left" onclick="arrowLeft()">
                                <i class="fa-solid fa-chevron-left"></i>
                            </li>
                            <li class="text-center">
                                <label id="day_0" for=""></label>
                                <p class="date" id="date_0"></p>
                            </li>
                            <li class="text-center">
                                <label id="day_1" for=""></label>
                                <p class="date" id="date_1"></p>
                            </li>
                            <li class="text-center">
                                <label id="day_2" for=""></label>
                                <p class="date" id="date_2"></p>
                            </li>
                            <li class="text-center">
                                <label id="day_3" for=""></label>
                                <p class="date" id="date_3"></p>
                            </li>
                            <li class="text-center">
                                <label id="day_4" for=""></label>
                                <p class="date" id="date_4"></p>
                            </li>
                            <li class="text-center">
                                <label id="day_5" for=""></label>
                                <p class="date" id="date_5"></p>
                            </li>
                            <li class="text-center">
                                <label id="day_6" for=""></label>
                                <p class="date" id="date_6"></p>
                            </li>
                            <li class="arow-right" onclick="arrowRight()">
                                <i class="fa-solid fa-chevron-right"></i>
                            </li>
                        </ul>
                        <hr>
                        <div class="col-md-12 bg-white">
                            <div class="d-flex justify-content-around fw-bold py-3">
                                <input type="hidden" name="time" id="time">
                                <input type="hidden" name="date" id="date">
                                <div id="times-btns_0">
                                    {{-- <li class="timing border rounded d-flex align-items-center mb-2" onclick="Time(this)">
                                            <input type="hidden" class="btn_time" id="btn_time" value="09:00">09:00 AM</input>
                                        </li>
                                        <li class="timing border rounded d-flex align-items-center mb-2" onclick="Time(this)">
                                            <input type="hidden" class="btn_time" id="btn_time_1" value="90:00">09:00 AM</input>
                                        </li>
                                        <li class="timing border rounded d-flex align-items-center mb-2" onclick="Time(this)">
                                            <input type="hidden" class="btn_time" id="btn_time_2" value="90:00">09:00 AM</input>
                                        </li>
                                        <li class="timing border rounded d-flex align-items-center mb-2" onclick="Time(this)">
                                            <input type="hidden" class="btn_time" id="btn_time_3" value="90:00">09:00 AM</input>
                                        </li>
                                        <li class="timing border rounded d-flex align-items-center mb-2" onclick="Time(this)">
                                            <input type="hidden" class="btn_time" id="btn_time_4" value="90:00">09:00 AM</input>
                                        </li>
                                        <li class="timing border rounded d-flex align-items-center mb-2" onclick="Time(this)">
                                            <input type="hidden" class="btn_time" id="btn_time_5" value="90:00">09:00 AM</input>
                                        </li>
                                        <li class="timing border rounded d-flex align-items-center mb-2" onclick="Time(this)">
                                            <input type="hidden" class="btn_time" id="btn_time_6" value="90:00">09:00 AM</input>
                                        </li> --}}
                                </div>
                                <div id="times-btns_1">
                                </div>
                                <div id="times-btns_2">
                                </div>
                                <div id="times-btns_3">
                                </div>
                                <div id="times-btns_4">
                                </div>
                                <div id="times-btns_5">
                                </div>
                                <div id="times-btns_6">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="step2" class="hidden">
                    <div class="border rounded d-flex flex-column justify-content-center mb-5"
                        style="min-height: 213px; background-color: #e9e9e9;">
                        <h2 class="text-center text-center fs-4 fw-bold" style="color: rgb(37, 150, 190)">Saisissez vos
                            informations</h2>
                        <div class="d-flex flex-column align-items-center mt-3">
                            <div class="col-md-5">
                                <input
                                    class="col-md-12 text-sm font-fira-sans text-gray block z-20 border border-white-light rounded mb-2"
                                    type="text" placeholder="Nom / Prénom" name="patient_name" id="patient_name">
                                <div class="w-full mb-2">
                                    <input type="text" name="phone_no" value="{{ old('phone') }}" id="phone"
                                        class="w-full text-sm font-fira-sans text-gray block z-20 border border-white-light rounded phone mb-1 mt-1"
                                        placeholder="{{ __('Enter Phone Number') }}">
                                </div>
                                <p class="text-info text-center">Un code va vous être envoyé sur ce numéro pour valider
                                    votre RDV.</p>
                                <input type="hidden" value="+212" id="phone_code">
                            </div>
                        </div>
                    </div>
                </div>

                <div id="step3" class="hidden"">
                    <div class="border rounded d-flex flex-column justify-content-center mb-5"
                        style="min-height: 213px; background-color: #e9e9e9;">
                        <h2 class="text-center text-center fs-4 fw-bold" style="color: rgb(37, 150, 190)">Confirmation
                        </h2>
                        <div class="d-flex flex-column align-items-center mt-3">
                            <p class="text-info mt-2" id="confirmation_code"></p>

                            <div class="col-md-5">
                                <input class="col-md-6 rounded b-2 mt-4 w-full" type="text"
                                    placeholder="Code Confirmation" id="codeVerify">
                            </div>
                        </div>
                    </div>
                </div>

            </form>

            <div class="Appointment-detail flex justify-between mt-3 mb-3">
                <button type="button"
                    class="border !border-primary text-white !bg-primary text-center w-32 h-11 text-base font-normal leading-5 font-fira-sans rounded"
                    id="prev" disabled><i class="fa-solid fa-chevron-left"></i> {{ __('Précédent') }}</button>
                <button type="button"
                    class="!text-white !bg-primary text-center text-base font-normal font-fira-sans w-32 h-11 rounded"
                    id="next">{{ __('Suivant') }} <i class="fa-solid fa-chevron-right"></i></button>
                <button type="button" id="valid" onclick="checkCode()"
                    class="!text-white !bg-primary text-center text-base font-normal font-fira-sans w-32 h-11 rounded hidden">{{ __('Confirmer') }}</button>
            </div>
            {{-- <div class="codDiv d-flex justify-content-center">
                <input type="button" id="envoyer"
                    class="font-fira-sans text-white bg-success p-2 text-lg font-normal w-40 h-11 cursor-pointer mb-5 rounded hidden"
                    onclick="booking()" value="{{ __('Valider') }}">
            </div> --}}

        </div>

    </div>
@endsection

@section('js')
    <script>
        const doctorWorkHour = @json(@$doctorWorkHour);
    </script>

    <script type="module">
        // Import the functions you need from the SDKs you need
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
        import {
            getAnalytics
        } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-analytics.js";
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
            apiKey: "AIzaSyBMvkLWMkGrXDLEeo6XonHGVs0e5g7AhAo",
            authDomain: "docteur-421318.firebaseapp.com",
            projectId: "docteur-421318",
            storageBucket: "docteur-421318.appspot.com",
            messagingSenderId: "941892394125",
            appId: "1:941892394125:web:6529cb8c4534c1de0c16c4",
            measurementId: "G-BJ1WRZ6TE5"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);
    </script>

    <script src="{{ url('assets/js/boocking.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="https://unpkg.com/flowbite-datepicker@1.2.2/dist/js/datepicker-full.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    @if (App\Models\Setting::first()->paystack_public_key)
        <script src="{{ url('payment/paystack.js') }}"></script>
    @endif
    <script src="{{ url('payment/razorpay.js') }}"></script>

    @if ($setting->paypal)
        <script
            src="https://www.paypal.com/sdk/js?client-id={{ App\Models\Setting::first()->paypal_client_id }}&currency={{ App\Models\Setting::first()->currency_code }}"
            data-namespace="paypal_sdk"></script>
    @endif
    <script src="{{ url('payment/stripe.js') }}"></script>
    <script src="{{ url('assets/js/appointment.js') }}"></script>

    @if (App\Models\Setting::first()->map_key)
        <script
            src="https://maps.googleapis.com/maps/api/js?key={{ App\Models\Setting::first()->map_key }}&callback=initAutocomplete&libraries=places&v=weekly"
            async></script>
    @endif
    <script>
        var datepicker = '';
        const datepickerEl = document.getElementById('datepickerId');
        datepicker = new Datepicker(datepickerEl, {
            format: 'yyyy-mm-dd',
            minDate: '{{ $date->format('Y-m-d') }}',
            todayHighlight: true,
            prevArrow: '<svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.68771 1.5649e-08L8 1.37357L2.62459 7L8 12.6264L6.68771 14L8.34742e-08 7L6.68771 1.5649e-08Z" fill="#000"/></svg>',
            nextArrow: '<svg width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.31229 14L-6.00408e-08 12.6264L5.37541 7L-5.51919e-07 1.37357L1.31229 -5.73622e-08L8 7L1.31229 14Z" fill="#000"/></svg>',
        });

        $('select[name=is_insured]').on('change', function() {
            if (this.value == '1') {
                $('.policy_insurer').show();
                $('.policy_number').prop('required', true);
                $('.policy_insurer_name').prop('required', true);
            } else {
                $('.policy_insurer').hide();
                $('.custom_timeslot_text').prop('required', false);
                $('.policy_insurer_name').prop('required', false);
            }
        });
    </script>

    {{-- copy from signup.blade --}}

    <script src="{{ url('assets/js/intlTelInput.min.js') }}"></script>
    <script>
        // $(document).ready(function() {
        //     $('.signupDiv').click(function() {
        //         $('.signupDiv').removeClass('active');
        //         $(this).addClass('active');
        //         $(this).children('input[type=radio]').prop('checked', true);
        //         var radioVal = $(this).children('input[type=radio]').val();
        //         $('.invalid-feedback').text('');
        //         if (radioVal == 'doctor') {
        //             $('.doctorDiv').show();
        //             $('.patientDiv').hide();
        //         }
        //         if (radioVal == 'patient') {
        //             $('.doctorDiv').hide();
        //             $('.patientDiv').show();
        //         }
        //     });
        // });
        const phoneInputField = document.querySelector(".phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            preferredCountries: ["ma", "us", "in", "de"],
            initialCountry: "ma",
            separateDialCode: true,
            utilsScript: "{{ url('assets/js/utils.js') }}",
        });
        phoneInputField.addEventListener("countrychange", function() {
            var phone_code = $('.phone').find('.iti__selected-flag').text();
            // console.log(phone_code);
            $('input[name=phone_code]').val('+' + phoneInput.getSelectedCountryData().dialCode);
        });

        const DocphoneInputField = document.querySelector(".doc_phone");
        const docphoneInput = window.intlTelInput(DocphoneInputField, {
            preferredCountries: ["ma", "us", "in", "de"],
            initialCountry: "ma",
            separateDialCode: true,
            utilsScript: "{{ url('assets/js/utils.js') }}",
        });
        DocphoneInputField.addEventListener("countrychange", function() {
            $('input[name=phone_code]').val('+' + docphoneInput.getSelectedCountryData().dialCode);
        });
    </script>
@endsection
