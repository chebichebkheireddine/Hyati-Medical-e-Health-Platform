<div {{ $attributes->merge(['class' => 'form-check']) }}>
    <input type="checkbox" class="form-check-input" {{ $attributes }}>
    <label class="form-check-label" for="{{ $attributes['id'] }}">
        {{ $slot }}
    </label>
</div>
