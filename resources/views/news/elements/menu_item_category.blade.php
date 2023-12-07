@php
    use App\Helpers\URL;
@endphp

        @if (count($category->children) > 0)
            <li class="dropdown-submenu">
                <a class="dropdown-toggle dropdown-item" href="{{ URL::linkCategory($category->id, $category->name) }}">{{ $category->name }}</a>
                <ul class="dropdown-menu">
                    @foreach ($category->children as $childCategory)
                        @include('news.elements.menu_item_category', ['category' => $childCategory])
                    @endforeach
                </ul>
            </li>
        @else
            <li><a class="dropdown-item" href="{{ URL::linkCategory($category->id, $category->name) }}">{{ $category->name }}</a></li>
        @endif



