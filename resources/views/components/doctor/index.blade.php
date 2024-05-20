<!-- resources/views/prescription.blade.php -->

<div class="row">
    <div class="col-12">
        <div class="card ">
            <div class="card-body rounded-xl ">
                <form method="post" action="#" id="prescription-form">

                    <div>
                        <div class="m-2"id="drugs">

                            <div class="row">
                                <div class="col-md-3">
                                    <x-form.input name="drugs[]" placeholder="Drug" />
                                </div>
                                <div class="col-md-3">
                                    <x-form.input name="dosage[]" type="number" placeholder="dosage" />
                                </div>
                                <div class="col-md-3">
                                    <x-form.input name="time[]" type="date" placeholder="Time" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <button class="btn btn-outline-primary" type="button" id="add-drug">Add another
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-outline-danger" type="button" id="delete-drug">Add another
                        </div>


                    </div>
                    drug</button>
                    <x-form.textarea name="description" />
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body rounded-xl">
                <h5>Stored Drugs</h5>
                <ul id="stored-drugs"></ul>
            </div>
        </div>
    </div>
    <script src="{{ asset('/assets/js/prescription.js') }}"></script>
