var tracker = 1;
var gridContainer = document.getElementById("gridContainer");
var headerRow = document.createElement("div");
headerRow.classList.add("grid-item", "grid-item-top");
gridContainer.appendChild(headerRow);

var columnData = [
  {
    header: "EAN",
    value: "New EAN",
  },
  {
    header: "Productnaam",
    value: "New Productnaam",
  },
  {
    header: "Omschrijving",
    value: "New Omschrijving",
  },
  {
    header: "Aantal",
    value: "New Aantal",
  },
  {
    header: "Levering id",
    value: "New Levering id",
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
  const ean = document.getElementById("ean").value;
  const productnaam = document.getElementById("productnaam").value;
  const omschrijving = document.getElementById("omschrijving").value;
  const aantal = document.getElementById("aantal").value;

  // Create an object with the captured data
  const formData = {
    ean: ean,
    productnaam: productnaam,
    omschrijving: omschrijving,
    aantal: aantal,
  };

  // Call the postData function with the form data
  postDataToServer(formData);
}

function postDataToServer(formData) {
  fetch("http://85.214.56.174:8000/inventory/product", {
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
