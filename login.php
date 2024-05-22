<?php
if (!isset($_SESSION)) {
    session_start();
}
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, "Email", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "Wachtwoord", FILTER_SANITIZE_SPECIAL_CHARS);

    $sql = "SELECT * FROM gebruiker WHERE Email ='$email'";


    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
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
