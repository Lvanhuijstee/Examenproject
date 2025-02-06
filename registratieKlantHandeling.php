<?php
session_start();
include('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $formData = $_POST;

    $valueArray = array();
    
    postLoop($formData, $valueArray);

    echo $valueArray['naam'];
                                                                              
    $SQL_INSERT_KLANT = "INSERT INTO klant (Voornaam, Tussenvoegsel, Achternaam, Geboortedatum, Mobielnummer, Email, Wachtwoord, Volwassenen, Kinderen, Babys) VALUES ('{$valueArray['naam']}', '{$valueArray['tussenvoegsel']}', '{$valueArray['achternaam']}', '{$valueArray['geboortedatum']}', '{$valueArray['mobielnummer']}', '{$valueArray['email']}', '{$valueArray['wachtwoord']}', '{$valueArray['volwassenen']}', '{$valueArray['kinderen']}', '{$valueArray['babys']}')";
    mysqli_query($conn,  $SQL_INSERT_KLANT);
    $klantId = mysqli_insert_id($conn);
    
    $SQL_INSERT_ADRES = "INSERT INTO adres (Postcode,Huisnummer,Straatnaamm,Land,klant_id) VALUES ('{$valueArray['postcode']}','{$valueArray['huisnummer']}','{$valueArray['straatnaam']}','{$valueArray['land']}','$klantId')";
    mysqli_query($conn,  $SQL_INSERT_ADRES);

}

function postLoop($data,&$valueArray) {
    foreach ($data as $key => $value) {
        if (is_array($value)){
            postLoop($value,$valueArray);
        } else {
            $filteredValue = filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
            $valueArray[$key] = $filteredValue;
            echo  $key,"=", $valueArray[$key],'<br>';
        }
    }
}