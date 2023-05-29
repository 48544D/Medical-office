{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> Users</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('appointement') }}"><i class="nav-icon la la-calendar-check"></i> Appointements</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('doctor') }}"><i class="nav-icon la la-user-nurse"></i> Doctors</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('medical-record') }}"><i class="nav-icon la la-notes-medical"></i> Medical records</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('message') }}"><i class="nav-icon la la-sms"></i> Messages</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('patient') }}"><i class="nav-icon la la-stethoscope"></i> Patients</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('schedule') }}"><i class="nav-icon la la-clock"></i> Schedules</a></li>