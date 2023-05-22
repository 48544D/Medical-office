<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'date_time',
        'availibility',
    ];

    // relationship with the doctor model it's a one one relationship
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
