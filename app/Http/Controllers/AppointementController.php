<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            return redirect()->back();
        }
        
        $appointement->status = 'confirmed';
        $appointement->save();
        return redirect()->back();
    }
}
