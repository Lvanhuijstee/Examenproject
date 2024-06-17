var tracker = 1;
var gridContainer = document.getElementById("gridContainer");
var headerRow = document.createElement("div");
headerRow.classList.add("grid-item", "grid-item-top");
gridContainer.appendChild(headerRow);

var columnData = [
  {
    header: "Bedrijfsnummer",
    value: "New Bedrijfsnummer",
  },
  {
    header: "Bedrijfsnaam",
    value: "New Bedrijfsnaam",
  },
  {
    header: "Contactpersoon",
    value: "New Contactpersoon",
  },
  {
    header: "Email",
    value: "New Email",
  },
  {
    header: "Telefoonnummer",
    value: "New Telefoonnummer",
  },
];

// Add headers to the header row
columnData.forEach(function (column) {
  headerRow.innerHTML += `<div class="grid-header">${column.header}</div>`;
});

function openModal() {
  var modal = document.getElementById("myModal");
  modal.style.display = "block";
}

function closeModal() {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
}

function postData() {
  // Get values from the form
  const bedrijfsnummer = document.getElementById("bedrijfsnummer").value;
  const bedrijfsnaam = document.getElementById("bedrijfsnaam").value;
  const contactpersoon = document.getElementById("contactpersoon").value;
  const email = document.getElementById("email").value;
  const telefoonnummer = document.getElementById("telefoonnummer").value;

  // Create an object with the captured data
  const formData = {
    bedrijfsnummer: bedrijfsnummer,
    bedrijfsnaam: bedrijfsnaam,
    contactpersoon: contactpersoon,
    email: email,
    telefoonnummer: telefoonnummer,
  };

  // Call the postData function with the form data
  postDataToServer(formData);
}

function postDataToServer(formData) {
  fetch("http://85.214.56.174:8000/inventory/leverancier", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(formData),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      return response.json();
    })
    .then((data) => {
      console.log("Data sent successfully:", data);
      closeModal();
    })
    .catch((error) => {
      console.error("Data sending failed:", error);
      closeModal();
    });
}

function filterGrid() {
  var searchTerm = document.getElementById("search").value.toLowerCase();
  var rows = document.querySelectorAll(".grid-item:not(.grid-item-top)");

  rows.forEach(function (row) {
    var rowText = row.innerText.toLowerCase();
    if (rowText.includes(searchTerm)) {
      row.style.display = "";
    } else {
      row.style.display = "none";
    }
  });
}

function AccountDetails() {
  window.location.href = "accdetails.html";
}
