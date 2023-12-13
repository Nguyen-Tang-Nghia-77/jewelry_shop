<li class="dd-item" data-id="{{ $item->id }}">
    <div class="dd-handle">{{ $item->name . ' id:' . $item->id}}</div>
    @if (count($item->children) > 0)
        <ol class="dd-list">
            @foreach ($item->children as $itemChild)
                @include('admin.pages.category.list-item', ['item' => $itemChild])
            @endforeach
        </ol>
    @endif
</li>