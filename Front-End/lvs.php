<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Voedselbank Maaskantje</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/lvs.css" />
    <script src="https://unpkg.com/htmx.org@1.9.8"></script>
  </head>
  <body>
    <header>
      <div class="Name">
        <div class="logo">
          <img src="img/mv-vm-letter-logo-vector-29030838.jpg" alt="" />
        </div>
        <p>
          Voedselbank <br />
          Maaskantje
        </p>
      </div>

      <div class="Menu">
        <div class="dropMenu">
          <p id="pakket">
            Pakket <br />
            samenstelling
          </p>
        </div>
        <div class="dropMenu">
          <p>Administratie</p>
          <div class="dropMenu-Content">
            <a href="lvs.html">Leverancier overzicht</a>
            <a href="producten.html">Product Overzicht</a>
            <a href="">Maand overzicht</a>
            <a href="klanten.html">Klanten overzicht</a>
          </div>
        </div>
        <div class="dropMenu" id="Settings">
          <p onclick="AccountDetails">Account details</p>
        </div>
      </div>
    </header>
    <main>
      <section class="GridContainer">
        <div class="GridBox">
          <h1>Leverancier<br />Overzicht</h1>
          <div class="ButtonHolder">
            <button type="button" onclick="openModal()">Create</button>
          </div>

          <div class="SearchBar">
            <label for="search">Search:</label>
            <input type="text" id="search" oninput="filterGrid()" />
          </div>

          <div class="grid-container" id="gridContainer"></div>
        </div>
      </section>

      <div id="myModal" class="modal">
        <form id="dataForm">
          <label for="bedrijfsnummer">Bedrijfsnummer:</label>
          <input type="number" id="bedrijfsnummer" name="bedrijfsnummer" />

          <label for="bedrijfsnaam">Bedrijfsnaam:</label>
          <input type="text" id="bedrijfsnaam" name="bedrijfsnaam" />

          <label for="contactpersoon">Contactpersoon:</label>
          <input type="text" id="contactpersoon" name="contactpersoon" />

          <label for="email">Email:</label>
          <input type="text" id="email" name="email" />

          <label for="telefoonnummer">Telefoonnummer:</label>
          <input type="number" id="telefoonnummer" name="telefoonnummer" />

          <button type="button" onclick="postData()">Create</button>
          <button type="button" onclick="closeModal()">Cancel</button>
        </form>
      </div>
    </main>
    <footer>
      <div class="footer-container">
        <div class="footer-left">
          <p>Copyright © 2023 ROCvF</p>
        </div>
      </div>
    </footer>
    <script src="js/lvs.js"></script>
  </body>
</html>
