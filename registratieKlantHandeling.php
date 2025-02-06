<?php
session_start();
include('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $formData = $_POST;

    $valueArray = array();
    
    postLoop($formData, $valueArray);

    // echo $valueArray['naam'];
                                                                              
    $SQL_INSERT_KLANT = "INSERT INTO klant (Voornaam, Tussenvoegsel, Achternaam, Geboortedatum, Mobielnummer, Email, Wachtwoord, Volwassenen, Kinderen, Babys) VALUES ('{$valueArray['naam']}', '{$valueArray['tussenvoegsel']}', '{$valueArray['achternaam']}', '{$valueArray['geboortedatum']}', '{$valueArray['mobielnummer']}', '{$valueArray['email']}', '{$valueArray['wachtwoord']}', '{$valueArray['volwassenen']}', '{$valueArray['kinderen']}', '{$valueArray['babys']}')";
    mysqli_query($conn,$SQL_INSERT_KLANT);
    $klantId = mysqli_insert_id($conn);
    
    $SQL_INSERT_ADRES = "INSERT INTO adres (Postcode,Huisnummer,Straatnaam,Land,klant_id) VALUES ('{$valueArray['postcode']}','{$valueArray['huisnummer']}','{$valueArray['straatnaam']}','{$valueArray['land']}','$klantId')";
    mysqli_query($conn,  $SQL_INSERT_ADRES);

    // echo $SQL_INSERT_ADRES;


    if (isset($_POST['allergien_wensen']) && !empty($_POST['allergien_wensen'])) {
        $allergieArray = array();

        foreach ($_POST['allergien_wensen'] as $allergie) {
            $SQL_GET_ALLERGIENWENSEN = "SELECT * FROM allergien_wensen WHERE Naam = '$allergie'";
            $result = mysqli_query($conn,$SQL_GET_ALLERGIENWENSEN);
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];

            $SQL_INSERT_GEBRUIKER_HAS_ALLERGIEN_WENSEN = "INSERT INTO gebruiker_has_allergien_wensen (gebruiker_id,allergien_wensen_id) VALUES ('$klantId','$id')";
            // echo  $SQL_INSERT_GEBRUIKER_HAS_ALLERGIEN_WENSEN;
            mysqli_query($conn,  $SQL_INSERT_GEBRUIKER_HAS_ALLERGIEN_WENSEN);
        }
       
    } 

    header("Location:registratie.php");
}

function postLoop($data,&$valueArray) {
    foreach ($data as $key => $value) {
        if (is_array($value)){
            postLoop($value,$valueArray);
        } else {
            $filteredValue = filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
            $valueArray[$key] = $filteredValue;
            // echo  $key,"=", $valueArray[$key],'<br>';
        }
    }
}