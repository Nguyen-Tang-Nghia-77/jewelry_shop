
<span  style="width: 40px; display:inline-block;">
    @if ($node->getPrevSibling())
        <a href="{{ route('category/move', ['id' => $id, 'type' => 'up']) }}" class="btn btn-primary">
            <i class="fas fa-arrow-up" aria-hidden="true"></i>
        </a>
    @endif
</span>

<span style="width: 40px; display:inline-block;">
    @if ($node->getNextSibling())
        <a href="{{ route('category/move', ['id' => $id, 'type' => 'down']) }}" class="btn btn-danger"><i class="fas fa-arrow-down" aria-hidden="true"></i></a>
    @endif
</span>