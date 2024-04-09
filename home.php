<?php
    session_start();
    // echo $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Homepage</title>
    <link rel="stylesheet" media="screen" href="home.css"/>
  </head>
  <body>
    <div class="nav">
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
            <a href="">Product Overzicht</a>
            <a href="">Maand overzicht</a>
            <a href="klanten.html">Klanten overzicht</a>
          </div>
        </div>
        <div class="dropMenu" id="Settings">
          <p>Account details</p>
        </div>
      </div>
    </div>
    
    <div class="flexContainer">

      <div class="left">
        <div class="idk">
          <h2>Leverancier overzicht</h2>
          <img src="img/truck.png" alt="">
        </div>

        <div class="idk">
          <h2>Voorraadbeheer</h2>
          <img src="img/18634-200.png" alt="">
        </div>
      </div>

      <div class="centering">
        <div class="middle">
          <h2>Pakket samenstelling</h2>
          <img src="img/list.png" alt="">
        </div>
        
        <div class="right">
          <h2>Klanten overzicht</h2>
          <img src="img/2715035-200.png" alt="">
          <button>Klant gegevens</button>
        </div>
      </div>

    </div>
  </body>
</html>
