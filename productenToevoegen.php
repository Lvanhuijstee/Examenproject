<?php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['Amount'];

    if (isset($_POST['newProduct'])) {
        $newproductname = strtolower($_POST['newProduct']);
        $sql = "SELECT * FROM product WHERE Naam ='$newproductname'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 0) {
            $EAN = 8 + rand(100000, 999999);
            $sql = "INSERT INTO product(Naam,Aantal,EAN)
            VALUES('$newproductname','$amount','$EAN')";
            mysqli_query($conn, $sql);
            header("location: levering.php");
        } else {
            $sql = "UPDATE product SET Aantal = Aantal+'$amount' WHERE Naam ='$newproductname'";
            mysqli_query($conn, $sql);
            header("location:levering.php");
        }
    } else {
        $naam = $_POST['Naam'];
        $sql = "UPDATE product SET Aantal = Aantal + '$amount' WHERE Naam='$naam'";
        $result = mysqli_query($conn, $sql);
        header("location:levering.php");
        }
    }

mysqli_close($conn);
