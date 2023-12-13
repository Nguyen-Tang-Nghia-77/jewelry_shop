<div class="mb-1">
    @foreach ($itemsStatusCount as $item)
        @php
            $statusValue = $item['status'];
            $statusValue = array_key_exists($statusValue, $tmplStatus) ? $statusValue : 'default';

            $currentTemplateStatus = $tmplStatus[$statusValue];
            $link = route($controllerName) . '?filter_status=' . $statusValue;

            if ($paramsSearch['value'] !== '') {
                $link .= '&search_field=' . $paramsSearch['field'] . '&search_value=' . $paramsSearch['value'];
            }
            $class = $currentFilterStatus == $statusValue ? 'btn-danger' : 'btn-info';
        @endphp
        <a href="{{ $link }}"
            class="filter-status mr-1 btn btn-sm {{ $class }}">{{ $currentTemplateStatus['name'] }}
            <span class="badge badge-pill badge-light"> {{ $item['count'] }} </span>
        </a>
    @endforeach
</div>
{{-- <div class="mb-1">
    @foreach ($itemsStatusCount as $item)
        @php
            $statusValue = $item['status'];
            $statusValue = array_key_exists($statusValue, $tmplStatus) ? $statusValue : 'default';

            $currentTemplateStatus = $tmplStatus[$statusValue];
            $link = route($controllerName) . '?filter_status=' . $statusValue;

            if ($paramsSearch['value'] !== '') {
                $link .= '&search_field=' . $paramsSearch['field'] . '&search_value=' . $paramsSearch['value'];
            }
            $class = $currentFilterStatus == $statusValue ? 'btn-danger' : 'btn-info';
        @endphp
        <a href=""
            class="filter-status mr-1 btn btn-sm btn-info">All
            <span class="badge badge-pill badge-light"> 4 </span>
        </a>
    @endforeach
</div> --}}
