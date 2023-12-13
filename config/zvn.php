<?php

return [
    'url'              => [
        'prefix_admin' => 'admin',
        'prefix_frontend'  => '',
    ],
    'format'           => [
        'long_time'    => 'H:m:s d/m/Y',
        'short_time'   => 'd/m/Y',
    ],
    'template'         => [
        'form_input' => [
            'class' => 'form-control form-control-sm'
        ],
        'form_label' => [
            'class' => 'col-sm-2 col-form-label text-sm-right'
        ],
        'form_label_edit' => [
            'class' => 'control-label col-md-4 col-sm-3 col-xs-12'
        ],
      
        'form_ckeditor' => [
            'class' => 'form-control col-md-6 col-xs-12 ckeditor'
        ],
        'dashboard' => [
            'products'       => ['name' => 'Product', 'class' => 'bg-info', 'icon' => 'ion-clipboard'],
            'categories'      => ['name' => 'Category', 'class'      => 'bg-primary', 'icon' => 'ion-bag'],
            'sliders'        => ['name' => 'Slider', 'class' => 'bg-danger', 'icon' => 'ion-filing'],
            'users'          => ['name' => 'User', 'class' => 'bg-warning', 'icon' => 'ion-person'],
            'menu'          => ['name' => 'Menu', 'class' => 'bg-warning', 'icon' => 'ion-bag'],
        ],
        'sidebar' => [
            // 'dashboard'       => ['name' => 'Dashboard', 'icon' => 'fa-tachometer-alt'],
            // 'category'      => ['name' => 'Category',  'icon' => 'fa-user'],
            // 'slider'        => ['name' => 'Slider', 'icon' => 'fa-sliders-h'],
            'user'          => ['name' => 'User', 'icon' => 'fa-users'],
            // 'menu'          => ['name' => 'Menu', 'icon' => 'fa-bars'],
            // 'file'          => ['name' => 'Hình ảnh', 'icon' => 'fa-images'],
            // 'changePassword'          => ['name' => 'Change password', 'icon' => 'fa-key'],
        ],
        'status'       => [
            'all'      => ['name' => 'Tất cả', 'class' => 'btn-success'],
            'active'   => ['name' => 'Kích hoạt', 'class'      => 'btn-success'],
            'inactive' => ['name' => 'Chưa kích hoạt', 'class' => 'btn-info'],
            'block' => ['name' => 'Bị khóa', 'class' => 'btn-danger'],
            'default'      => ['name' => 'Chưa xác định', 'class' => 'btn-success'],
        ],
        'is_home'       => [
            'yes'      =>  ['name'=> 'Hiển thị', 'class'=> 'btn-primary'],
            'no'        => ['name'=> 'Không hiển thị', 'class'=> 'btn-warning'],
            'default'      => ['name' => 'Chưa xác định', 'class' => 'btn-success']
        ],
        'display'       => [
            'list'      => ['name'=> 'Danh sách'],
            'grid'      => ['name'=> 'Lưới'],
        ],
        'type' => [
            'featured'   => ['name'=> 'Nổi bật'],
            'normal'     => ['name'=> 'Bình thường'],
        ],
        'rss_source' => [
            'vnexpress'   => ['name'=> 'VNExpress'],
            'tuoitre'     => ['name'=> 'Tuổi Trẻ'],
        ],
        'level'       => [
            'admin'      => ['name'=> 'Quản trị hệ thống'],
            'member'      => ['name'=> 'Người dùng bình thường'],
        ],
        'search'       => [
            'all'           => ['name'=> 'Search by All'],
            'id'            => ['name'=> 'Search by ID'],
            'name'          => ['name'=> 'Search by Name'],
            'username'      => ['name'=> 'Search by Username'],
            'fullname'      => ['name'=> 'Search by Fullname'],
            'email'         => ['name'=> 'Search by Email'],
            'description'   => ['name'=> 'Search by Description'],
            'link'          => ['name'=> 'Search by Link'],
            'content'       => ['name'=> 'Search by Content'],
            
        ],
        'button' => [
            'edit'      => ['class'=> 'btn-info' , 'title'=> 'Edit'      , 'icon' => 'fa-pencil-alt' , 'route-name' => '/form'],
            'delete'    => ['class'=> 'btn-danger btn-delete'  , 'title'=> 'Delete'    , 'icon' => 'fa-trash-alt'  , 'route-name' => '/delete'],
            'info'      => ['class'=> 'btn-success'    , 'title'=> 'View'      , 'icon' => 'fa-pencil' , 'route-name' => '/delete'],
        ]
            
    ],
    'config' => [
        'search' => [
            'default'   => ['all', 'id', 'fullname'],
            'slider'    => ['all', 'id', 'name', 'description', 'link'],
            'category'  => ['all', 'name'],
            'product'   => ['all', 'name', 'content'],
            'user'      => ['all', 'username', 'email', 'fullname'],
            'menu'      => ['all', 'name', 'link']
        ],
        'button' => [
            'default'   => ['edit', 'delete'],
            'slider'    => ['edit', 'delete'],
            'category'  => ['edit', 'delete'],
            'product'   => ['edit', 'delete'],
            'user'      => ['edit', 'delete'],
            'menu'   => ['edit', 'delete'],
        ]
    ]
    
];