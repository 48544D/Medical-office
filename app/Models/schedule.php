<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'start_day',
        'end_day',
        'start_time',
        'end_time',
        'availibility',
    ];

    public function getWorkDaysAttribute()
    {
        if ($this->start_day == $this->end_day) {
            return $this->start_day;
        }
        
        return $this->start_day . ' - ' . $this->end_day;
    }

    public function getWorkHoursAttribute()
    {
        return $this->start_time . ' - ' . $this->end_time;
    }

    // relationship with the doctor model it's a one one relationship
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
