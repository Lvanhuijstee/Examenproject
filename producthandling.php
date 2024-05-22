<?php
session_start();
include('database.php');

if(isset($_POST['id'])){
    $ProductId = $_POST['id'];
    $pakketId = $_SESSION['pakketId'];
    $ProductNaam = $_POST['Name'];

    $sql = "SELECT * FROM pakket_has_product WHERE Pakket_id ='$pakketId'";
    $result = mysqli_query($conn, $sql);
    $CurrentProductIds = mysqli_fetch_all($result,MYSQLI_ASSOC);

    $productIds = array_column($CurrentProductIds,'Product_id');

    if(in_array($ProductId,$productIds)){
        foreach ($CurrentProductIds as $product) {
            if ($product['Product_id'] == $ProductId) {
                $aantal = $product['Aantal'] + 1;
                $sql2 = "UPDATE pakket_has_product SET Aantal = '$aantal' WHERE Product_id = '$ProductId'AND Pakket_id = '$pakketId'";
                mysqli_query($conn, $sql2);     
                echo'updated';  
            }
        }
    }else{
        $sql3 = "INSERT INTO pakket_has_product (Pakket_id,Product_id,Aantal,Productnaam) VALUES ('$pakketId','$ProductId',1,'$ProductNaam')";
        mysqli_query($conn, $sql3);
    }
    
}