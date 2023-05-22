<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointement extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'appointement_date_time',
        'status',
        'reason_for_appointement',
        'notes',
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
