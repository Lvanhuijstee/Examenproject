let currentPage = 1; // Track the current page number

// Show the current page and hide the others
function showPage(page) {
    
    const pages = document.querySelectorAll('.form-page');
    pages.forEach(page => page.classList.remove('active'));

    document.getElementById(`page${page}`).classList.add('active');
}

// Go to the next page
function nextPage(page) { 
    if(page == 6){
        console.log("Submitting form...");
        document.getElementById('registratie').submit(); 
    }
    currentPage = page;
    showPage(currentPage);
    updateSummary(); 
}

// Go to the previous page
function previousPage(page) {
    currentPage = page;
    showPage(currentPage);
}

function updateSummary() {
    const boxArray = []
    const name = document.getElementById("name").value;
    const Tsv = document.getElementById("Tsv").value;
    const Achternaam = document.getElementById("Achternaam").value;
    const Gbt = document.getElementById("gbd").value;
    const email = document.getElementById("email").value;
    const straatnaam = document.getElementById("straatnaam").value;
    const huisnummer = document.getElementById("huisnummer").value;
    const land = document.getElementById("postcode").value;
    const mobielNummer = document.getElementById("mobielnummer").value;
    const volwassenen = document.getElementById("volwassenen").value;
    const kinderen = document.getElementById("kinderen").value;
    const babys = document.getElementById("babys").value;
    const checkboxes = document.querySelectorAll('input[data-title="allergien_wensen[]"');
    checkboxes.forEach(checkbox =>{
        if(checkbox.checked){
           boxArray.push(`<br>`+checkbox.value);
        }
    })

    console.log(name, Tsv, Achternaam, Gbt, email, straatnaam, huisnummer, land, mobielNummer, volwassenen, kinderen, babys);

    const summary = `
        <p><strong>Naam:</strong> ${name}</p>
        <p><strong>Tussenvoegsel:</strong> ${Tsv}</p>
        <p><strong>Achternaam:</strong> ${Achternaam}</p>
        <p><strong>Geboortedatum:</strong> ${Gbt}</p>
        <p><strong>Email:</strong> ${email}</p>
        <p><strong>Straatnaam:</strong> ${straatnaam}</p>
        <p><strong>Huisnummer:</strong> ${huisnummer}</p>
        <p><strong>Land:</strong> ${land}</p>
        <p><strong>Mobielnummer:</strong> ${mobielNummer}</p>
        <p><strong>Allergien:</strong>${boxArray}</p>
        <p><strong>Volwassenen:</strong>${volwassenen}</p>
        <p><strong>Kinderen:</strong>${kinderen}</p>
        <p><strong>Babys:</strong>${babys}</p>
        
    `;

    document.getElementById("summary").innerHTML = summary;
}

showPage(1);