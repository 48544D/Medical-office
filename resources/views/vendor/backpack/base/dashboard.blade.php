@extends(backpack_view('blank'))

@php
    use LaravelDaily\LaravelCharts\Classes\LaravelChart;
    if (config('backpack.base.show_getting_started')) {
        $widgets['before_content'][] = [
            'type'        => 'view',
            'view'        => 'backpack::inc.getting_started',
        ];
    } else {
        $widgets['before_content'][] = [
            'type'        => 'jumbotron',
            'heading'     => trans('backpack::base.welcome'),
            'content'     => trans('backpack::base.use_sidebar'),
            'button_link' => backpack_url('logout'),
            'button_text' => trans('backpack::base.logout'),
        ];
    }

    $chart_options = [
        'chart_title' => 'Patients per day',
        'report_type' => 'group_by_date',
        'model' => 'App\Models\Patient',
        'group_by_field' => 'created_at',
        'group_by_period' => 'day',
        'chart_type' => 'line',
    ];

    // $chart2_options = [
    //     'chart_title' => 'Medical records by patient',
    //     'report_type' => 'group_by_date',
    //     'model' => 'App\Models\MedicalRecord',
    //     'group_by_field' => 'patient_id',
    //     'group_by_period' => 'month',
    //     'chart_type' => 'bar',
    // ];

    // $chart2 = new LaravelChart($chart2_options);
    $chart1 = new LaravelChart($chart_options);
@endphp

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                        <h1>{{ $chart1->options['chart_title'] }}</h1>
                        {!! $chart1->renderHtml() !!}

                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                        <h1>{{ $chart2->options['chart_title'] }}</h1>
                        {!! $chart2->renderHtml() !!}

                    </div>

                </div>
            </div>
        </div>
    </div> --}}

    {!! $chart1->renderChartJsLibrary() !!}
    {!! $chart1->renderJs() !!}
    {{-- {!! $chart2->renderChartJsLibrary() !!}
    {!! $chart2->renderJs() !!} --}}
@endsection
