<?php
session_start();
include('database.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Voedselbank Maaskantje</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style type="text/css">
        table,
        tr,
        rd {
            border: 1px solid black;
        }
    </style>
</head>

<?php
$sql = "SELECT EAN,Naam,Aantal,THT,categorieen_id FROM product";
$result = mysqli_query($conn, $sql);
?>

<body>
    <table>
        <tr style="font-weight: bold;">
            <td>EAN</td>
            <td>Productnaam</td>
            <td>Aantal</td>
            <td>THT</td>
            <td>Categorie</td>
            <td>In Gebruik</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
            <td>" . $row['EAN'], "</td>
            <td>" . $row['Naam'], "</td>
            <td>" . $row['Aantal'], "</td>
            <td>" . $row['THT'], "</td>
            <td>" . $row['categorieen_id'], "</td>
            <td>" . $row['Aantal'], "</td>
        </tr>";
        }
        ?>
    </table>
</body>