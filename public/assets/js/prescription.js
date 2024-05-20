// public/js/prescription.js
document.getElementById('add-drug').addEventListener('click', function() {
    let newDrugInput = document.createElement('input');
    let newDosageInput = document.createElement('input');
    let newTimeInput = document.createElement('input');
    newDrugInput.type = 'text';
    newDrugInput.name = 'drugs[]';
    newDrugInput.placeholder = 'Drug';
    newDosageInput.type = 'number';
    newDosageInput.name = 'dosage[]';
    newDosageInput.placeholder = 'Dosage';
    newTimeInput.type = 'date';
    newTimeInput.name = 'time[]';
    newDrugInput.classList.add('form-control');
    newDosageInput.classList.add('form-control');
    newTimeInput.classList.add('form-control');

    let newDrugDiv = document.createElement('div');
    newDrugDiv.classList.add('col-md-3');
    newDrugDiv.appendChild(newDrugInput);

    let newDosageDiv = document.createElement('div');
    newDosageDiv.classList.add('col-md-3');
    newDosageDiv.appendChild(newDosageInput);

    let newTimeDiv = document.createElement('div');
    newTimeDiv.classList.add('col-md-3');
    newTimeDiv.appendChild(newTimeInput);

    let newRow = document.createElement('div');
    newRow.classList.add('row');
    newRow.classList.add('mt-2');
    newRow.appendChild(newDrugDiv);
    newRow.appendChild(newDosageDiv);
    newRow.appendChild(newTimeDiv);

    document.getElementById('drugs').appendChild(newRow);
});
document.getElementById('prescription-form').addEventListener('submit', function(e) {
    e.preventDefault();

    let doctor = document.getElementById('doctor').value;
    let patient = document.getElementById('patient').value;
    let drugs = Array.from(document.querySelectorAll('input[name="drugs[]"]')).map(input => input.value);
    let description = document.querySelector('textarea[name="description"]').value;

    fetch('/api/prescriptions', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            doctor: doctor,
            patient: patient,
            drugs: drugs,
            description: description
        })
    }).then(response => response.json())
      .then(data => console.log(data))
      .catch(error => console.error('Error:', error));
});
