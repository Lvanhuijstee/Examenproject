<?php
include('database.php');

$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" media="screen" href="css/Header.css"/>
</head>
<body>
<div class="nav">
      <div class="Name">
        <div class="logo">
          <img src="img/mv-vm-letter-logo-vector-29030838.jpg" alt="" />
        </div>
        <p>
          Voedselbank <b/>
          Maaskantje
        </p>
      </div>
      <div class="Menu">
        <div class="dropMenu">
          <a id="pakket" href="pakketen.php">
            Pakket <br />
            samenstelling
          </a>
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

    <form action="productenToevoegen.php" method="post" class="levering">
        <h2>producten geleverd</h2>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <p><?= $row['Naam'] ?></p>
            <input type="number" name="Amount[]">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <input type="hidden" name="Naam[]" value="<?= $row['Naam'] ?>">
        <?php }?>
        <br/>
        <br/>
        <button type="submit">Submit</button>
    </form>
    <form action="productenToevoegen.php" method="post" class="levering">
        <h2>producten geleverd</h2>
        <br>
        <label for="">Productnaam</label>
        <br>
        <input type="text" name="newProduct">
        <br>
        <label for="">hoeveelheid</label>
        <br>
        <input type="number" name="Amount">
        <br />
        <br />
        <button type="submit">Submit</button>
    </form>
</body>

</html>