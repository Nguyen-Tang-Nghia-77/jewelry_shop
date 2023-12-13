@extends('admin.main')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- MESSAGE -->
        <div class="card card-info card-outline">
            <div class="card-header">
                <h6 class="card-title">Search & Filter</h6>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="display: block;">
                <form action="" method="GET" id="form-filter">
                    <div class="row justify-content-between">
                        <x-admin.ItemFilterStatus :controller-name="$controllerName" :items-status-count="$itemsStatusCount" :params-search="$params['search'] ?? []" :current-filter-status="$params['filter']['status']"/> 
                        
                        <x-admin.ItemFilterSearch :controller-name="$controllerName" :params-search="$params['search'] ?? []"/> 
                    
                    </div>
                </form>
            </div>
        </div>
        <!-- List -->
        <div class="card card-info card-outline">
            @include('admin.pages.user.list', ['items' => $items])
            {{-- @if (count($items) > 0)
                @include('admin.templates.pagination', ['items' => $items])
            @endif --}}
        </div>
    </div>
</section>
@endsection

