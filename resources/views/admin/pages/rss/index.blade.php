
@extends('admin.main')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- MESSAGE -->
        <x-admin.AreaFilter :controller-name="$controllerName" :items-status-count="$itemsStatusCount" :params-search="$params['search'] ?? []" :current-filter-status="$params['filter']['status']"/> 

        <!-- List -->
        @include ('admin.templates.zvn_notify')
        <div class="card card-info card-outline">
            @include('admin.pages.rss.list', ['items' => $items])
            @if (count($items) > 0)
                @include('admin.templates.pagination', ['items' => $items])
            @endif
        </div>
    </div>
</section>
@endsection
