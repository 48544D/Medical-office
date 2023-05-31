<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Prologue\Alerts\Facades\Alert;

class AppointementController extends Controller
{
    public function confirm($id)
    {
        $appointement = \App\Models\Appointement::find($id);
        if (!$appointement) {
            abort(404);
        }

        if ($appointement->status == 'confirmed') {
            $appointement->status = 'cancelled';
            $appointement->save();
            Alert::add('info', '<strong>Cancelled</strong><br>appointement for ' . $appointement->patient->firstName . ' has been cancelled')->flash();
            return redirect()->back();
        }
        
        $appointement->status = 'confirmed';
        $appointement->save();
        Alert::add('info', '<strong>Confirmed</strong><br>appointement for ' . $appointement->patient->firstName . ' has been confirmed')->flash();
        return redirect()->back();
    }
}
