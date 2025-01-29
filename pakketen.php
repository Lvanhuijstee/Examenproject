<?php
session_start();
include('database.php');

$sql2 = "SELECT Pakket_id,Productnaam,GROUP_CONCAT(Productnaam SEPARATOR ' ') AS producten
 FROM pakket_has_product 
 GROUP BY Pakket_id";
$result = mysqli_query($conn, $sql2);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "INSERT INTO pakket (Inpakdatum)
    VALUES (current_timestamp())";
    mysqli_query($conn, $sql);

    $pakketId = mysqli_insert_id($conn);

    $_SESSION['pakketId'] = $pakketId;

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
    <div class="flexcontainer">
       <form action="pakketen.php" method="post">
       <button type="submit">Nieuw pakket</button>
       </form>
       <?php while($row = mysqli_fetch_assoc($result)){
        $products = $row['producten'];
        $items = explode(' ', $products);?>
        <div class="pakket">
            <p><?=$row['Pakket_id']?></p>
            <p>producten:</p>
            <ul>
            <?php foreach($items as $item){?>
            <li style='color: black;'><?=$item?></li>
            <?php }?>
            </ul>
        </div>
        <?php }?>
    </div>
    <footer class="footer">
        <div class="footer-item">Copyright © 2023 ROCvF</div>
    </footer>
    <script src="pakketen.js"></script>
</body>

</html>