@php
    use App\Helpers\Template as Template;
    use App\Helpers\Hightlight as Hightlight;
    
@endphp
<div class="card-header">
    <h4 class="card-title">List</h4>
    <div class="card-tools">
        <a href="#" class="btn btn-tool">
            <i class="fas fa-sync"></i>
        </a>
        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i>
        </button>
    </div>
</div>
<div class="card-body">
    <form action="#" method="post" class="table-responsive" id="form-table">
        <!-- Control -->

        <div class="d-flex flex-wrap align-items-center justify-content-end mb-2">
            <a href="{{ route($controllerName.'/form') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add New</a>
        </div>
        <!-- List Content -->
        <table class="table table-bordered table-hover text-nowrap btn-table mb-0">
            <thead>
                <tr>
                    <th class="text-center">ID</a></th>
                    <th class="text-center">Name</a></th>
                    <th class="text-center">Link</a></th>
                    <th class="text-center">Ordering</a></th>
                    <th class="text-center">Source</a></th>
                    <th class="text-center">Trạng thái</a></th>
                    <th class="text-center">Tạo mới</a></th>
                    <th class="text-center">Chỉnh sửa</a></th>
                    <th class="text-center">Hành động</th>
                </tr>
            </thead>

            <tbody>
                @if (count($items) > 0)
                @foreach ($items as $key => $val)
                    @php
                        $index           = $key + 1;
                        $class           = ($index % 2 == 0) ? "even" : "odd";
                        $id              = $val['id'];
                        $source          = $val['source'];
                        $ordering        = $val['ordering'];
                        $name            = Hightlight::show($val['name'], $params['search'], 'name');
                        $link            = Hightlight::show($val['link'], $params['search'], 'link');
                        $createdHistory  = Template::showItemHistory($val['created_by'], $val['created']);
                        $modifiedHistory = Template::showItemHistory($val['modified_by'], $val['modified']);
                        $listBtnAction   = Template::showButtonAction($controllerName, $id);
                    @endphp

                    <tr class="{{ $class }}">
                        <td class="text-center align-middle">{{ $id }}</td>
                        <td class="text-center align-middle">{!! $name !!}</td>
                        <td class="text-center align-middle">{!! $link !!}</td>
                        <td class="text-center align-middle">{!! $ordering !!}</td>
                        <td class="text-center align-middle">{!! $source !!}</td>

                        <td class="text-center align-middle position-relative"><x-admin.itemStatus :id="$id" :status-value="$val['status']" :controller-name="$controllerName" :status-template="$val->status_template"/></td>
    
                        <td class="text-center align-middle">{!! $createdHistory !!}</td>
                        <td class="text-center align-middle">{!! $modifiedHistory !!}</td>
                        <td class="text-center align-middle">{!! $listBtnAction !!}</td>
                    </tr>
                @endforeach
            @else
                @include('admin.templates.list_empty', ['colspan' => 6])
            @endif
            </tbody>

        </table>
        
    </form>
</div>
<div class="card-footer clearfix">
</div>