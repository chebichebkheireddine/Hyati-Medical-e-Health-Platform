@props(['name', 'id', 'button', 'class' => 'btn btn-outline-primary btn-md m-1  uppercase'])
{{-- @props(['test']) --}}
<button type="button" class="{{ $class }}" data-bs-toggle="modal" data-bs-target="#{{ $id }}">


    {{ $button ?? '' }}

</button>
<!-- The Modal -->
<div class="modal fade" id="{{ $id }}">
    <div class="modal-dialog ">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"> {{ $name }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body slot info -->
            {{ $slot }}

        </div>
    </div>
</div>
