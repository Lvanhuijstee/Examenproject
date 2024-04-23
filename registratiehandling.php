<?php
session_start();
include('database.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Gebruiker
    $voornaam = isset($_POST['voornaam']) ? $_POST['voornaam'] : '';
    $tussenvoegsel = isset($_POST['tussenvoegsel']) ? $_POST['tussenvoegsel'] : '';
    $achternaam = isset($_POST['achternaam']) ? $_POST['achternaam'] : '';
    $geboortedatum = isset($_POST['geboortedatum']) ? $_POST['geboortedatum'] : '';
    $mobielnummer = isset($_POST['mobielnummer']) ? $_POST['mobielnummer'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $wachtwoord = isset($_POST['wachtwoord']) ? $_POST['wachtwoord'] : '';

    //Adres
    $straatnaam = isset($_POST['straatnaam']) ? $_POST['straatnaam'] : '';
    $huisnummer = isset($_POST['huisnummer']) ? $_POST['huisnummer'] : '';
    $postcode = isset($_POST['postcode']) ? $_POST['postcode'] : '';
    $land = isset($_POST['land']) ? $_POST['land'] : '';

    //Inkomsten
    $loon = isset($_POST['loon']) ? $_POST['loon'] : '';
    $uitkering = isset($_POST['uitkering']) ? $_POST['uitkering'] : '';
    $kindgebonden = isset($_POST['kindgebonden']) ? $_POST['kindgebonden'] : '';

    //Uitgaven
    $terugkerend = isset($_POST['vastelasten']) ? $_POST['vastelasten'] : '';
    $boodschappen = isset($_POST['boodschappen']) ? $_POST['boodschappen'] : '';
    $specialiteiten = isset($_POST['specialiteiten']) ? $_POST['specialiteiten'] : '';

    //Wensen en Allergie - TODO
    //$allergieID = isset($_POST['Allergie']) ? $_POST['Allergie'] : '';
    //$voorkeurID = isset($_POST['Voorkeur']) ? $_POST['Voorkeur'] : '';

    //Samenstelling
    $volwassenen = isset($_POST['volwassenen']) ? $_POST['volwassenen'] : '';
    $kinderen = isset($_POST['kinderen']) ? $_POST['kinderen'] : '';
    $babys = isset($_POST['babys']) ? $_POST['babys'] : '';



    $sqlGebruiker = "INSERT INTO gebruiker (Voornaam, Tussenvoegsel, Achternaam, Geboortedatum, Mobielnummer, Email, Wachtwoord) VALUES ('$voornaam','$tussenvoegsel','$achternaam', '$geboortedatum', '$mobielnummer', '$email', '$wachtwoord')";
    mysqli_query($conn, $sqlGebruiker);
    $LiGebruikerID = mysqli_insert_id($conn);

    //Geeft bij registratie de klant rol
    $sqlRol = "INSERT INTO rollen_gebruiker (Rollen_id, Gebruiker_id) VALUES ('5', '$LiGebruikerID')";
    mysqli_query($conn, $sqlRol);

    $sqlAdres = "INSERT INTO Adres (Postcode, Huisnummer, Straatnaam, Land, Gebruiker_id) VALUES ('$postcode','$huisnummer','$straatnaam','$land','$LiGebruikerID')";
    mysqli_query($conn, $sqlAdres);

    //Geeft de gebruiker id aan de tussentabel KlantReg
    $sqlKlantReg = "INSERT INTO KlantReg (Gebruiker_id) VALUES ('$LiGebruikerID')";
    mysqli_query($conn, $sqlKlantReg);
    $LiKlantRegID = mysqli_insert_id($conn);

    //$sqlWensen = "INSERT INTO KlantReg_Wensen (KlantReg_id, Allergie_id, Voorkeur_id) VALUES ('$LiKlantRegID','$allergieID','$voorkeurID')";
    //mysqli_query($conn, $sqlWensen);

    $sqlInkomsten = "INSERT INTO Inkomsten (Loon, Uitkering, Kindgebonden, KlantReg_id) VALUES ('$loon','$uitkering','$kindgebonden','$LiKlantRegID')";
    mysqli_query($conn, $sqlInkomsten);

    $sqlUitgaven = "INSERT INTO Uitgaven (Terugkerend, Boodschappen, Specialiteiten, KlantReg_id) VALUES ('$terugkerend','$boodschappen','$specialiteiten','$LiKlantRegID')";
    mysqli_query($conn, $sqlUitgaven);

    $sqlSamenstelling = "INSERT INTO Samenstelling (Volwassenen, Kinderen, Babys, KlantReg_id) VALUES ('$volwassenen','$kinderen','$babys','$LiKlantRegID')";
    mysqli_query($conn, $sqlSamenstelling);
}

mysqli_close($conn);

