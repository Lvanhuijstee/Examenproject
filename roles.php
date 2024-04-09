<?php
include("database.php");
?>

<html>
<head>

</head>
<body>
    <?php

    $sqlr = "SELECT * FROM rollen";
    $resultr = mysqli_query($conn, $sqlr);

    ?>

    <form action="roles.php" method="post">
        <label for="">Rollen</label><br>
        <?php while($row = mysqli_fetch_assoc($resultr)){?>
        <p><?= $row['Rolnaam']?></p>
        <input type="radio" value="<?= $row['id']?>" name="iets"><br>
        <?php }?>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>

<?php 

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $rol = $_POST['iets'];
    $gebruiker = 1;

    $sql = "INSERT INTO rollen_gebruiker (Rollen_id, Gebruiker_id) VALUES ('$rol', '$gebruiker')";
    mysqli_query($conn, $sql);
}

mysqli_close($conn); 
?>

