<button type="button" class="btn btn-outline-primary m-1 mt-3 py-3 uppercase" data-bs-toggle="modal"
    data-bs-target="#addhealthcare">
    <i class="ti ti-user fs-6 "> ADD</i>
</button>
<!-- The Modal -->
<div class="modal" id="addhealthcare">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <form method="Post" action="/role/add">
                @csrf
                <x-form.input name="name"></x-form.input>
                {{-- <x-form.input name="description"></x-form.input> --}}
                <x-form.textarea name="description"></x-form.textarea>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success " data-bs-dismiss="modal">Add</button>
                </div>
            </form>

        </div>
    </div>
</div>
