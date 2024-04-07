@props(['name', 'type' => 'text'])
<div class="mb-3">
    <x-form.label name="{{ $name }}"></x-form.label>
    <input type="{{ $type }}" class="form-control" name="{{ $name }}" id="{{ $name }}"
        aria-describedby="emailHelp">
</div>
