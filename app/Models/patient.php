<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'birthDate',
        'gender',
        'phoneNumber',
        'email',
        'mediclHistory',
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
}
