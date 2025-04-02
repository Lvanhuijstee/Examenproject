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
    <link rel="stylesheet" media="screen" href="css/levering.css"/>
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

  <div class="flex-container">
    <div class="flex-item">
      <h2>Nieuw product</h2>
      <form action="productenToevoegen.php" method="post">
        <label for="">Product naam:</label>
        <input type="text" name="newProduct">
        <label for="">Hoeveelheid:</label>
        <input type="number" name="Amount"><br>
        <button type="submit">Submit</button>
      </form>
    </div>

    <div class="flex-item">
      <h2>bestaande producten</h2>
      <form action="productenToevoegen.php" method="post">
        <label for="">Product naam:</label>
        <select id="fruit" name="Naam">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <option value="<?= $row['Naam'] ?>"><?= $row['Naam']?></option>
            <?php }?>
        </select>
        <label for="">Hoeveelheid:</label>
        <input type="number" name="Amount"><br>
        <button type="submit">Submit</button>
      </form>
    </div>

  </div>
    <footer class="footer">
        <div class="footer-item">Copyright © 2025 ROCvF</div>
  </footer>
</body>
</html>