<?php 
  session_start();
  include('database.php');

  $pakketId = $_SESSION['pakketId'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/Header.css">
    <link rel="stylesheet" href="css/producten.css">
    <link rel="stylesheet" media="screen" href="css/footer.css"/>
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
                    <p >Administratie</p>
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
      <footer class="footer">
        <div class="footer-item">Copyright © 2025 ROCvF</div>
    </footer>
    <script src="producten.js"></script>
</body> 
</html>