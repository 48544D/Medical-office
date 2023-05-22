<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'speciality',
        'phoneNumber',
        'email',
    ];

    // relationship with the appointement model
    public function appointements()
    {
        return $this->hasMany(Appointement::class);
    }

    // relationship with the medical_record model
    public function medical_records()
    {
        return $this->hasMany(Medical_record::class);
    }

    // relationship with the schedule model
    public function schedule()
    {
        return $this->hasOne(Schedule::class);
    }

}
