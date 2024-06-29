@extends('layout.mainlayout_admin', ['activePage' => 'prescription'])
@section('title', __('Prescription'))
@section('content')

    <section class="section">

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
                <h3 class="card-title mb-0 text-dark p-3">{{ __('Edit Prescription') }}</h3>
            </div>
            <div class="card-body">
                <div>
                    <form action="{{ route('updatePresc', $prescription->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="p-4 bg-white" style="border-radius: 10px">
                            <div class="row">
                                <div class="col-md-3 mt-2">
                                    <label for="" class="label-prescription">Patient:</label>
                                    <select name="appointment_id" class="select2">
                                        <option value="">Select Patient</option>
                                        @foreach ($appointment as $appointm)
                                            <option {{ $prescription->appointment_id === $appointm->id ? 'selected' : '' }}
                                                value="{{ $appointm->id }}"> {{ $appointm->patient_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mt-2">
                                    <label for="" class="label-prescription">Health Insurance:</label>
                                    <input type="text" name="health_insurance" class="form-control"
                                        placeholder="Health Insurance" value={{ $prescription->health_insurance }}>
                                </div>
                                <div class="col-md-3 mt-2">
                                    <label for="" class="label-prescription">Low Income:</label>
                                    <input type="text" name="low_income" class="form-control"
                                        placeholder="Low Income" value={{ $prescription->low_income }}>
                                </div>
                                <div class="col-md-3 mt-2">
                                    <label for="exampleInputPassword1" class="label-prescription">Reference:</label>
                                    <input type="number" name="reference" class="form-control"
                                        id="exampleInputPassword1" placeholder="Password"
                                        value={{ $prescription->reference }}>
                                </div>
                                <div class="col-md-3 mt-2">
                                    <div class="custom-control custom-switch mt-4">
                                        <input type="checkbox" name="status" class="custom-control-input"
                                            value={{ 1 }} id="customSwitch1"
                                            {{ $prescription->status == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label label-prescription" for="customSwitch1">status</label>
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
                                @foreach ($medicinesPresc as $medP)
                                    <div class="d-flex mb-4 trCopy">
                                        <div class="col-md-3">
                                            <label for="" class="label-prescription">MEDICINES:</label>
                                            <div>
                                                <select name="medicines_id[]" id="medicine_select" class="select2">
                                                    @foreach ($medicines as $med)
                                                        <option {{ $medicine['id'] == $med['id'] ? 'selected' : '' }}
                                                            value="{{ $med->id }}">{{ $med['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="" class="label-prescription">DOSAGE:</label>
                                            <input type="text" name="dosages[]" class="form-control"
                                                id="exampleInputPassword1" placeholder="dosage"
                                                value={{ $medP['dosage'] }}>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="exampleInputPassword1" class="label-prescription">DOSE DURATION:</label>
                                            <div>
                                                <select name="dose_durations[]" class="select2">
                                                    <option
                                                        {{ $medP['dose_duration'] == 'only One day' ? 'selected' : '' }}
                                                        value="only One day">Only One day</option>
                                                    <option
                                                        {{ $medP['dose_duration'] == 'upto three days' ? 'selected' : '' }}
                                                        value="upto three days">Upto three days</option>
                                                    <option
                                                        {{ $medP['dose_duration'] == 'upto one week' ? 'selected' : '' }}
                                                        value="upto one week">Upto one week</option>
                                                    <option
                                                        {{ $medP['dose_duration'] == 'upto two week' ? 'selected' : '' }}
                                                        value="upto two week">Upto two week</option>
                                                    <option
                                                        {{ $medP['dose_duration'] == 'upto one month' ? 'selected' : '' }}
                                                        value="upto one month">Upto one month</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="exampleInputPassword1" class="label-prescription">TIME:</label>
                                            <div>
                                                <select name="times[]" class="select2">
                                                    <option {{ $medP['time'] == 'after meal' ? 'selected' : '' }} selected
                                                        value="after meal">After Meal</option>
                                                    <option {{ $medP['time'] == 'before meal' ? 'selected' : '' }}
                                                        value="before meal">Before Meal</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="exampleInputPassword1" class="label-prescription">DOSE INTERVAL:</label>
                                            <div>
                                                <select name="dose_intervals[]" class="select2">
                                                    <option
                                                        {{ $medP['dose_interval'] == 'daily morning' ? 'selected' : '' }}
                                                        value="daily morning">Daily morning</option>
                                                    <option
                                                        {{ $medP['dose_interval'] == 'daily morning and evening' ? 'selected' : '' }}
                                                        value="daily morning and evening">Daily morning and evening
                                                    </option>
                                                    <option
                                                        {{ $medP['dose_interval'] == 'daily morning, noon, and evening' ? 'selected' : '' }}
                                                        value="daily morning, noon, and evening">Daily morning, noon, and
                                                        evening</option>
                                                    <option
                                                        {{ $medP['dose_interval'] == '4 times in a day' ? 'selected' : '' }}
                                                        value="4 times in a day">4 times in a day</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="exampleInputPassword1" class="label-prescription">COMMENT:</label>
                                            <textarea class="form-control" name="comments[]" id="exampleFormControlTextarea1" rows="5"
                                                placeholder="Comment">{{ $medP['comment'] }}</textarea>
                                        </div>
                                        <div class="col-md-1 d-flex flex-column justify-content-around mt-4">
                                            <a class="deleteBtn btn btn-danger px-2"><i
                                                    class="fa-solid fa-trash text-white" style="font-size: 15px;"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="p-4 mt-4 bg-white" style="border-radius: 10px">
                            <h5 class="mb-5 text-info mt-1 label-prescription">Physical Information</h5>
                            <div class="row">
                                <div class="col-md-3 mb-4">
                                    <label for="" class="label-prescription">High Blood Pressure:</label>
                                    <input type="text" name="high_blood_pressure" class="form-control"
                                        placeholder="Health Insurance" value={{ $prescription->high_blood_pressure }}>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="" class="label-prescription">Food Allergies:</label>
                                    <input type="text" name="food_allergies" class="form-control"
                                        placeholder="Low Income" value={{ $prescription->food_allergies }}>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="exampleInputPassword1" class="label-prescription">Tendency Bleed:</label>
                                    <input type="text" name="tendency_bleed" class="form-control"
                                        id="exampleInputPassword1" placeholder="Password"
                                        value={{ $prescription->tendency_bleed }}>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="exampleInputPassword1" class="label-prescription">Heart Disease:</label>
                                    <input type="text" name="heart_disease" class="form-control"
                                        id="exampleInputPassword1" placeholder="Password"
                                        value={{ $prescription->heart_disease }}>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-4">
                                    <label for="" class="label-prescription">Diabetic:</label>
                                    <input type="text" name="diabetic" class="form-control" placeholder="Diabetic"
                                        value={{ $prescription->diabetic }}>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="" class="label-prescription">Added At:</label>
                                    <input type="text" name="added_at" class="form-control" placeholder="Added At"
                                        value={{ $prescription->added_at }}>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="exampleInputPassword1" class="label-prescription">Female Pregnancy:</label>
                                    <input type="text" name="female_pregnancy" class="form-control"
                                        id="exampleInputPassword1" placeholder="Female Pregnancy"
                                        value={{ $prescription->female_pregnancy }}>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="exampleInputPassword1" class="label-prescription">Breast Feeding:</label>
                                    <input type="text" name="breast_feeding" class="form-control"
                                        id="exampleInputPassword1" placeholder="Breast Feeding"
                                        value={{ $prescription->breast_feeding }}>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-4">
                                    <label for="" class="label-prescription">Current Medication:</label>
                                    <input type="text" name="current_medication" class="form-control"
                                        placeholder="Current Medication" value={{ $prescription->current_medication }}>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="" class="label-prescription">Surgery:</label>
                                    <input type="text" name="surgery" class="form-control" placeholder="Surgery"
                                        value={{ $prescription->surgery }}>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="exampleInputPassword1" class="label-prescription">Accident:</label>
                                    <input type="text" name="accident" class="form-control"
                                        id="exampleInputPassword1" placeholder="Accident"
                                        value={{ $prescription->accident }}>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="exampleInputPassword1" class="label-prescription">Others:</label>
                                    <input type="text" name="others" class="form-control" id="exampleInputPassword1"
                                        placeholder="Others" value={{ $prescription->others }}>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 mb-4">
                                    <label for="" class="label-prescription">Pulse Rate:</label>
                                    <input type="text" name="pulse_rate" class="form-control"
                                        placeholder="Pulse Rate" value={{ $prescription->pulse_rate }}>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="" class="label-prescription">Temperature:</label>
                                    <input type="text" name="temperature" class="form-control"
                                        placeholder="Temperature" value={{ $prescription->temperature }}>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label for="" class="label-prescription">Problem Description:</label>
                                    <textarea class="form-control" name="problem_description" id="exampleFormControlTextarea1" rows="5"
                                        style="height: 100px" placeholder="Problem Description">{{ $prescription->problem_description }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 mt-4 bg-white" style="border-radius: 10px">
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label for="" class="label-prescription">Test:</label>
                                    <textarea class="form-control" name="test" id="exampleFormControlTextarea1" rows="5"
                                        style="height: 100px">{{ $prescription->test }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label for="" class="label-prescription">Advice:</label>
                                    <textarea class="form-control" name="advice" id="exampleFormControlTextarea1" rows="5"
                                        style="height: 100px">{{ $prescription->advice }}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="" class="label-prescription">Next Visit:</label>
                                    <div class="d-flex">
                                        @php
                                            $string = $prescription->next_visit;
                                            $parts = explode(' ', $string);
                                            $type_period = $parts[1];
                                        @endphp
                                        <div class="col-md-1 mb-3">
                                            <input type="number" name="number_period" class="form-control"
                                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="1"
                                                value={{ $prescription->next_visit }}>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="type_period" class="select2">
                                                <option {{ $type_period == 'days' ? 'selected' : '' }} value="days">Days
                                                </option>
                                                <option {{ $type_period == 'month' ? 'selected' : '' }} value="month">
                                                    Month</option>
                                                <option {{ $type_period == 'years' ? 'selected' : '' }} value="years">
                                                    Years</option>
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
                                    <a href={{ url('prescriptionListe') }} class="btn btn-secondary text-dark">Cancel</a>
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
