@props(['name', 'type' => 'text', 'req' => 'required', 'icon'])
<div class="input-group">
    <input type="{{ $type }}" {{ $req }} class="form-control custom-size rounded-2"
        id="{{ $name }}" name="{{ $name }}" aria-describedby="emailHelp"
        {{ $attributes(['value' => old($name)]) }}>
    <div class="input-group-append">
        <span class="input-group-text custom-size rounded-2 ">
            <i class="{{ $icon }}"></i>
        </span>
    </div>
    <x-form.error name="{{ $name }}" />
</div>

<style>
    .custom-size {
        height: 40px;
        /* Adjust this value to the desired height */
    }
</style>
