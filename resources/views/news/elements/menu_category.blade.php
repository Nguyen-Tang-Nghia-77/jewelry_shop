@php 
    use App\Models\CategoryModel as CategoryModel;
    use App\Helpers\URL;
    use App\Models\MenuModel;
    $categoryModel = new CategoryModel();
    $menuModel  = new MenuModel();
    $itemsMenu   = $menuModel->listItems(null, ['task'  => 'menu-list-items']);
    $categories = CategoryModel::withDepth()->where('status', 'active')->defaultOrder()->get()->toTree();
@endphp

<nav class="main_nav">
    <ul class="main_nav_list d-flex flex-row align-items-center justify-content-start">
        @foreach ( $itemsMenu as $item)
            @php
                $categoryIdCurrent = Route::input('category_id');
                $classActive = ($categoryIdCurrent == $item['id']) ? 'class="active"' : '';
            @endphp
            @if ($item['type'] == 'link')
                <li {{ $classActive }}><a href="{{ $item['link'] }}">{{ $item['name'] }}</a></li>
            @else
                <li>
                    <div class="dropdown">
                        <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                            Danh mục
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach ($categories as $category)
                                @include('news.elements.menu_item_category', ['category' => $category])
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endif
        @endforeach
        @if (session('userInfo'))
            <li><a href="{{ route('auth/logout') }}">Logout</a></li>'
        @else
            <li><a href="{{ route('auth/login') }}">Login</a></li>'
        @endif
    </ul>




