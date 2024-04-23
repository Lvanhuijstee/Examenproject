<?php
session_start();
include('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    <link rel="stylesheet" href="css/pakketen.css">
</head>

<body>
    <div class="nav">
        <div class="Name">
            <div class="logo">
                <img src="img/mv-vm-letter-logo-vector-29030838.jpg" alt="" />
            </div>
            <p>
                Voedselbank <br/>
                Maaskantje
            </p>
        </div>
        <div class="Menu">
            <div class="dropMenu">
                <p id="pakket">
                    Pakket <br/>
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

    <div class="flexcontainer">
       <form action="pakketen.php" method="post">
       <button type="submit">Nieuw pakket</button>
       </form>
        <div class="pakketcontainer">
            <div style="width: 200px; height:200px; background-color:white; margin:20px;"></div>
        </div>
        <div class="pakketcontainer">
            <div style="width: 200px; height:200px; background-color:white; margin:20px;"></div>
        </div>
    </div>
    <script src="pakketen.js"></script>
</body>

</html>