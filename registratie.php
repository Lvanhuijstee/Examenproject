<?php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $voornaam = isset($_POST['Voornaam']) ? $_POST['Voornaam'] : '';
    $tussenvoegsel = isset($_POST['Tussenvoegsel']) ? $_POST['Tussenvoegsel'] : '';
    $achternaam = isset($_POST['Achternaam']) ? $_POST['Achternaam'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $wachtwoord = isset($_POST['password']) ? $_POST['password'] : '';
    $allergieID = isset($_POST['Allergie']) ? $_POST['Allergie'] : '';
    $voorkeurID = isset($_POST['Voorkeur']) ? $_POST['Voorkeur'] : '';

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
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registratie.css">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700&display=swap" rel="stylesheet">
    <title>Registration Page</title>
</head>

<body>
    <div class="form-container">
        <form action="registratie.php" method="post">
            <h1 id="Gelukt"></h1>
            <div class="form-group">
                <div class="tab">
                    <h2>Naam:</h2>
                    <p><input type="namespace" placeholder="Voornaam" name="voornaam"></p>
                    <p><input placeholder="Tussenvoegsel" name="tussenvoegsel"></p>
                    <p><input placeholder="Achternaam" name="achternaam"></p>
                    <p><input type="date" placeholder="Geboortedatum" name="geboortedatum"></p>
                    <p><input type="email" placeholder="Email" name="email"></p>
                    <p><input type="password" placeholder="Wachtwoord" name="wachtwoord"></p>
                </div>
                <div class="tab">
                    <h2>Contact:</h2>
                    <p><input placeholder="Straatnaam" name="straatnaam"></p>
                    <p><input placeholder="Huisnummer" name="huisnummer"></p>
                    <p><input placeholder="Postcode" name="postcode"></p>
                    <p><input placeholder="Land" name="land"></p>
                    <p><input type="number" placeholder="Mobiel" name="mobielnummer"></p>
                </div>
                <div class="tab">
                    <h2>Inkomsten</h2>
                    <p><input placeholder="Loon" name="loon"></p>
                    <p><input placeholder="Uitkering" name="uitkering"></p>
                    <p><input placeholder="Kindgebonden" name="kindgebonden"></p>

                    <h2>Uitgaven</h2>
                    <p><input placeholder="Vaste Lasten" name="vastelasten"></p>
                    <p><input placeholder="Boodschappen" name="boodschappen"></p>
                    <p><input placeholder="Specialiteiten" name="specialiteiten"></p>
                </div>
                <div class="tab">
                    <h2>Voorkeuren en Wensen:</h2>
                    <p><input placeholder="Test" name="test"></p>
                </div>
                <div class="tab">
                    <h2>Samenstelling:</h2>
                    <p><input placeholder="Volwassenen" name="Volwassenen"></p>
                    <p><input placeholder="Kinderen" name="Kinderen"></p>
                    <p><input placeholder="Baby's" name="Babys"></p>
                </div>
                <div style="overflow:auto;">
                    <div class="button-container">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
                <div style="text-align:center;margin-top:40px;" id="stepDiv">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
            </div>

            <!-- <h2>Inkomsten</h2>
                <label for="Loon">Loon:</label>
                <input type="number" id="Loon" name="Loon" required>
                <label for="Uitkering">Uitkering:</label>
                <input type="number" id="Uitkering" name="Uitkering" required>
                <label for="KinderBudget">Kinder Budget:</label>
                <input type="number" id="KinderBudget" name="KinderBudget" required>
            
                <?php
                // $sqlr = "SELECT * FROM Voorkeur";
                // $resultr = mysqli_query($conn, $sqlr);
                ?>

                <label for="Voorkeur">Voorkeur:</label>
                <select name="Voorkeur">
                    <?php //while($row = mysqli_fetch_assoc($resultr)){
                    ?>
                        <option value="<? //= $row['id']; 
                                        ?>"><? //= $row['Voorkeurnaam']; 
                                            ?></option>
                <?php //}
                ?>
                </select>
                <br>

                <?php
                // $sqlr = "SELECT * FROM Allergie";
                // $resultr = mysqli_query($conn, $sqlr);
                ?>

                <label for="Allergie">Allergie:</label>
                <select name="Allergie">
                    <?php //while($row = mysqli_fetch_assoc($resultr)){
                    ?>
                        <option value="<? //= $row['id']; 
                                        ?>"><? //= $row['Allergienaam']; 
                                            ?></option>
                <?php //}
                ?>
                </select>
                <br>
                
                <button type="submit" class="btn">Submit</button> -->

        </form>
        <?php
        mysqli_close($conn);
        ?>
    </div>

    <script src="registratie.js"></script>
</body>

</html>