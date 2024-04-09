@props(['name', 'id'])
<button type="button" class="btn btn-outline-primary m-1 mt-3 py-3 uppercase" data-bs-toggle="modal"
    data-bs-target="#{{ $id }}">
    <i class="ti ti-user fs-6 ">{{ $name }}</i>
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
