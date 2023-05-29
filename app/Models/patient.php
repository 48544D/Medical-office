<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'birthDate',
        'gender',
        'phoneNumber',
        'email',
        'medicalHistory',
        'insuranceInfo'
    ];

    // inheriting from the user model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relationship with the appointement model
    public function appointements()
    {
        return $this->hasMany(Appointement::class);
    }

    // relationship with the medical record model
    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }
}
