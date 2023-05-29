<?php

namespace App\Http\Controllers;

use App\Models\patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function profile($id)
    {
        $patient = patient::find($id);

        return view('patients.profile', compact('patient'));
    }
}
