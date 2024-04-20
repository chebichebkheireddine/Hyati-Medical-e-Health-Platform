@props(['name', 'type' => 'text'])
<input type="{{ $type }}" required class="form-control" id="{{ $name }}" name="{{ $name }}"
    aria-describedby="emailHelp" {{ $attributes(['value' => old($name)]) }}>
<x-form.error name="{{ $name }}" />
