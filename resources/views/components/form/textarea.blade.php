@props(['name'])

<div class="mb-3">

    <textarea name="{{ $name }}" id="{{ $name }}" cols="5" rows="2" class="form-control">{{ old($name) }}</textarea>
</div>
