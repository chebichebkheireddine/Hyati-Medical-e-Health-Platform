@props(['name', 'type' => 'text'])
<div class="modal-body">
    <div class="mb-3">
        <label for="{{ $name }}" class="form-label">{{ $name }}</label>
        <input type="{{ $type }}" class="form-control" name="{{ $name }}" id="{{ $name }}"
            aria-describedby="emailHelp">
    </div>
</div>
