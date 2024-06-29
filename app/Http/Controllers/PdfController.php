<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Medicine;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class PdfController extends Controller
{
    public function generate_pdf($id)
    {
        $pre =  Prescription::with(['appointment', 'doctor'])->find($id);
        $doctor = Doctor::with(['hospital'])->find($pre->doctor->id);
        $medicinesPresc = json_decode($pre->medicines, true);

        foreach ($medicinesPresc as $medicine) {
            $medicines_id = $medicine['medicines_id'];
        }

        $medicine = Medicine::find($medicines_id);

        $path = base_path('public/images/upload/logo-docteur24-h40.png');
        $type =  pathinfo($path, PATHINFO_EXTENSION);
        $img = file_get_contents($path);
        $pic = 'data:image/' . $type . ';base64,' . base64_encode($img);

        $createdAt = \Carbon\Carbon::parse($pre['created_at']);

        $data = [
            'image' => $pic,
            'doctor_name' => $doctor->name,
            'patient_name' => $pre->appointment->patient_name,
            'date' => $createdAt->format('d M Y'),
            'problem_description' => $pre->problem_description,
            'test' => $pre->test,
            'advice' => $pre->advice,
            'medicinesPresc' => $medicinesPresc,
            'medicine' => $medicine,
        ];


        $pdf = Pdf::loadView('superAdmin.doctor.GeneratePDF', $data)->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        return $pdf->stream();

    }
}
