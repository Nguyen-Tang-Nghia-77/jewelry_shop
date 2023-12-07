@extends('admin.main')

@section('content')
    @include ('admin.templates.error')

    <section class="content">
        <div class="container-fluid">
            <div class="card card-info card-outline">
                <div class="card-body">
                    @if (@$item['id'])
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                @include('admin.pages.user.form_info')
                            </div>
                            <div class="col-lg-6 col-12">
                                @include('admin.pages.user.form_change_password')
                                @include('admin.pages.user.form_change_level')
                            </div>
                        </div>
                    @else
                        @include('admin.pages.user.form_add')
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
