<?php
include("database.php");

$sql = "SELECT * FROM allergien_wensen";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen" href="css/Header.css"/>
    <link rel="stylesheet" media="screen" href="css/registratie.css"/>
    <link rel="stylesheet" media="screen" href="css/footer.css"/>
    <title>Registration Page</title>
</head>

<body>
<header>
        <div class="menu-container">
            <div class="left">
                <a href="home.php" class="logo"><img src="img/mv-vm-letter-logo-vector-29030838.jpg" alt=""></a>
                <h1>Voedselbank Maaskantje</h1>
            </div>
    </header>
    <div class='flex-container'>
    <form id="registratie" action="registratieKlantHandeling.php" method="post">
        <div class="form-page" id="page1">
            <h2>Persoonlijke informatie</h2>
            <label for="Naam">Naam:</label>
            <input type="text" id="name" name="naam" required>
            
            <label for="Tussenvoegsel">Tussenvoegsel:</label>
            <input type="email" id="Tsv" name="tussenvoegsel">

            <label for="Achternaam">Achternaam:</label>
            <input type="text" id="Achternaam" name="achternaam" required>

            <label for="geboortedatum">Geboortedatum:</label>
            <input type="date" id="gbd" name="geboortedatum" required>

            <label for="Email">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="">Wachtword:</label>
            <input type="password" name="wachtwoord" required>

            <button type="button" class="next" onclick="nextPage(2)">Next</button>
        </div>

        <div class="form-page" id="page2">
            <h2>Woonplaats/contactgevens</h2>
            <label for="Straatnaam">Straatnaam:</label>
            <input type="text" id="straatnaam" name="straatnaam" required>

            <label for="Huisnummer">Huisnummer:</label>
            <input type="text" id="huisnummer" name="huisnummer" required>

            <label for="Postcode">Postcode</label>
            <input type="text" id="postcode" name="postcode" required>

            <label for="Land">Land:</label>
            <input type="text" id="land" name="land" required>

            <label for="mobiel">Mobielnumer:</label>
            <input type="number" id="mobielnummer" name="mobielnummer" required>

            <button type="button" class="prev" onclick="previousPage(1)">Previous</button>
            <button type="button" class="next" onclick="nextPage(3)">Next</button>
        </div>

        <div class="form-page" id="page3">
            <h2>Allergien en Wensen</h2>
            <?php while ($row = mysqli_fetch_assoc($result)){?>
                <label for=""><?= $row['Naam'] ?></label>
                <input type="checkbox" data-title="allergien_wensen" name="allergien_wensen[]" value ="<?= $row['Naam'] ?>">
            <?php }?>
            <button type="button" class="prev" onclick="previousPage(2)">Previous</button>
            <button type="button" class="next" onclick="nextPage(4)">Next</button>
        </div>

        <div class="form-page" id="page4">
            <h2>Gezinssamenstelling</h2>
           
            <label for="volwassenen">Volwassenen:</label>
            <input type="number" id="volwassenen" name="volwassenen" required>

            <label for="kinderen">Kinderen:</label>
            <input type="number" id="kinderen" name="kinderen" required>

            <label for="babys">Babys</label>
            <input type="number" id="babys" name="babys" required>


            <button type="button" class="prev" onclick="previousPage(3)">Previous</button>
            <button type="button" class="next" onclick="nextPage(5)">Next</button>
        </div>

        <div class="form-page" id="page5">
            <h2>Details</h2>
            <div id="summary"></div> 

            <button type="button" class="prev" onclick="previousPage(4)">Previous</button>
            <button type="button" class="next" onclick="nextPage(6)">Submit</button>
        </div>
        
    </form>
    </div>
   

    <footer class="footer">
        <div class="footer-item">Copyright © 2023 ROCvF</div>
    </footer>
    <script src="registratie.js"></script>
</body>
</html>