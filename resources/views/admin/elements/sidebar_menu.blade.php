<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('admin-bk/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Alexander</a>
        </div>
    </div>
    
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @php
                $classActive = '';
                $tmplSidebar = Config('zvn.template.sidebar');
            @endphp
            @foreach ($tmplSidebar as $key => $val)
                @php
                    $classActive = (($controllerName ?? '') == $key) ? 'active' : '';
                @endphp
                <li class="nav-item">
                    <a href="{{ route($key) }}" class="nav-link {{ $classActive }}" data-active="{{ $key }}">
                        <i class="nav-icon fas {{ $val['icon'] }}"></i>
                        <p>{{ $val['name'] }}</p>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
