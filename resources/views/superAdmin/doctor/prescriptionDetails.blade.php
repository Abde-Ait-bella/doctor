@extends('layout.mainlayout_admin', ['activePage' => 'prescription'])

@section('title', __('Prescription Details'))

@section('content')

    <section class="section">

        @include('layout.breadcrumb', [
            'title' => __('Prescription Details'),
        ])
        <div class="">
            <div class="pres-details-header mb-3">
                <a target="_blank" href={{ route('pdf', $prescription->id) }} class="btn btn-success me-2 px-3">Print
                    Prescription</a>
                <a class="btn btn-outline-primary px-3" href={{ url('prescriptionListe') }}>Back</a>
            </div>
            <div class="pres-details-content">
                <div class="info-header d-flex justify-content-between">
                    <div>
                        <div class="mb-3">
                            <img src="{{ url('/images/upload/logo-docteur24-h40.png') }}" alt="">
                        </div>
                        <div>
                            <h5 class="fs-1">{{ $prescription->appointment->patient_name }}</h5>
                        </div>
                        <div class="">
                            <p class="text-dark">{{ $category['name'] }}</p>
                        </div>
                    </div>
                    <div>
                        <div>
                            <label>labelatient Name: <span
                                    class="text-dark">{{ $prescription->appointment->patient_name }}</span></label>
                        </div>
                        @php
                            $createdAt = \Carbon\Carbon::parse($prescription['created_at']);
                        @endphp
                        <div>
                            <label>Date: <span class="text-dark">{{ $createdAt->format('d M Y') }}</span></label>
                        </div>
                        <div>
                            <label>Age: <span class="text-danger">N/A !!</span></label>
                        </div>
                    </div>
                    <div class="address">
                        <p>{{ $doctor->hospital->address }}</p>
                    </div>
                </div>
                <hr>
                <div class="table-1 mt-2 mb-5">
                    <table>
                        <thead>
                            <th>Problem:</th>
                            <th>Test:</th>
                            <th>Advice:</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $prescription->problem_description }}</td>
                                <td>{{ $prescription->test }}</td>
                                <td>{{ $prescription->advice }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="text-dark fw-bold">Rx :</p>
                <div class="table-2">
                    <table>
                        <thead>
                            <tr>
                                <th>MEDICINE NAME</th>
                                <th>DOSAGE</th>
                                <th>DURATION</th>
                                <th>DOSE INTERVAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($medicinesPresc as $medicineP)
                                <tr>
                                    <td>{{ $medicine->name }}</td>
                                    <td>{{ $medicineP['dosage'] }}</td>
                                    <td>{{ $medicineP['dose_duration'] }}</td>
                                    <td>{{ $medicineP['dose_interval'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex flex-column align-items-end px-4">
                    <h5 class="text-dark">Dr. {{ $doctor->name }}</h5>
                    <p class="text-dark">{{ $category['name'] }}</p>
                </div>
            </div>
        </div>
    </section>

@endsection
