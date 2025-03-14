<?php
if (!isset($_SESSION)) {
    session_start();
}

include('database.php');


$email = $_SESSION['user'];
$sqlUser = "SELECT id FROM klant, Medewerker WHERE Email = '$email'";
$resultUser = mysqli_query($conn, $sqlUser);
$rowUser = mysqli_fetch_assoc($resultUser);
$userID = $rowUser['id'];

$sqlRoleSelect = "SELECT rollen_id FROM klant, Medewerker WHERE id = '$userID'";
$roleResult = mysqli_query($conn, $sqlRoleSelect);

$rowRoleResult = mysqli_fetch_assoc($roleResult);
echo $rowRoleResult['rollen_id'];
echo '<br>';
echo $rowRoleResult['Naam'];
echo '<br>';

$_SESSION['role'] = $rowRoleResult['Naam'];



if (isset($_SESSION['user'])) {
    echo "Welcome, " . $_SESSION['user'];
}

$adminPermissions = array("adminPerms", "medewerkerPerms", "userPerms", "leverancierPerms", "voedselpakketPerms");
$medewerkerPermissions = array("medewerkerPerms", "userPerms", "voedselpakketPerms");
$vrijwilligerPermissions = array("voedselpakketPerms", "userPerms");
$klantPermissions = array("userPerms");
$leverancierPermissions = array("userPerms", "leverancierPerms");

enum Role: string
{
    case Admin = "Admin";
    case Medewerker = "Medewerker";
    case Vrijwilliger = "Vrijwilliger";
    case Leverancier = "Leverancier";
    case Klant = "Klant";

    public static function getAllRoles(): array
    {
        return [self::Admin, self::Medewerker, self::Vrijwilliger, self::Leverancier, self::Klant];
    }

    public function allowed($action)
    {
        global $adminPermissions, $medewerkerPermissions, $vrijwilligerPermissions, $klantPermissions, $leverancierPermissions;

        foreach (Role::getAllRoles() as $role) {
            if ($role === $this) {
                return match ($this) {
                    Role::Admin => in_array($action, $adminPermissions),
                    Role::Medewerker => in_array($action, $medewerkerPermissions),
                    Role::Vrijwilliger => in_array($action, $vrijwilligerPermissions),
                    Role::Leverancier => in_array($action, $leverancierPermissions),
                    Role::Klant => in_array($action, $klantPermissions),
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