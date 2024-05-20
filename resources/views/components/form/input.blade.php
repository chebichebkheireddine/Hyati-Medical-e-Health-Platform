@props(['name', 'type' => 'text', 'req' => 'required', 'placeholder' => ''])
<input type="{{ $type }}" {{ $req }} class="form-control" id="{{ $name }}"
    name="{{ $name }}" placeholder="{{ $placeholder }}" aria-describedby="emailHelp"
    {{ $attributes(['value' => old($name)]) }}>
<x-form.error name="{{ $name }}" />
