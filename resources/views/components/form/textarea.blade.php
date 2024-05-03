@props(['name'])

<div class="mb-3">

    <textarea name="{{ $name }}" id="{{ $name }}" cols="10" rows="5" class="form-control">{{ old($name) }}</textarea>
</div>
