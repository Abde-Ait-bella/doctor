<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $table = 'prescription';

    protected $fillable = ['appointment_id','medicines','doctor_id','user_id', 'health_insurance', 'status', 'low_income', 'reference', 'high_blood_pressure', 'food_allergies', 'tendency_bleed', 'heart_disease', 'diabetic', 'added_at', 'female_pregnancy', 'breast_feeding', 'current_medication', 'surgery', 'accident', 'others', 'pulse_rate', 'temperature', 'problem_description', 'test', 'advice', 'next_visit' ,'pdf'];

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function appointment()
    {
        return $this->belongsTo('App\Models\Appointment');
    }
}
