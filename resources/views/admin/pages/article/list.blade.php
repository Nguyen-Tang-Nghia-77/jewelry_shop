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
            <a href="{{ route($controllerName . '/form') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add
                New</a>
        </div>
        <!-- List Content -->
        <table class="table table-bordered table-hover btn-table mb-0">
            <thead>
                <tr>
                    <th class="text-center">ID</a></th>
                    <th class="text-center">Article Info</a></th>
                    <th class="text-center">Thumb</a></th>
                    <th class="text-center">Trạng thái</a></th>
                    <th class="text-center">Kiểu hiển thị</a></th>
                    <th class="text-center">Category Name</a></th>
                    <th class="text-center">Hành động</th>
                </tr>
            </thead>

            <tbody>
                @if (count($items) > 0)
                    @foreach ($items as $key => $val)
                        @php
                            $index = $key + 1;
                            $class = $index % 2 == 0 ? 'even' : 'odd';
                            $id = $val['id'];
                            $name = Hightlight::show($val->name, $params['search'], 'name');
                            $content = Hightlight::show($val['content'], $params['search'], 'content');
                            $thumb = Template::showItemThumb($controllerName, $val['thumb'], $val['name']);
                            $listBtnAction = Template::showButtonAction($controllerName, $id);
                        @endphp

                        <tr class="{{ $class }}">
                            <td class="text-center align-middle">{{ $id }}</td>
                            <td style="width: 20%">

                                <p class="mb-0"> Name: {!! $name !!}</p>
                                {{-- <div class="mb-0">Content: {!! $content !!}</div> --}}
                            </td>
                            <td class="text-center align-middle" width="14%">
                                <p>{!! $thumb !!}</p>
                            </td>
                            <td class="text-center align-middle position-relative"><x-admin.itemStatus :id="$id" :status-value="$val['status']" :controller-name="$controllerName" :status-template="$val->status_template"/></td>
                            <td class="text-center align-middle position-relative">
                                <x-admin.SelectBox :id="$id" :current-value="$val['type']" :controller-name="$controllerName"
                                    :field-name="'type'" />
                            </td>
                            <td class="text-center align-middle position-relative">
                                <x-admin.SelectBoxCategory :id="$id" :current-value="$val['category_id']" :controller-name="$controllerName"
                                    :template-category="$itemsCategory" />
                            </td>
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
