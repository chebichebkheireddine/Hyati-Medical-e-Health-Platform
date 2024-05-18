<!-- resources/views/prescription.blade.php -->

<div class="row">
    <div class="col-12">
        <div class="card ">
            <div class="card-body rounded-xl ">
                <form method="post" action="#" id="prescription-form">
                    <x-form.input id="doctor" name="doctor" placeholder="Patient's doctor" />

                    <x-form.input id="patient" name="patient" placeholder="Patient's Name" />
                    <div id="drugs">
                        <x-form.input name="drugs[]" placeholder="Drug" />
                    </div>
                    <button class="btn btn-outline-primary" type="button" id="add-drug">Add another
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
