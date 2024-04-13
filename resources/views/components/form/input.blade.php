@props(['name', 'type' => 'text'])
<input type="{{ $type }}" required class="form-control" id="{{ $name }}" name="{{ $name }}"
    aria-describedby="emailHelp">
<x-form.error name="{{ $name }}" />
