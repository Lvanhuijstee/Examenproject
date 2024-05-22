<?php
if (!isset($_SESSION)) {
    session_start();
}

include('database.php');


$email = $_SESSION['user'];
$sqlUser = "SELECT id FROM gebruiker WHERE Email = '$email'";
$resultUser = mysqli_query($conn, $sqlUser);
$rowUser = mysqli_fetch_assoc($resultUser);
$userID = $rowUser['id'];

$sqlRoleSelect = "SELECT * FROM rollen_gebruiker WHERE Gebruiker_id = '$userID'";
$roleResult = mysqli_query($conn, $sqlRoleSelect);

$rowRoleResult = mysqli_fetch_assoc($roleResult);
echo $rowRoleResult['Rollen_id'];
echo '<br>';
echo $rowRoleResult['Rolnaam'];
echo '<br>';

$_SESSION['role'] = $rowRoleResult['Rolnaam'];



if (isset($_SESSION['user'])) {
    echo "Welcome, " . $_SESSION['user'];
}

$adminPermissions = array("editUser", "addUser", "viewUser", "deleteUser", "editProduct", "addProduct", "viewProduct", "deleteProduct", "addPakket", "deletePakket");
$medewerkerPermissions = array("viewUser", "addProduct", "viewProduct", "addPakket", "deletePakket");
$vrijwilligerPermissions = array("viewUser");
$klantPermissions = array("viewUser");
$leverancierPermissions = array("viewUser", "editUser");

enum Role: string
>>>>>>> 5c3b5559bacfe1644d3d0f1c1e602f5ada3c3f95
{
    case ADMIN = "Admin";
    case MEDEWERKER = "Medewerker";
    case VRIJWILLIGER = "Vrijwilliger";
    case LEVERANCIER = "Leverancier";
    case KLANT = "Klant";

    public static function getAllRoles(): array
    {
        return [self::ADMIN, self::MEDEWERKER, self::VRIJWILLIGER, self::LEVERANCIER, self::KLANT];
    }

    public function allowed($action)
    {
        global $adminPermissions, $medewerkerPermissions, $vrijwilligerPermissions, $klantPermissions, $leverancierPermissions;

        foreach (Role::getAllRoles() as $role) {
            if ($role === $this) {
                return match ($this) {
                    Role::ADMIN => in_array($action, $adminPermissions),
                    Role::MEDEWERKER => in_array($action, $medewerkerPermissions),
                    Role::VRIJWILLIGER => in_array($action, $vrijwilligerPermissions),
                    Role::LEVERANCIER => in_array($action, $leverancierPermissions),
                    Role::KLANT => in_array($action, $klantPermissions),
                };
            }
        }
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