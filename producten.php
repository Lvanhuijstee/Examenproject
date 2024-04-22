<?php 
session_start();
include('database.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/producten.css">
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
      <div class="pagename">
        <h2>Pakketsamenstelling</h2>
      </div>
      <div class="flexContainer">
          <div class="productHolder">
            <div>
                <img src="img/c1f9c31632323e540af201ef02c5c214.png" alt="">
            </div>
          </div>
      </div>
      <footer>
        <div class="footer-container">
          <div class="footer-left">
            <p>Copyright © 2023 ROCvF</p>
          </div>
        </div>
      </footer>
</body>
</html>