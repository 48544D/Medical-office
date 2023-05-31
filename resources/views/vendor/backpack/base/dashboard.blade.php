@extends(backpack_view('blank'))

@php
    use LaravelDaily\LaravelCharts\Classes\LaravelChart;
    use Carbon\Carbon;

    if (config('backpack.base.show_getting_started')) {
        $widgets['before_content'][] = [
            'type'        => 'view',
            'view'        => 'backpack::inc.getting_started',
        ];
    } 
    // else {
    //     $widgets['before_content'][] = [
    //         'type'        => 'jumbotron',
    //         'heading'     => trans('backpack::base.welcome'),
    //         'content'     => trans('backpack::base.use_sidebar'),
    //         'button_link' => backpack_url('logout'),
    //         'button_text' => trans('backpack::base.logout'),
    //     ];
    // }

    // patient chart
    $chart_patient_options = [
        'chart_title' => 'Patients per month',
        'report_type' => 'group_by_date',
        'model' => 'App\Models\Patient',
        'group_by_field' => 'created_at',
        'group_by_period' => 'month',
        'chart_type' => 'pie',
        'chart_color' => '206, 36, 35',
    ];

    // stats chart
    $medical_records_options = [
        'chart_title' => 'Medical records',
        'report_type' => 'group_by_date',
        'model' => 'App\Models\MedicalRecord',
        'group_by_field' => 'created_at',
        'group_by_period' => 'day',
        'chart_type' => 'line',
        'chart_color' => '76, 132, 209',
    ];

    $appointement_options = [
        'chart_title' => 'Appointements',
        'report_type' => 'group_by_date',
        'model' => 'App\Models\Appointement',
        'group_by_field' => 'created_at',
        'group_by_period' => 'day',
        'chart_type' => 'line',
        'chart_color' => '255, 195, 15',
    ];

    $schedule_options = [
        'chart_title' => 'Schedules',
        'report_type' => 'group_by_date',
        'model' => 'App\Models\Schedule',
        'group_by_field' => 'created_at',
        'group_by_period' => 'day',
        'chart_type' => 'line',
        'chart_color' => '76, 189, 155',
    ];

    // appointement per doctor chart
    $appointement_per_doctor_chart = [
        'chart_title' => 'Appointements per doctor',
        'chart_type' => 'bar',
        'report_type' => 'group_by_relationship',
        'relationship_name' => 'doctor',
        'model' => 'App\Models\Appointement',
        'group_by_field' => 'firstName',
        'chart_type' => 'bar',
        'chart_color' => '255, 195, 15',
    ];

    $chart_patient = new LaravelChart($chart_patient_options);
    
    $stats_chart = new LaravelChart($medical_records_options, $appointement_options, $schedule_options);

    $appointement_per_doctor_chart = new LaravelChart($appointement_per_doctor_chart);
@endphp

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1>{{ $chart_patient->options['chart_title'] }}</h1>
                        {!! $chart_patient->renderHtml() !!}

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1>Monthly Stats</h1>
                        {!! $stats_chart->renderHtml() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h1>{{ $appointement_per_doctor_chart->options['chart_title'] }}</h1>
                        {!! $appointement_per_doctor_chart->renderHtml() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! $chart_patient->renderChartJsLibrary() !!}
    {!! $chart_patient->renderJs() !!}  
    {!! $stats_chart->renderChartJsLibrary() !!}
    {!! $stats_chart->renderJs() !!}
    {!! $appointement_per_doctor_chart->renderChartJsLibrary() !!}
    {!! $appointement_per_doctor_chart->renderJs() !!}
@endsection
