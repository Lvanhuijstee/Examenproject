<?php
session_start();

include("database.php");

if(isset($_POST)){
    if(isset($_SESSION['cart'])){

        $sessionArray_id = array_column($_SESSION['cart'],"id");
        if(!in_array($_GET['id'],$sessionArray_id)){
            $sessionArray = array(
                'id' => $_GET['id'],
                "name" => $_POST['name'],
                "ean" => $_POST['ean']
            );
            $_SESSION['cart'][] = $sessionArray;
        }

    }else{
        $sessionArray = array(
            'id' => $_GET['id'],
            "name" => $_POST['name'],
            "ean" => $_POST['ean']
        );
        $_SESSION['cart'][] = $sessionArray;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="producten.css">
</head>
<body>
    <?php 
    $sql ="SELECT * FROM producten";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
      ?>
    <div>
    <form action="producten.php?id=<?= $row['id'] ?>" method="post">
    <p><?= $row['name'] ?></p>
    <p><?= $row['ean'] ?></p>
    <input type="hidden" name="name" value="<?= $row['name']?>">
    <input type="hidden" name="ean" value="<?= $row['ean']?>">
    <input type="submit" value="Add to cart" name="add_to_cart">
    </form>
    </div>
    <?php }?>

    <div class="cart">
    <?php 
    $output = "";
    
    $output .= " 
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>EAN</th>
            <th>Action</th>
        </tr>
    ";

    if(!empty($_SESSION['cart'])){

        foreach($_SESSION['cart'] as $key => $value){
            $output .="
            <tr>
                <td>".$value['id']."</td>
                <td>".$value['name']."</td>
                <td>".$value['ean']."</td>
                <td>
                <a href='producten.php?action=remove&id=".$value['id']."'>
                    <button>Remove</button>
                </a>
                </td>
           ";
        }
        echo $output;
    }
     ?>
    </div>
</body>
</html>

<?php  
if(isset($_GET['action'])){
    if($_GET['action'] == "remove"){
       
    }
}

mysqli_close($conn);
?>