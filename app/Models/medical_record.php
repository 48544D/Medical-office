<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medical_record extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'record_date',
        'test_results',
        'diagnosis',
        'treatment',
        'prescription',
    ];

    // relationship with the patient model
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // relationship with the doctor model
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
