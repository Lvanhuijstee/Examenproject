<?php
if (!isset($_SESSION)) {
    session_start();
}

include('database.php');
if (isset($_SESSION['user'])) {
    echo "Welcome, " . $_SESSION['user'];
}

$email = $_SESSION['user'];
$sql = "SELECT id FROM gebruiker WHERE Email = '$email'";
mysqli_query($conn, $sql);


$adminPermissions = array("editUser", "addUser", "viewUser", "deleteUser", "editProduct", "addProduct", "viewProduct", "deleteProduct", "addPakket", "deletePakket");
$medewerkerPermissions = array("view");
$vrijwilligerPermissions = array("view");
$klantPermissions = array("view");
$leverancierPermissions = array("view");

enum Role: string
{
    case ADMIN = "admin";
    case MEDEWERKER = "user";
    case VRIJWILLIGER = "vrijwilliger";
    case KLANT = "klant";
    case LEVERANCIER = "leverancier";

    public function allowed($action)
    {
        global $adminPermissions, $medewerkerPermissions, $vrijwilligerPermissions, $klantPermissions, $leverancierPermissions;

        return match ($this) {
            Role::ADMIN => in_array($action, $adminPermissions),
            Role::MEDEWERKER => in_array($action, $medewerkerPermissions),
            Role::VRIJWILLIGER => in_array($action, $vrijwilligerPermissions),
            Role::KLANT => in_array($action, $klantPermissions),
            Role::LEVERANCIER => in_array($action, $leverancierPermissions),
        };
    }
}

?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    // $role = Role::from("leverancier");

    // if ($role->allowed("edit")) {
    //     echo '<div class="Granted" style="background-color: Green; width:100px; height:100px;">Access Granted</div>';
    // } else {
    //     echo '<div class="Denied" style="background-color: Red; width:100px; height:100px;">Access Denied</div>';
    // }
    ?>

</body>

</html> -->