<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Voedselbank Maaskantje</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="css/accdetail.css"
    />
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
      <div class="box">
        <div class="box-title">ACCOUNT</div>
        <div class="account-info">
          <div class="user-data">
            <div class="BoxMain">
              <strong>GEBRUIKERSNAAM:</strong> <span>YourUsername</span>
            </div>
            <div class="BoxMain">
              <strong>EMAIL:</strong> <span>your@email.com</span>
            </div>
            <div class="BoxMain">
              <strong>PASSWORD:</strong>
              <button class="toggle-password" onclick="redirectToYouTube()">
                Show/Hide
              </button>
              <button class="change-password-button">Change Password</button>
            </div>
          </div>
        </div>
      </div>

      <div class="box">
        <div class="box-title">TAKENLIJST</div>
        <div class="buttons">
          <button class="button">PERSOONSGEGEVENS</button>
          <button class="button">INKOMSTEN</button>
          <button class="button">UITGAVEN</button>
          <button class="button">ALLERGIEN</button>
          <button class="button">FAMILIE</button>
        </div>
      </div>

      <div class="box">
        <div class="box-title">BERICHTEN</div>
        <div class="scroll-section">
          <div class="message-box">
            <p>
              Welkom bij voedselbank maaskantje, vergeet alstblieft niet uw
              takenlijst in te voeren! Als u ze heeft ingeleverd, komt er een
              berichtje zoals deze tevoorschijn!
            </p>
          </div>
          <div class="message-box">
            <p>Dit is het begin van uw berichtenbox</p>
          </div>
        </div>
      </div>
    </main>

    <script>
      function redirectToYouTube() {
        window.location.href = "https://www.youtube.com/watch?v=U2Fjfqm-7g8";
      }

      function AccountDetails() {
        window.location.href = "accdetails.html";
      }
    </script>

    <footer>
      <div class="footer-container">
        <div class="footer-left">
          <p>Copyright © 2023 ROCvF</p>
        </div>
      </div>
    </footer>
  </body>
</html>
