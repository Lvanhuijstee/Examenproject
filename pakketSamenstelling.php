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
      <div class="pagename">
        <h2>Pakketsamenstelling</h2>
      </div>
      <div class="flexContainer">
      <?php 
    $sql ="SELECT * FROM product";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
      $productId =$row['id'];

      $sql2 = "SELECT * FROM categorieen_has_product WHERE Product_id =$productId";
      $result2 = mysqli_query($conn,$sql2);

      $row2 = mysqli_fetch_assoc($result2);
      ?>
          <div class="productHolder">
            <div class="product">
                <img src="img/c1f9c31632323e540af201ef02c5c214.png" alt="">
                  <p><?=$row['Naam']?></p>
                  <button class="addToCart" data-product-id='<?=$row['id']?>'>Add to cart</button>
            </div>
          </div>
          <?php }?>
          <div id="cart" class="cart">
          <?php $sql ="SELECT * FROM pakket_has_product WHERE Pakket_id = '$pakketId'";
          $result = mysqli_query($conn,$sql);
          while($row = mysqli_fetch_assoc($result)){?>
          <p class="updateCartName"><?=$row['Productnaam']?></p>
          <p class="updateCartAmount"> <?=$row['Aantal']?></p>
          <br> <br>
          <?php }?>
          </div>
      </div>
      <footer class="footer">
        <div class="footer-item">Copyright © 2023 ROCvF</div>
    </footer>
    <script src="producten.js"></script>
</body> 
</html>