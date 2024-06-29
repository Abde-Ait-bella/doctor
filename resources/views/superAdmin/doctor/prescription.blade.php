@extends('layout.mainlayout_admin', ['activePage' => 'prescription'])
@section('title', __('Prescription'))
@section('content')

    <section class="section">
        {{-- addMedicine --}}
        <div>
            <div class="popup-overlay" id="popup-overlay" onclick="close_popup()"></div>
            <div id="popup" class="popup">
                <div class="card-body" style="overflow: auto; height: 100%;">
                    <form id="medicinForm">
                        <div class="p-4 bg-white pt-5" style="border-radius: 10px">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="" class="label-prescription">Medicine:</label>
                                    <input type="text" name="name" class="form-control" placeholder="Medicine">

                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="" class="label-prescription">Category:</label>
                                    <select name="medicine_category_id" class="select2">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="" class="label-prescription">Brand:</label>
                                    <input type="text" name="brand" class="form-control " placeholder="Brand">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="label-prescription" for="exampleInputPassword1">Salt Composition :</label>
                                    <input type="text" name="salt_composition" class="form-control"
                                        id="exampleInputPassword1" placeholder="Salt Composition">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="" class="label-prescription">Buying Price :</label>
                                    <input type="text" name="buying_price" class="form-control "
                                        placeholder="Buying Price">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="label-prescription" for="exampleInputPassword1">Selling Price :</label>
                                    <input type="text" name="selling_price" class="form-control"
                                        id="exampleInputPassword1" placeholder="Selling Price">
                                </div>
                            </div>


                            <div class="row pt-3">
                                <div class="col-md-12 mb-4">
                                    <label class="label-prescription" for="">Side Effects :</label>
                                    <input type="text" name="side_effects" class="form-control"
                                        id="exampleInputPassword1" placeholder="Side Effects">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label class="label-prescription" for="">Description :</label>
                                    <input type="text" name="description" class="form-control"
                                        id="exampleFormControlTextarea1" placeholder="Description">
                                </div>
                            </div>

                            <div class="d-flex justify-content-center w-full">
                                <div class="col-md-3">
                                    <a onclick="sendMedicines()" class="btn btn-primary text-white col-md-12">Save</a>
                                </div>
                                <div class="col-md-3">
                                    <a onclick="close_popup()" class="btn btn-danger text-white col-md-12">Cancel</a>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card" style="background-color: #eff3f7;">
            <div class="card-header">
                <h3 class="card-title mb-0 text-dark p-3">{{ __('Add Prescription') }}</h3>
            </div>
            <div class="card-body">
                <div>
                    <form action="{{ url('addPrescription') }}" method="post">
                        @csrf

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif

                        <div class="p-4 bg-white" style="border-radius: 10px">
                            <div class="row">
                                <div class="col-md-3 mt-2">
                                    <label for="" class="label-prescription">Patient: <span class="text-danger">*</span></label>
                                    <select name="appointment_id" class="select2">
                                        <option value="">Select Patient</option>
                                        @foreach ($appointment as $appointm)
                                            <option value="{{ $appointm->id }}"> {{ $appointm->patient_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mt-2">
                                    <label for="" class="label-prescription">Health Insurance:</label>
                                    <input type="text" name="health_insurance" class="form-control"
                                        placeholder="Health Insurance">
                                </div>
                                <div class="col-md-3 mt-2">
                                    <label for="" class="label-prescription">Low Income:</label>
                                    <input type="text" name="low_income" class="form-control "
                                        placeholder="Low Income">
                                </div>
                                <div class="col-md-3 mt-2">
                                    <label class="label-prescription" for="exampleInputPassword1">Reference:</label>
                                    <input type="number" name="reference" class="form-control"
                                        id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="col-md-3 mt-2">
                                    <div class="custom-control custom-switch mt-4">
                                        <input type="checkbox" name="status" class="custom-control-input"
                                            value={{ 1 }} id="customSwitch1">
                                        <label class="custom-control-label label-prescription"
                                            for="customSwitch1">status</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Medicine --}}
                        <div class="p-4 mt-4 bg-white" style="border-radius: 10px">
                            <div class="d-flex justify-content-between mt-1 mb-4">
                                <h5 class="text-info">Medicines</h5>
                                <a class="btn btn-info py-2 px-4 text-white" onclick="pop_up()">New medcines</a>
                            </div>
                            <div class="d-flex justify-content-end ms-2">
                                <a class="AddMoreRow btn btn-success px-4 mb-3"><i class="fa-solid fa-plus text-white"
                                        style="font-size: 15px;"></i></a>
                            </div>
                            <div class="medicines tBody">
                                <div class="d-flex mb-4 trCopy">
                                    <div class="col-md-3">
                                        <label class="label-prescription" for="">MEDICINES: <span class="text-danger">*</span></label>
                                        <div>
                                            <select name="medicines_id[]" id="medicine_select" class="select2">
                                                @foreach ($medicines as $medicine)
                                                    <option value="{{ $medicine->id }}">{{ $medicine->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="label-prescription" for="">DOSAGE:</label>
                                        <input type="text" name="dosages[]" class="form-control"
                                            id="exampleInputPassword1" placeholder="dosage">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="label-prescription" for="exampleInputPassword1">DOSE
                                            DURATION:</label>
                                        <div>
                                            <select name="dose_durations[]" class="select2">
                                                <option selected value="only One day">Only One day</option>
                                                <option value="upto three days">Upto three days</option>
                                                <option value="upto one week">Upto one week</option>
                                                <option value="upto two week">Upto two week</option>
                                                <option value="upto one month">Upto one month</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="label-prescription" for="exampleInputPassword1">TIME:</label>
                                        <div>
                                            <select name="times[]" class="select2">
                                                <option selected value="after meal">After Meal</option>
                                                <option value="before meal">Before Meal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="label-prescription" for="exampleInputPassword1">DOSE
                                            INTERVAL:</label>
                                        <div>
                                            <select name="dose_intervals[]" class="select2">
                                                <option selected value="daily morning">Daily morning</option>
                                                <option value="daily morning and evening">Daily morning and evening
                                                </option>
                                                <option value="daily morning, noon, and evening">Daily morning, noon, and
                                                    evening</option>
                                                <option value="4 times in a day">4 times in a day</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="label-prescription" for="exampleInputPassword1">COMMENT:</label>
                                        <textarea class="form-control" name="comments[]" id="exampleFormControlTextarea1" rows="5"
                                            placeholder="Comment"></textarea>
                                    </div>
                                    <div class="col-md-1 d-flex flex-column justify-content-around mt-4">
                                        <a class="deleteBtn btn btn-danger px-2"><i class="fa-solid fa-trash text-white"
                                                style="font-size: 15px;"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="p-4 mt-4 bg-white" style="border-radius: 10px">
                            <h5 class="mb-5 text-info mt-1">Physical Information</h5>
                            <div class="row">
                                <div class="col-md-3 mb-4">
                                    <label class="label-prescription" for="">High Blood Pressure:</label>
                                    <input type="text" name="high_blood_pressure" class="form-control"
                                        placeholder="Health Insurance">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="label-prescription" for="">Food Allergies:</label>
                                    <input type="text" name="food_allergies" class="form-control"
                                        placeholder="Low Income">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="label-prescription" for="exampleInputPassword1">Tendency Bleed:</label>
                                    <input type="text" name="tendency_bleed" class="form-control"
                                        id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="label-prescription" for="exampleInputPassword1">Heart Disease:</label>
                                    <input type="text" name="heart_disease" class="form-control"
                                        id="exampleInputPassword1" placeholder="Password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-4">
                                    <label class="label-prescription" for="">Diabetic:</label>
                                    <input type="text" name="diabetic" class="form-control" placeholder="Diabetic">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="label-prescription" for="">Added At:</label>
                                    <input type="text" name="added_at" class="form-control" placeholder="Added At">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="label-prescription" for="exampleInputPassword1">Female
                                        Pregnancy:</label>
                                    <input type="text" name="female_pregnancy" class="form-control"
                                        id="exampleInputPassword1" placeholder="Female Pregnancy">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="label-prescription" for="exampleInputPassword1">Breast Feeding:</label>
                                    <input type="text" name="breast_feeding" class="form-control"
                                        id="exampleInputPassword1" placeholder="Breast Feeding">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-4">
                                    <label class="label-prescription" for="">Current Medication:</label>
                                    <input type="text" name="current_medication" class="form-control"
                                        placeholder="Current Medication">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="label-prescription" for="">Surgery:</label>
                                    <input type="text" name="surgery" class="form-control" placeholder="Surgery">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="label-prescription" for="exampleInputPassword1">Accident:</label>
                                    <input type="text" name="accident" class="form-control"
                                        id="exampleInputPassword1" placeholder="Accident">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="label-prescription" for="exampleInputPassword1">Others:</label>
                                    <input type="text" name="others" class="form-control" id="exampleInputPassword1"
                                        placeholder="Others">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-4">
                                    <label class="label-prescription" for="">Pulse Rate:</label>
                                    <input type="text" name="pulse_rate" class="form-control"
                                        placeholder="Pulse Rate">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label class="label-prescription" for="">Temperature:</label>
                                    <input type="text" name="temperature" class="form-control"
                                        placeholder="Temperature">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label class="label-prescription" for="">Problem Description:</label>
                                    <textarea class="form-control" name="problem_description" id="exampleFormControlTextarea1" rows="5"
                                        style="height: 100px" placeholder="Problem Description"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 mt-4 bg-white" style="border-radius: 10px">
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label class="label-prescription" for="">Test:</label>
                                    <textarea class="form-control" name="test" id="exampleFormControlTextarea1" rows="5"
                                        style="height: 100px"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label class="label-prescription" for="">Advice:</label>
                                    <textarea class="form-control" name="advice" id="exampleFormControlTextarea1" rows="5"
                                        style="height: 100px"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="label-prescription" for="">Next Visit:</p>
                                    <div class="d-flex">
                                        <div class="col-md-1 mb-3">
                                            <input type="number" name="number_period" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="1">
                                        </div>
                                        <div class="col-md-8">
                                            <select name="type_period" class="select2">
                                                <option selected value="days">Days</option>
                                                <option value="month">Month</option>
                                                <option value="years">Years</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end w-full">
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                                <div class="col-md-1">
                                    <a href={{ url('prescriptionListe') }} class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        var medicines = @json($medicines);
    </script>

@endsection
