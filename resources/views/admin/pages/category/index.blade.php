
@extends('admin.main')
@section('content')
<!-- Main content -->
<section class="content">
    
    <div class="container-fluid">
        
        <!-- MESSAGE -->
        <x-admin.AreaFilter :controller-name="$controllerName" :items-status-count="$itemsStatusCount" :params-search="$params['search'] ?? []" :current-filter-status="$params['filter']['status']"/> 

        <!-- List -->
        <div class="card card-info card-outline">
            @include('admin.pages.category.list', ['items' => $items])
        </div>
    </div>
</section>
@endsection