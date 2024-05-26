@props(['name', 'type' => 'text', 'req' => 'required', 'placeholder' => '', 'class' => 'form-control'])
<input type="{{ $type }}" {{ $req }} class="{{ $class }}" id="{{ $name }}"
    name="{{ $name }}" placeholder="{{ $placeholder }}" aria-describedby="emailHelp"
    {{ $attributes(['value' => old($name)]) }}>
<x-form.error name="{{ $name }}" />
