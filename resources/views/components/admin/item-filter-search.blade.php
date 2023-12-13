<div class="">
    <div class="input-group">
        <div class="input-group-btn mr-1">
            <button type="button" class="btn btn-default dropdown-toggle btn-active-field" data-toggle="dropdown"
                aria-expanded="false">
                <span class="caret">{{ $tmplField[$searchField]['name'] }}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-right" style="width: 30px;" role="menu">
                {!! $xhtmlField !!}
            </ul>
        </div>
        <input type="hidden" name="search_field" value="{{ $searchField }}">
        <input id="form-search" type="text" class="form-control form-control-sm mr-1" name="search_value" value="{{ $searchValue }}"
            style="min-width: 300px;height:38px;">
        <div class="input-group-append">
            <button id="btn-search" type="button" class="btn btn-primary mr-1">Search</button>
            <button type="button" class="btn btn-sm btn-danger " id="btn-clear-search">
                <a href="#" class="text-white">Clear</a>
            </button>
        </div>
    </div>
</div>

