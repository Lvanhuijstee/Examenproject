<?php
if (!isset($_SESSION)) {
    session_start();
}

include('database.php');
<<<<<<< HEAD
 
$userId = 1;



/**
 * Determines if a user can perform a given action based on their role.
 *
 * This function checks the role of a user against a predefined set of actions that each role can perform.
 * It returns `true` if the user has permission to perform the specified action, otherwise `false`.
 *
 * @param int $userId The ID of the user whose permissions are being checked.
 * @param string $action The action the user wants to perform (e.g., 'viewProducts', 'editProfile').
 * @return bool Returns `true` if the user can perform the action, `false` otherwise.
 */
function canPerformAction($userId, $action)
=======
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
>>>>>>> 5c3b5559bacfe1644d3d0f1c1e602f5ada3c3f95
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