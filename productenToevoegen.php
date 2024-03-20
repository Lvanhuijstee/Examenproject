<?php
include("database.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $productname = $_POST["productname"];
    $category = $_POST["category"];

    $sql ="SELECT * FROM producten WHERE name='$productname'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        $addProduct = $row['ean'] + 1;
        $sql ="UPDATE producten SET ean = '$addProduct' WHERE name ='$productname'";
        mysqli_query($conn, $sql);
        header("location: producten.php");
    }else{
        $sql = "INSERT INTO producten(name,ean,category)
        VALUES('$productname','1','$category')";
        mysqli_query($conn, $sql);
        header("location: producten.php");
    }
}
mysqli_close($conn);
?>
