@props(['name', 'type' => 'text', 'req' => 'required'])
<input type="{{ $type }}" {{ $req }} class="form-control" id="{{ $name }}"
    name="{{ $name }}" aria-describedby="emailHelp" {{ $attributes(['value' => old($name)]) }}>
<x-form.error name="{{ $name }}" />
