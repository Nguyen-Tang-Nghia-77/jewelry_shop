@php
$templateDashboard = config('zvn.template.dashboard');
unset($items['migrations']);
@endphp
@foreach ($items as $key => $item)

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box {{ $templateDashboard[$key]['class'] }}">
            <div class="inner">
                <h3>{{ $item }}</h3>

                <p>{{ $templateDashboard[$key]['name'] }}</p>
            </div>
            <div class="icon">
                <i class="ion {{ $templateDashboard[$key]['icon'] }}"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
@endforeach

