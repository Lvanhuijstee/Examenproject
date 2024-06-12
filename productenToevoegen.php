<?php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newproductname;
    $newproductname = strtolower($_POST['newProduct']);
    $amount = $_POST['Amount'];

    if (isset($_POST['newProduct'])) {
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

        foreach ($_POST['Naam'] as $index => $names) {

            $sql = "SELECT * FROM product WHERE Naam='$names'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) === 1){
                $productId = $_POST['id'];
                $sql = "UPDATE product SET Aantal = Aantal+'$amount[$index]' WHERE Naam ='$names'";
                mysqli_query($conn, $sql);
                header("location:levering.php");
            }
        }
    }
}
mysqli_close($conn);
