
{{-- Search & Filter --}}

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
                {{-- filter status --}}
                <x-admin.ItemFilterStatus :controller-name="$controllerName" :items-status-count="$itemsStatusCount" :params-search="$paramsSearch" :current-filter-status="$currentFilterStatus"/> 
                
                {{-- <div class="mb-1">
                    <select class="custom-select custom-select-sm " name="">
                        <option value="default" selected="true">-Select Group Acp-</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>                
                </div> --}}
                <x-admin.ItemFilterSearch :controller-name="$controllerName" :params-search="$paramsSearch"/> 
            </div>
        </form>
    </div>
</div>

