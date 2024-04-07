@props(['name'])

<div class="mb-3">
    <x-form.label name="{{ $name }}"></x-form.label>
    <textarea name="{{ $name }}" id="{{ $name }}" cols="10" rows="5" class="form-control">{{ old($name) }}</textarea>
</div>
