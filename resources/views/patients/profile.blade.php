<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- boostrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Line Awesome -->
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    {{-- custom css --}}
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">

    <title>{{ $patient->firstName }} Profile</title>
</head>

<body>
    <div class="container">
      <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Admin</a></li>
              <li class="breadcrumb-item"><a href="/patient">Patients</a></li>
              <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    @if($patient->gender == 'male')
                        <img src="https://www.pngarts.com/files/6/User-Avatar-in-Suit-PNG.png" alt="Admin" class="rounded-circle" width="150">
                    @else
                        <img src="https://www.shareicon.net/data/512x512/2016/09/15/829452_user_512x512.png" alt="Admin" class="rounded-circle" width="150">
                    @endif
                    <div class="mt-3">
                      <h4>{{ $patient->firstName }} {{ $patient->lastName }}</h4>
                      <p class="text-secondary mb-0">Gender : {{ $patient->gender }}</p>
                      <p class="text-muted font-size-sm">Member since : {{ $patient->created_at }}</p>
                      <button class="btn btn-outline-primary"><i class="las la-sms"></i> Message</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-center align-items-center flex-wrap">
                    <h4 class="mb-0">Personal info</h4>
                  </li>

                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class="la la-user-alt"></i> Full Name</h6>
                    <div class="text-secondary">
                      {{ $patient->firstName }} {{ $patient->lastName }}
                    </div>
                  </li>

                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class="la la-phone"></i> Phone</h6>
                    <div class="text-secondary">
                      {{ $patient->phoneNumber }}
                    </div>
                  </li>

                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class="la la-calendar"></i> Birth date</h6>
                    <div class="text-secondary">
                      {{ $patient->birthDate }}
                    </div>
                  </li>

                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><i class="la la-envelope"></i> Email</h6>
                    <div class="text-secondary">
                      {{ $patient->email  }}
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-header">
                  <div class="d-flex justify-content-center align-items-center">
                    <h4 class="mb-2">Appointements</h4>
                  </div>
                </div>

                <div class="card-body py-0" style="max-height: 21vw; overflow: auto;">
                  @if ($patient->appointements()->count() == 0)
                    <div class="d-flex justify-content-center align-items-center p-4">
                      <h6 class="text-secondary mb-0">This patient has no appointements</h6>
                    </div>
                  @else
                    <div class="row bg-secondary p-2 mb-3 text-light sticky-top">
                      <div class="col-sm-5">
                        <h6 class="mb-0">Date & time</h6>
                      </div>

                      <div class="col-sm-2">
                        <h6 class="mb-0">Status</h6>
                      </div>
                      
                      <div class="col-sm-3 text-truncate text-center">
                        <h6 class="mb-0">Doctor name</h6>
                      </div>

                      <div class="col-sm-2">
                        <h6 class="mb-0">Action</h6>
                      </div>
                    </div>
                  @endif

                  @foreach ($patient->appointements as $appointement)
                    <div class="row">
                      <div class="col-sm-5">
                        <h6 class="mb-0">{{ $appointement->appointement_date_time }}</h6>
                      </div>

                      @if ($appointement->status == 'pending')
                            <div class="col-sm-2 badge badge-warning"> {{ $appointement->status }} </div>
                        @elseif ($appointement->status == 'confirmed')
                            <div class="col-sm-2 badge badge-success"> {{ $appointement->status }} </div>
                        @else
                            <div class="col-sm-2 badge badge-danger">{{ $appointement->status }} </div>
                        @endif
                      
                        <div class="col-sm-3 text-truncate text-center">
                            {{ $appointement->doctor->firstName }}
                        </div>

                        <div class="col-sm-2">
                            <a href="/appointement/{{ $appointement->id }}/show"><i class="las la-eye"></i> View</a>
                        </div>
                      </div>
                    <hr>
                  @endforeach
                </div>
              </div>

              <div class="card mb-3">
                <div class="card-header">
                  <div class="d-flex justify-content-center align-items-center">
                    <h4 class="mb-2">Medical Records</h4>
                  </div>
                </div>

                <div class="card-body py-0" style="max-height: 21vw; overflow: auto;">
                  @if ($patient->medicalRecords()->count() == 0)
                    <div class="d-flex justify-content-center align-items-center p-4">
                      <h6 class="text-secondary mb-0">This patient has no medical records</h6>
                    </div>
                  @else
                    <div class="row bg-secondary p-2 mb-3 text-light sticky-top">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Record Date</h6>
                      </div>

                      <div class="col-sm-5">
                        <h6 class="mb-0">test_results</h6>
                      </div>
                      
                      <div class="col-sm-2 text-truncate text-center">
                        <h6 class="mb-0">Doctor name</h6>
                      </div>

                      <div class="col-sm-2">
                        <h6 class="mb-0">Action</h6>
                      </div>
                    </div>
                  @endif

                  @foreach ($patient->medicalRecords as $medicalRecord)
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">{{ $medicalRecord->record_date }}</h6>
                      </div>

                      <div class="col-sm-5 text-truncate text-center">
                        {{ $medicalRecord->test_results }}
                    </div>
                      
                      <div class="col-sm-2 text-truncate text-center">
                          {{ $medicalRecord->doctor->firstName }}
                      </div>

                      <div class="col-sm-2">
                          <a href="/medicalRecords/{{ $medicalRecord->id }}/show"><i class="las la-eye"></i> View</a>
                      </div>
                    </div>
                    <hr>
                  @endforeach
                </div>
              </div>

              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3">
                        <span class="text-info mr-1">Medical</span>History
                      </h6>
                      <p class="text-truncate">{{ $patient->medicalHistory }}</p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><span class="text-info mr-1">Insurance</span>Info</h6>
                      <p class="text-truncate">{{ $patient->insuranceInfo }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</body>
</html>