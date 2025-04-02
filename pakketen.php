<?php
session_start();
include('database.php');

$SQL_GET_PAKKET = "SELECT * FROM pakket
LEFT JOIN pakket_has_product ON pakket.id = pakket_has_product.Pakket_id"; 
$result = mysqli_query($conn, $SQL_GET_PAKKET);

$SQL_PAKKKET = "SELECT * FROM pakket";
$result2 = mysqli_query($conn, $SQL_PAKKKET);
if($_SERVER["REQUEST_METHOD"] == "POST") {
 

    header("location: producten.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/Header.css">
    <link rel="stylesheet" href="css/pakketen.css">
    <link rel="stylesheet" href="css/footer.css">
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
    
    <div class="flex-container">
        <div class="Item-holder">
        <?php while($row = mysqli_fetch_assoc($result2)){?>
        <div class="flex-item">
        <?php while($row2 = mysqli_fetch_assoc($result)){ ?>   
        <p><?php echo $row2['Productnaam'];?></p>
        <?php } ?>
        </div>
        <?php } ?>

        <button onclick="toggleVisibility()">Nieuw</button>
        </div>
    </div>
    <div id="createPakket">
        
    </div>

    <footer class="footer">
        <div class="footer-item">Copyright © 2025 ROCvF</div>
    </footer>
    <script src="pakket.js"></script>
</body>

</html>