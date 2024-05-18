// public/js/prescription.js

document.getElementById('add-drug').addEventListener('click', function() {
    let newDrugInput = document.createElement('input');
    newDrugInput.type = 'text';
    newDrugInput.name = 'drugs[]';
    newDrugInput.placeholder = 'Drug';
    newDrugInput.classList.add('form-control'); // Add Bootstrap class
    document.getElementById('drugs').appendChild(newDrugInput);
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
