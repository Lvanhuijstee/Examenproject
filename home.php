<?php
// include('permissions.php');
// if (!isset($_SESSION)) {
//     session_start();
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Homepage</title>
    <link rel="stylesheet" media="screen" href="css/Header.css" />
    <link rel="stylesheet" media="screen" href="css/home.css" />
    <link rel="stylesheet" media="screen" href="css/footer.css" />
</head>

<body>
    <header>
        <div class="menu-container">
            <div class="left">
                <a href="home.php" class="logo"><img src="img/mv-vm-letter-logo-vector-29030838.jpg" alt=""></a>
                <h1>Voedselbank Maaskantje</h1>
            </div>
            <div class="center">
                <a href="pakketen.php">Pakketen samenstelling</a>
                <a href="levering.php">prodcucten</a>
                <div class="dropmenu">
                    <p>Administratie</p>
                    <div class="dropmenu-content">
                        <a href="">eerste</a>
                        <a href="">tweede</a>
                        <a href="">derde</a>
                    </div>
                </div>
            </div>
            <div class="right">
                <a href="account.php">Account details</a>
            </div>
        </div>
    </header>
    <div class="flex-container">
        <div class="flex-item">
            <h2>Voorraardbeheer</h2>
            <div class="voorraad-flex">
                <div>
                    <a href="">Voorraad</a>
                </div>
            </div>
        </div>
        <div class="flex-item">
            <h2>Pakket samenstelling</h2>
            <div class="pakketen-flex">
                <div><a href="">Pakketen </a></div>
                <div><a href="">Producten</a></div>
            </div>
        </div>
        <div class="flex-item">
            <h2>Gebruiker overzicht</h2>
            <div class="gebruikers-flex">
                <div><a href="">Klanten </a></div>
                <div><a href="">Medewerkers</a></div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-item">Copyright © 2023 ROCvF</div>
    </footer>
</body>

</html>