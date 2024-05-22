<?php 
include('database.php');

$sql = "SELECT * FROM product";
$result = mysqli_query($conn,$sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
        <form action="productenToevoegen.php" method="post" class="levering">
            <h2>producten geleverd</h2>
            <?php $i = 0;
            while($row = mysqli_fetch_assoc($result)){ ?>
            <p><?=$row['Naam']?></p>
            <input type="number" name="Amount">
            <input type="hidden" name="id" value="<?=$row['id']?>">
            <input type="hidden" name="Naam<?=$i?>" value="<?=$row['Naam']?>">
            <?php $i++;}?>
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
            <br/>
            <br/>
            <button type="submit">Submit</button>
        </form>
</body>

</html>