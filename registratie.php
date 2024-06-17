<?php
include("database.php");
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
        <form action="registratiehandling.php" method="post">
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
                    <p><input placeholder="Mobiel" name="mobielnummer"></p>
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
                    <p><input placeholder="Allergie..." name="allergie"></p>
                    <p><input placeholder="Voorkeur..." name="voorkeur"></p>
                </div>
                <div class="tab">
                    <h2>Samenstelling:</h2>
                    <p><input type="number" placeholder="Volwassenen" name="volwassenen"></p>
                    <p><input type="number" placeholder="Kinderen" name="kinderen"></p>
                    <p><input type="number" placeholder="Baby's" name="babys"></p>
                </div>
                <div style="overflow:auto;">
                    <div class="button-container">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Terug</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Volgende</button>
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
            <br>
            <button type="submit" id="submittemp">Submit</button>

        </form>
        <?php
        mysqli_close($conn);
        ?>
    </div>
    <script src="registratie.js"></script>
</body>

</html>