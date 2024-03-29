<?php

use App\Http\Controllers\AppointementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('appointement', 'AppointementCrudController');
    Route::crud('doctor', 'DoctorCrudController');
    Route::crud('medical-record', 'MedicalRecordCrudController');
    Route::crud('message', 'MessageCrudController');
    Route::crud('patient', 'PatientCrudController');
    Route::crud('schedule', 'ScheduleCrudController');
    // route for profile
    Route::get('patient/{id}/profile', [PatientController::class, 'profile'])->name('profile');
    Route::get('appointement/{id}/validate', [AppointementController::class, 'confirm'])->name('confirm');
}); // this should be the absolute last line of this file