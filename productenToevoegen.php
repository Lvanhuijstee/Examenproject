<?php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $newproductname = strtolower($_POST['newProduct']);
    $amount = $_POST['Amount'];

    if (isset($_POST['newProduct'])) {
        $sql = "SELECT * FROM product WHERE Naam ='$newproductname'";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) === 0){
            $EAN = rand(800000,8999999);
            $sql = "INSERT INTO product(Naam,Aantal,EAN)
            VALUES('$newproductname','$amount','$EAN')";
            mysqli_query($conn,$sql);
            header("location: levering.php");
        }else{
            $sql = "UPDATE product SET Aantal = Aantal+'$amount' WHERE Naam ='$newproductname'";
            mysqli_query($conn,$sql);
            header("location:levering.php");
        }
    }else{
        $productNaam = $_POST['Naam'];

        $data = array_keys($_POST);

        print_r($data);

        foreach($data as $key){

        

        // $sql = "SELECT * FROM product WHERE Naam='$names'";
        // $result = mysqli_query($conn, $sql);


        // if (mysqli_num_rows($result) === 1) {
        //     $productId = $_POST['id'];
        //     $sql = "UPDATE product SET Aantal = Aantal+'$amount' WHERE Naam ='$names'";
        //     mysqli_query($conn,$sql);
        //     header("location:levering.php");
        // }

     }
   }
}
mysqli_close($conn);
