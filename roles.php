<?php
include("database.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $gebruiker = $_POST['username'];
    $email = $_POST['email'];
    $wachtwoord = $_POST['password'];

    $rol = $_POST['rollen'];

    $sql = "INSERT INTO gebruiker (Voornaam, Email, Wachtwoord) VALUES ('$gebruiker', '$email', '$wachtwoord')";
    mysqli_query($conn, $sql);

    $lastInsertedId = mysqli_insert_id($conn);

    $sqlr = "INSERT INTO rollen_gebruiker (Rollen_id, Gebruiker_id) VALUES ('$rol', '$lastInsertedId') ";
    mysqli_query($conn, $sqlr);
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 300px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Gebruiker Registratie</h2>
        <form action="roles.php" method="post">
            <div class="form-group">
                <label for="username">Gebruikersnaam:</label>
                <input name="username" type="text" id="username" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input name="email" type="text" id="email" placeholder="Email">
                <input name="password" type="hidden" id="password" value="rB0yRKq3p7m0ovY">
            </div>
            <div class="form-group">
                <?php
                $sqlr = "SELECT * FROM rollen";
                $resultr = mysqli_query($conn, $sqlr);
                ?>
                <label for="rol">Rollen:</label>
                <label for="">Rollen</label><br>
                <select name="rollen">
<<<<<<< Updated upstream
                <?php while($row = mysqli_fetch_assoc($resultr)){
                    if($row['id'] != 4) {?>
                    <option value="<?= $row['id']; ?>"><?= $row['Rolnaam']; ?></option>
                <?php }}?>
=======
                <?php while($row = mysqli_fetch_assoc($resultr)){?>
                    <option value="<?= $row['id'];?>"><?= $row['Rolnaam'];?></option>
                <?php }?>
>>>>>>> Stashed changes
                </select>
                <br>
            </div>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>

