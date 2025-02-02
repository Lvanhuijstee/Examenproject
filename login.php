<?php
if (!isset($_SESSION)) {
    session_start();
}
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, "Email", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "Wachtwoord", FILTER_SANITIZE_SPECIAL_CHARS);

    $sqlKlant = "SELECT * FROM klant WHERE Email ='$email'";
    $sqlMedewerker = "SELECT * FROM Medewerker WHERE Email = '$email'";

    $resultKlant = mysqli_query($conn, $sqlKlant);
    $resultMedewerker = mysqli_query($conn, $sqlMedewerker);

    if (mysqli_num_rows($resultKlant) === 1) {
        $row = mysqli_fetch_assoc($resultKlant);
        if ($password  = $row['Wachtwoord']) {
            echo "you logged in";
            $_SESSION['user'] = $row['Email'];
            header("location: home.php");
        } else {
            echo 'Email or Password incorrect';
        }
    } else {
        echo 'Nothing found';
    }

    if (mysqli_num_rows($resultMedewerker) === 1) {
        $row = mysqli_fetch_assoc($resultMedewerker);
        if ($password  = $row['Wachtwoord']) {
            echo "you logged in";
            $_SESSION['user'] = $row['Email'];
            header("location: home.php");
        } else {
            echo 'Email or Password incorrect';
        }
    } else {
        echo 'Nothing found';
    }
}

mysqli_close($conn);
