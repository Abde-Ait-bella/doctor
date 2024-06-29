{{-- @extends('layout.mainlayout_admin', ['activePage' => 'prescription']) --}}

<header>
    <style>
        .table-1 table {
            width: 100%;
        }

        .table-1 table th {
            background-color: #3a3a3a !important;
            padding: 8px 21px;
            font-weight: 600 !important;
            white-space: nowrap;
            color: #ffffff;
        }

        .table-2 table {
            width: 100%;
        }

        .table-2 table th {
            background-color: #3a3a3a !important;
            padding: 8px 21px;
            font-weight: 600 !important;
            /* text-transform: uppercase; */
            white-space: nowrap;
            color: #ffffff
        }

        .table-2 table td {
            padding: 1rem 0px;
        }
        .footer{
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
    </style>
</header>
<html>
<div class="pres-details-content">
    <div class="info-header">
        <div style="display: flex;">
            <div class="mb-3" style="text-align:center">
                <img src={{ $image }} alt="">
            </div>
            <div>
                <h3>{{ $doctor_name }}</h3>
            </div>
        </div>
        <div style="background-color: rgb(179, 179, 179); border-radius: 10px; padding: 15px; margin-bottom: 25px;">
            <h3 style="margin: 0 0 5px 0;">Patient Details :</h3>
            <div>
                <label>Patient Name: <span class="text-danger">{{ $patient_name }}</span></label>
            </div>
            <div>
                <label>Date: <span class="text-dark">{{ $date }}</span></label>
            </div>
            <div>
                <label>Age: <span class="text-danger">N/A !!</span></label>
            </div>
        </div>
    </div>
    <hr style="margin-bottom: 25px;">
    <div class="table-1 mt-2 mb-5">
        <table>
            <thead>
                <th>Problem:</th>
                <th>Test:</th>
                <th>Advice:</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $problem_description }}</td>
                    <td>{{ $test }}</td>
                    <td>{{ $advice }}</td>
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
                        <td>{{ $medicine['name'] }}</td>
                        <td>{{ $medicineP['dosage'] }}</td>
                        <td>{{ $medicineP['dose_duration'] }}</td>
                        <td>{{ $medicineP['dose_interval'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div style="margin-top: 30px">
        <f4>Dr. {{ $doctor_name }}</f4>
    </div>
</div>

</html>
