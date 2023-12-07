@php
    use App\Helpers\Form as FormTemplate;
    use App\Helpers\Template;

    $formInputAttr = config('zvn.template.form_input');
    $formLabelAttr = config('zvn.template.form_label_edit');

    $elements = [
        [
            'label' => Form::label('current_password', 'Current Password', $formLabelAttr),
            'element' => Form::password('current_password', $formInputAttr),
        ],
        [
            'label' => Form::label('password', 'Password', $formLabelAttr),
            'element' => Form::password('password', $formInputAttr),
        ],
        [
            'label' => Form::label('password_confirmation', 'Password Confirmation ', $formLabelAttr),
            'element' => Form::password('password_confirmation', $formInputAttr),
        ],
        [
            'element' => Form::submit('Save', ['class' => 'btn btn-sm btn-success']),
            'controllerName' => $controllerName,
            'type' => 'btn-submit-edit',
        ],
    ];
@endphp

<div class="card-body card card-info card-outline">
    @include ('admin.templates.error')
    {{ Form::open([
        'method' => 'POST',
        'url' => route($controllerName.'/save'),
        'accept-charset' => 'UTF-8',
        'enctype' => 'multipart/form-data',
        'class' => 'form-horizontal form-label-left',
        'id' => 'main-form',
    ]) }}
    {!! FormTemplate::show($elements) !!}
    {{ Form::close() }}
</div>



