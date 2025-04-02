function openPopup(record) {
    console.log(record); // Debug: Check the record object

    // Populate form fields
    document.getElementById('editId').value = record.id;
    document.getElementById('voornaam').value = record.Voornaam;
    document.getElementById('achternaam').value = record.Achternaam;
    document.getElementById('tussenvoegsel').value = record.Tussenvoegsel;
    document.getElementById('geboortedatum').value = record.Geboortedatum;
    document.getElementById('mobielnummer').value = record.Mobielnummer;
    document.getElementById('email').value = record.Email;
    document.getElementById('volwassenen').value = record.Volwassenen;
    document.getElementById('kinderen').value = record.Kinderen;
    document.getElementById('babys').value = record.Babys;

    // Show the popup
    document.getElementById('popup').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

// Update the record via AJAX
function updateRecord() {
    const form = document.getElementById('editForm');
    const formData = new FormData(form);

    // Convert FormData to JSON
    const data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });

    fetch('crud.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            table: 'klant', // Table name
            operation: 'update',
            id: formData.get('id'),
            data: data
        })
    })
        .then(response => response.text())
        .then(result => {
            alert(result);
            closePopup();
            location.reload(); // Reload the page to reflect changes
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

// Delete the record via AJAX
function deleteRecord(id) {
    if (confirm('Are you sure you want to delete this record?')) {
        fetch('crud.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                table: ['klant', 'adres'], // Delete from both tables
                operation: 'delete',
                id: id
            })
        })
            .then(response => response.text())
            .then(result => {
                console.log(result);
                //alert(result);
                //location.reload(); // Reload the page to reflect changes
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
}

function closePopup() {
    // Hide the popup and overlay
    document.getElementById('popup').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}
