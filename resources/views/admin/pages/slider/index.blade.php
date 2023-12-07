
@extends('admin.main')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- MESSAGE -->
        <x-admin.AreaFilter :controller-name="$controllerName" :items-status-count="$itemsStatusCount" :params-search="$params['search'] ?? []" :current-filter-status="$params['filter']['status']"/> 

        <!-- List -->
        <div class="card card-info card-outline">
            @include('admin.pages.slider.list', ['items' => $items])
            @if (count($items) > 0)
                @include('admin.templates.pagination', ['items' => $items])
            @endif
        </div>
    </div>
</section>
@endsection
