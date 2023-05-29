<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
    ];

    // relationship with the user model
    public function receiver()
    {
        return $this->belongsTo(doctor::class, 'receiver_id');
    }

    // relationship with the user model
    public function sender()
    {
        return $this->belongsTo(patient::class, 'sender_id');
    }
}
