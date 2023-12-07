@extends('admin.main')
@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label');

    $statusValue = ['default' => 'Select status', 'active' => config('zvn.template.status.active.name'), 'inactive' => config('zvn.template.status.inactive.name')];

    $isHomeValue = ['default' => ['name' => '- Select Is Home -'] ] + Config('zvn.template.is_home');
    $isHomeValue = array_combine(array_keys($isHomeValue), array_column($isHomeValue , 'name'));

    $displayValue = ['default' => ['name' => '- Select Display -'] ] + Config('zvn.template.display');
    $displayValue = array_combine(array_keys($displayValue), array_column($displayValue , 'name'));
    

    $inputHiddenID = Form::hidden('id', @$item['id']);
    $elements = [
        [
            'label' => Form::label('name', 'Name', $formLabelAttr),
            'element' => Form::text('name', @$item['name'], $formInputAttr),
        ],
        [
            'label' => Form::label('status', 'Status', $formLabelAttr),
            'element' => Form::select('status', $statusValue, @$item['status'], $formInputAttr),
        ],
        [
            'label' => Form::label('parent_id', 'Parent', $formLabelAttr),
            'element' => Form::select('parent_id', $categories, @$item['parent_id'], $formInputAttr),
        ],
        [
            'label' => Form::label('is_home', 'Is Home', $formLabelAttr),
            'element' => Form::select('is_home', $isHomeValue, @$item['is_home'], $formInputAttr),
        ],
        [
            'label' => Form::label('display', 'Display', $formLabelAttr),
            'element' => Form::select('display', $displayValue, @$item['display'], $formInputAttr),
        ],
        [
            'element' => $inputHiddenID . Form::submit('Save', ['class' => 'btn btn-sm btn-success mr-1 ']),
            'controllerName' => $controllerName,
            'type' => 'btn-submit',
        ],
    ];
@endphp

@section('content')

    @include ('admin.templates.error')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-info card-outline">
                <div class="card-body">
                    {{ Form::open([
                        'method' => 'POST',
                        'url' => route("$controllerName/save"),
                        'accept-charset' => 'UTF-8',
                        'enctype' => 'multipart/form-data',
                        'class' => 'mb-0',
                        'id' => 'main-form',
                    ]) }}
                    {!! FormTemplate::show($elements) !!}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
@endsection
