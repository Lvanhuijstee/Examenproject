<?php 
<<<<<<< Updated upstream
include("database.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $voornaam = $_POST['Voornaam'];
    $tussenvoegsel = $_POST['Tussenvoegsel'];
    $achternaam = $_POST['Achternaam'];

    $email = $_POST['email'];
    $wachtwoord = $_POST['password'];

    $allergieID = $_POST['Allergie'];
    $voorkeurID = $_POST['Voorkeur'];

    $sql = "INSERT INTO gebruiker (Voornaam, Tussenvoegsel, Achternaam, Email, Wachtwoord) VALUES ('$voornaam','$tussenvoegsel','$achternaam', '$email', '$wachtwoord')";
    mysqli_query($conn, $sql);

    $LiGebruikerID = mysqli_insert_id($conn);

    $sqlr = "INSERT INTO rollen_gebruiker (Rollen_id, Gebruiker_id) VALUES ('5', '$LiGebruikerID') ";
    mysqli_query($conn, $sqlr);

    $sqlk = "INSERT INTO KlantReg (Gebruiker_id) VALUES ('$LiGebruikerID')";
    mysqli_query($conn, $sqlk);
    
    $LiKlantRegID = mysqli_insert_id($conn);

    $sqlw = "INSERT INTO KlantReg_Wensen (KlantReg_id, Allergie_id, Voorkeur_id) VALUES ('$LiKlantRegID','$allergieID','$voorkeurID')";
    mysqli_query($conn, $sqlw);

   

    
}
=======


>>>>>>> Stashed changes
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        .form-container {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], select {
            width: 10%;
            padding: 10px;
            margin-bottom: 10px;
        }
        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<<<<<<< Updated upstream
    <div class="form-container">
        <form action="registratie.php" method="post">
            <h2>Gebruiker Registratie</h2>
            <div class="form-group">
                <label for="Voornaam">Voornaam:</label>
                <input name="Voornaam" type="text" id="Voornaam" placeholder="Voornaam">
                <br>
                <label for="Tussenvoegsel">Tussenvoegsel:</label>
                <input name="Tussenvoegsel" type="text" id="Tussenvoegsel" placeholder="Tussenvoegsel">
                <br>
                <label for="Achternaam">Achternaam:</label>
                <input name="Achternaam" type="text" id="Achternaam" placeholder="Achternaam">
                <br>
                <label for="email">Email:</label>
                <input name="email" type="text" id="email" placeholder="Email">
                <br>
                <label for="Wachtwoord">Wachtwoord:</label>
                <input name="password" type="password" id="Wachtwoord" placeholder="Wachtwoord">
            </div>

            <h2>Inkomsten</h2>
                <label for="Loon">Loon:</label>
                <input type="number" id="Loon" name="Loon" required>
                <label for="Uitkering">Uitkering:</label>
                <input type="number" id="Uitkering" name="Uitkering" required>
                <label for="KinderBudget">Kinder Budget:</label>
                <input type="number" id="KinderBudget" name="KinderBudget" required>
            
                <?php
                $sqlr = "SELECT * FROM Voorkeur";
                $resultr = mysqli_query($conn, $sqlr);
                ?>

                <label for="Voorkeur">Voorkeur:</label>
                <select name="Voorkeur">
                    <?php while($row = mysqli_fetch_assoc($resultr)){?>
                        <option value="<?= $row['id']; ?>"><?= $row['Voorkeurnaam']; ?></option>
                <?php }?>
                </select>
                <br>

                <?php
                $sqlr = "SELECT * FROM Allergie";
                $resultr = mysqli_query($conn, $sqlr);
                ?>

                <label for="Allergie">Allergie:</label>
                <select name="Allergie">
                    <?php while($row = mysqli_fetch_assoc($resultr)){?>
                        <option value="<?= $row['id']; ?>"><?= $row['Allergienaam']; ?></option>
                <?php }?>
                </select>
                <br>

                <button type="submit" class="btn">Submit</button>
        </form>
    </div>
            
=======
    <h1>Registration Page</h1>
    <div class="form-container">
        <form>
            <h2>Inkomsten</h2>
            <label for="name1">Loon:</label>
            <input type="text" id="name1" name="name1" required>
            <label for="email1">uitkering:</label>
            <input type="email" id="email1" name="email1" required>
            <label for="phone1">kinder budget:</label>
            <input type="text" id="phone1" name="phone1" required>
            <button type="submit">Submit</button>
        </form>
    </div>
    <div class="form-container">
        <form>
            <h2>Uitgaven</h2>
            <label for="name2">Name:</label>
            <input type="text" id="name2" name="name2" required>
            <label for="email2">Email:</label>
            <input type="email" id="email2" name="email2" required>
            <label for="phone2">Phone:</label>
            <input type="text" id="phone2" name="phone2" required>
            <button type="submit">Submit</button>
        </form>
    </div>
    <div class="form-container">
        <form>
            <h2>Gezins samenstelling</h2>
            <label for="name3">Name:</label>
            <input type="text" id="name3" name="name3" required>
            <label for="email3">Email:</label>
            <input type="email" id="email3" name="email3" required>
            <label for="phone3">Phone:</label>
            <input type="text" id="phone3" name="phone3" required>
            <button type="submit">Submit</button>
        </form>
    </div>
    <div class="form-container">
        <form>
            <h2>voorkeuren</h2>
            <label for="gender">voorkeur:</label>
            <select id="gender" name="gender">
                <option value="">Select voorkeur</option>
                <option value="eten">eten</option>
                <option value="drinken">drinken</option>
                <option value="zuivel">Fedor</option>
            </select>
            <button type="submit">Submit</button>
        </form>
    </div>
    <div class="form-container">
        <form>
            <h2>Allergien</h2>
            <label for="country">Country:</label>
            <select id="country" name="country">
                <option value="">Select Country</option>
                <option value="usa">USA</option>
                <option value="canada">Canada</option>
                <option value="uk">UK</option>
                <option value="australia">Australia</option>
            </select>
            <button type="submit">Submit</button>
        </form>
    </div>
>>>>>>> Stashed changes
</body>
</html>