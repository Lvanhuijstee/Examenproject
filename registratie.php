<?php
include("database.php");
?>
<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     //Gebruiker
//     $voornaam = isset($_POST['voornaam']) ? $_POST['voornaam'] : '';
//     $tussenvoegsel = isset($_POST['tussenvoegsel']) ? $_POST['tussenvoegsel'] : '';
//     $achternaam = isset($_POST['achternaam']) ? $_POST['achternaam'] : '';
//     $geboortedatum = isset($_POST['geboortedatum']) ? $_POST['geboortedatum'] : '';
//     $mobielnummer = isset($_POST['mobielnummer']) ? $_POST['mobielnummer'] : '';
//     $email = isset($_POST['email']) ? $_POST['email'] : '';
//     $wachtwoord = isset($_POST['wachtwoord']) ? $_POST['wachtwoord'] : '';

//     //Adres
//     $straatnaam = isset($_POST['straatnaam']) ? $_POST['straatnaam'] : '';
//     $huisnummer = isset($_POST['huisnummer']) ? $_POST['huisnummer'] : '';
//     $postcode = isset($_POST['postcode']) ? $_POST['postcode'] : '';
//     $land = isset($_POST['land']) ? $_POST['land'] : '';

//     //Inkomsten
//     $loon = isset($_POST['loon']) ? $_POST['loon'] : '';
//     $uitkering = isset($_POST['uitkering']) ? $_POST['uitkering'] : '';
//     $kindgebonden = isset($_POST['kindgebonden']) ? $_POST['kindgebonden'] : '';

//     //Uitgaven
//     $terugkerend = isset($_POST['vastelasten']) ? $_POST['vastelasten'] : '';
//     $boodschappen = isset($_POST['boodschappen']) ? $_POST['boodschappen'] : '';
//     $specialiteiten = isset($_POST['specialiteiten']) ? $_POST['specialiteiten'] : '';

//     //Wensen en Allergie - TODO
//     //$allergieID = isset($_POST['Allergie']) ? $_POST['Allergie'] : '';
//     //$voorkeurID = isset($_POST['Voorkeur']) ? $_POST['Voorkeur'] : '';

//     //Samenstelling
//     $volwassenen = isset($_POST['volwassenen']) ? $_POST['volwassenen'] : '';
//     $kinderen = isset($_POST['kinderen']) ? $_POST['kinderen'] : '';
//     $babys = isset($_POST['babys']) ? $_POST['babys'] : '';



//     $sqlGebruiker = "INSERT INTO gebruiker (Voornaam, Tussenvoegsel, Achternaam, Geboortedatum, Mobielnummer, Email, Wachtwoord) VALUES ('$voornaam','$tussenvoegsel','$achternaam', '$geboortedatum', '$mobielnummer', '$email', '$wachtwoord')";
//     mysqli_query($conn, $sqlGebruiker);
//     $LiGebruikerID = mysqli_insert_id($conn);

//     //Geeft bij registratie de klant rol
//     $sqlRol = "INSERT INTO rollen_gebruiker (Rollen_id, Gebruiker_id) VALUES ('5', '$LiGebruikerID')";
//     mysqli_query($conn, $sqlRol);

//     $sqlAdres = "INSERT INTO Adres (Postcode, Huisnummer, Straatnaam, Land, Gebruiker_id) VALUES ('$postcode','$huisnummer','$straatnaam','$land','$LiGebruikerID')";
//     mysqli_query($conn, $sqlAdres);

//     //Geeft de gebruiker id aan de tussentabel KlantReg
//     $sqlKlantReg = "INSERT INTO KlantReg (Gebruiker_id) VALUES ('$LiGebruikerID')";
//     mysqli_query($conn, $sqlKlantReg);
//     $LiKlantRegID = mysqli_insert_id($conn);

//     //$sqlWensen = "INSERT INTO KlantReg_Wensen (KlantReg_id, Allergie_id, Voorkeur_id) VALUES ('$LiKlantRegID','$allergieID','$voorkeurID')";
//     //mysqli_query($conn, $sqlWensen);

//     $sqlInkomsten = "INSERT INTO Inkomsten (Loon, Uitkering, Kindgebonden, KlantReg_id) VALUES ('$loon','$uitkering','$kindgebonden','$LiKlantRegID')";
//     mysqli_query($conn, $sqlInkomsten);

//     $sqlUitgaven = "INSERT INTO Uitgaven (Terugkerend, Boodschappen, Specialiteiten, KlantReg_id) VALUES ('$terugkerend','$boodschappen','$specialiteiten','$LiKlantRegID')";
//     mysqli_query($conn, $sqlUitgaven);

//     $sqlSamenstelling = "INSERT INTO Samenstelling (Volwassenen, Kinderen, Babys, KlantReg_id) VALUES ('$volwassenen','$kinderen','$babys','$LiKlantRegID')";
//     mysqli_query($conn, $sqlSamenstelling);
// }
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
                    <p><input type="number" placeholder="Mobiel" name="mobielnummer"></p>
                </div>
                <div class="tab">
                    <h2>Inkomsten</h2>
                    <p><input type="number" placeholder="Loon" name="loon"></p>
                    <p><input type="number" placeholder="Uitkering" name="uitkering"></p>
                    <p><input type="number" placeholder="Kindgebonden" name="kindgebonden"></p>

                    <h2>Uitgaven</h2>
                    <p><input type="number" placeholder="Vaste Lasten" name="vastelasten"></p>
                    <p><input type="number" placeholder="Boodschappen" name="boodschappen"></p>
                    <p><input type="number" placeholder="Specialiteiten" name="specialiteiten"></p>
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