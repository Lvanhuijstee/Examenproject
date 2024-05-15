<?php
session_start();
include('database.php');

$userId = 1;

function canPerformAction($userId, $action)
{
    //global $conn;

    // Query the user's role
    // $sql = "SELECT role FROM users WHERE id = $userId";
    // $result = mysqli_query($conn, $sql);
    // $userRole = mysqli_fetch_assoc($result)['role'];

    $userRole = "leverancier";

    switch ($userRole) {
        case 'admin':
            return true;
        case 'medewerker':
            return $action == 'viewProducts' || $action == 'editProducts' || $action == 'createProducts' || $action == 'viewPakket' || $action == 'createPakket' || $action == 'editPakket' || $action == 'viewProfile' || $action == 'editProfile';
        case 'leverancier':
            return $action == 'viewProducts' || $action == 'viewProfile' || $action == 'editProfile';
        case 'vrijwilliger':
            return $action == 'viewPakket' || $action == 'createPakket' || $action == 'viewProfile' || $action == 'editProfile';
        case 'klant':
            return $action == 'viewProfile' || $action == 'editProfile';
        default:
            return false;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    if (canPerformAction($userId, 'edit')) {
        echo '<div class="Granted" style="background-color: Green; width:100px; height:100px;">Access Granted</div>';
    } else {
        echo '<div class="Denied" style="background-color: Red; width:100px; height:100px;">Access Denied</div>';
    }
    ?>

</body>

</html>