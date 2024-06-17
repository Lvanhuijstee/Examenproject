<?php
if (!isset($_SESSION)) {
    session_start();
}
include("database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="AdminRegistratie.css">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700&display=swap" rel="stylesheet">
    <title>Registration Page</title>
</head>

<body>
    <div class="form-container">
        <form id="myForm" action="adminRegistratieHandling.php" method="post">
            <h1 id="Gelukt"></h1>
            <div class="form-group">
                <div class="tab">
                    <h2>Naam:</h2>
                    <p><input placeholder="Voornaam" name="voornaam"></p>
                    <p><input placeholder="Tussenvoegsel" name="tussenvoegsel"></p>
                    <p><input placeholder="Achternaam" name="achternaam"></p>
                    <p><input type="date" placeholder="Geboortedatum" name="geboortedatum"></p>
                    <p><input type="email" placeholder="Email" name="email"></p>
                </div>
                <div class="tab">
                    <h2>Contact:</h2>
                    <p><input placeholder="Straatnaam" name="straatnaam"></p>
                    <p><input placeholder="Huisnummer" name="huisnummer"></p>
                    <p><input placeholder="Postcode" name="postcode"></p>
                    <p><input placeholder="Land" name="land"></p>
                    <p><input placeholder="Mobiel Nummer" name="mobielnummer"></p>
                </div>
                <div class="tab">
                    <h2>Welke rol?</h2>
                    <select name="RollenAdmin">
                        <?php
                        $sql = "SELECT * FROM Rollen WHERE NOT Rolnaam = 'Klant'";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <option value="<?php echo $row["id"]; ?>">
                                <?php echo $row["Rolnaam"];
                                ?>
                            </option>
                        <?php
                        }
                        ?>
                </div>
                <div class="button-container">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Terug</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Volgende</button>
                </div>
                <div style="text-align:center;margin-top:40px;" id="stepDiv">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
                <div>
                    <button type="submit" id="submittemp">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <?php
    mysqli_close($conn);
    ?>
    <script src="registratie.js"></script>
</body>

</html>