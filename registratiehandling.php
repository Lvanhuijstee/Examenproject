<?php
session_start();
include('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Gebruiker
    $voornaam = filter_input(INPUT_POST, "voornaam", FILTER_SANITIZE_SPECIAL_CHARS);
    $tussenvoegsel = isset($_POST['tussenvoegsel']) ? filter_input(INPUT_POST, "tussenvoegsel", FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $achternaam = filter_input(INPUT_POST, "achternaam", FILTER_SANITIZE_SPECIAL_CHARS);
    $geboortedatum = filter_input(INPUT_POST, "geboortedatum", FILTER_SANITIZE_SPECIAL_CHARS);
    $mobielnummer = filter_input(INPUT_POST, "mobielnummer", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $wachtwoord = filter_input(INPUT_POST, "wachtwoord", FILTER_SANITIZE_SPECIAL_CHARS);

    //Adres
    $straatnaam = filter_input(INPUT_POST, "straatnaam", FILTER_SANITIZE_SPECIAL_CHARS);
    $huisnummer = filter_input(INPUT_POST, "huisnummer", FILTER_SANITIZE_SPECIAL_CHARS);
    $postcode = filter_input(INPUT_POST, "postcode", FILTER_SANITIZE_SPECIAL_CHARS);
    $land = filter_input(INPUT_POST, "land", FILTER_SANITIZE_SPECIAL_CHARS);

    //Inkomsten
    $loon = filter_input(INPUT_POST, "loon", FILTER_SANITIZE_SPECIAL_CHARS);
    $uitkering = filter_input(INPUT_POST, "uitkering", FILTER_SANITIZE_SPECIAL_CHARS);
    $kindgebonden = filter_input(INPUT_POST, "kindgebonden", FILTER_SANITIZE_SPECIAL_CHARS);

    //Uitgaven
    $terugkerend = filter_input(INPUT_POST, "vastelasten", FILTER_SANITIZE_SPECIAL_CHARS);
    $boodschappen = filter_input(INPUT_POST, "boodschappen", FILTER_SANITIZE_SPECIAL_CHARS);
    $specialiteiten = filter_input(INPUT_POST, "specialiteiten", FILTER_SANITIZE_SPECIAL_CHARS);

    //Wensen en Allergie
    $allergieNaam = $_POST['allergie'];
    $voorkeurNaam = $_POST['voorkeur'];
    

    //Samenstelling
    $volwassenen = filter_input(INPUT_POST, "volwassenen", FILTER_SANITIZE_SPECIAL_CHARS);
    $kinderen = filter_input(INPUT_POST, "kinderen", FILTER_SANITIZE_SPECIAL_CHARS);
    $babys = filter_input(INPUT_POST, "babys", FILTER_SANITIZE_SPECIAL_CHARS);




    try {
        $sqlGebruiker = "INSERT INTO gebruiker (Voornaam, Tussenvoegsel, Achternaam, Geboortedatum, Mobielnummer, Email, Wachtwoord) VALUES ('$voornaam','$tussenvoegsel','$achternaam', '$geboortedatum', '$mobielnummer', '$email', '$wachtwoord')";
        mysqli_query($conn, $sqlGebruiker);
        $LiGebruikerID = mysqli_insert_id($conn);

        $sqlRol = "INSERT INTO rollen_gebruiker (Rollen_id, Gebruiker_id, Rolnaam) VALUES ('5', '$LiGebruikerID', 'Klant')";
        mysqli_query($conn, $sqlRol);

        $sqlAdres = "INSERT INTO Adres (Postcode, Huisnummer, Straatnaam, Land, Gebruiker_id) VALUES ('$postcode','$huisnummer','$straatnaam','$land','$LiGebruikerID')";
        mysqli_query($conn, $sqlAdres);

        //Geeft de gebruiker id aan de tussentabel KlantReg
        $sqlKlantReg = "INSERT INTO KlantReg (Gebruiker_id) VALUES ('$LiGebruikerID')";
        mysqli_query($conn, $sqlKlantReg);
        $LiKlantRegID = mysqli_insert_id($conn);

        $sqlGetAllergie = "SELECT Allergienaam FROM allergie WHERE id = '$allergieNaam'";
        $resultGetAllergie = mysqli_query($conn, $sqlGetAllergie);
        $rowAllergie = mysqli_fetch_assoc($resultGetAllergie);
        $rowResultAllergie = $rowAllergie['Allergienaam'];

        $sqlAllergie = "INSERT INTO allergie (Allergienaam) VALUES ('$rowResultAllergie')";
        mysqli_query($conn, $sqlAllergie);
        $LiAllergieID = mysqli_insert_id($conn);

        $sqlGetVoorkeur = "SELECT Voorkeurnaam FROM voorkeur WHERE id = '$voorkeurNaam'";
        $resultGetVoorkeur = mysqli_query($conn, $sqlGetVoorkeur);
        $rowVoorkeur = mysqli_fetch_assoc($resultGetVoorkeur);
        $rowResultVoorkeur = $rowVoorkeur['Voorkeurnaam'];

        $sqlVoorkeur = "INSERT INTO voorkeur (Voorkeurnaam) VALUES ('$rowResultVoorkeur')";
        mysqli_query($conn, $sqlVoorkeur);
        $LiVoorkeurID = mysqli_insert_id($conn);

        $sqlWensen = "INSERT INTO KlantReg_Wensen (KlantReg_id, Allergie_id, Voorkeur_id) VALUES ('$LiKlantRegID','$LiAllergieID','$LiVoorkeurID')";
        mysqli_query($conn, $sqlWensen);

        $sqlInkomsten = "INSERT INTO Inkomsten (Loon, Uitkering, Kindgebonden, KlantReg_id) VALUES ('$loon','$uitkering','$kindgebonden','$LiKlantRegID')";
        mysqli_query($conn, $sqlInkomsten);

        $sqlUitgaven = "INSERT INTO Uitgaven (Terugkerend, Boodschappen, Specialiteiten, KlantReg_id) VALUES ('$terugkerend','$boodschappen','$specialiteiten','$LiKlantRegID')";
        mysqli_query($conn, $sqlUitgaven);

        $sqlSamenstelling = "INSERT INTO Samenstelling (Volwassenen, Kinderen, Babys, KlantReg_id) VALUES ('$volwassenen','$kinderen','$babys','$LiKlantRegID')";
        mysqli_query($conn, $sqlSamenstelling);
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            echo "Error: Dit email adres is al in gebruik!";
        } else {
            echo "An error occurred: " . $e->getMessage();
        }
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <script type="text/javascript">
                var delay = 1000;
                var url = "http://localhost/Examenproject/index.php";
                setTimeout(function() {
                    window.location.href = url;
                }, delay);
            </script>
        </head>

        <body>
        </body>

        </html>
<?php
    }
}

mysqli_close($conn);
