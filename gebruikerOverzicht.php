<?php
session_start();
include('database.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Homepage</title>
    <link rel="stylesheet" media="screen" href="css/Header.css" />
    <link rel="stylesheet" media="screen" href="css/footer.css" />
    <link rel="stylesheet" media="screen" href="css/gebruikerOverzicht.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body class="grid-container">
    <header>
        <div class="menu-container">
            <div class="left">
                <a href="home.php" class="logo"><img src="img/mv-vm-letter-logo-vector-29030838.jpg" alt=""></a>
                <h1>Voedselbank Maaskantje</h1>
            </div>
            <div class="center">
                <a href="pakketen.php">Pakket Samenstelling</a>
                <a href="levering.php">Producten</a>
                <div class="dropmenu">
                    <p>Administratie</p>
                    <div class="dropmenu-content">
                        <a href="">eerste</a>
                        <a href="">tweede</a>
                        <a href="">derde</a>
                    </div>
                </div>
            </div>
            <div class="right">
                <a href="index.php">Account details</a>
            </div>
        </div>
    </header>
    <section class="section-container">
        <?php
        $sql = "SELECT id,Voornaam,Achternaam,Tussenvoegsel,Geboortedatum,Mobielnummer,Email,Volwassenen,Kinderen,Babys FROM klant";
        $result = mysqli_query($conn, $sql);
        ?>
        <table class="table-container">
            <tr id="frontend-table">
                <th>Voornaam</th>
                <th>Achternaam</th>
                <th>Tussenvoegsel</th>
                <th>Geboortedatum</th>
                <th>Mobielnummer</th>
                <th>Email</th>
                <th>Volwassenen</th>
                <th>Kinderen</th>
                <th>Babys</th>
                <th>Acties</th>
            </tr>
            <div id="backend-table">
                <?php while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                    <td>" . $row['Voornaam'], "</td>
                    <td>" . $row['Achternaam'], "</td>
                    <td>" . $row['Tussenvoegsel'], "</td>
                    <td>" . $row['Geboortedatum'], "</td>
                    <td>" . $row['Mobielnummer'], "</td>
                    <td>" . $row['Email'], "</td>
                    <td>" . $row['Volwassenen'], "</td>
                    <td>" . $row['Kinderen'], "</td>
                    <td>" . $row['Babys'], "</td>
                    <td>
                        <button onclick='openPopup(" . json_encode($row) . ")' class='edit' title='Edit'><i class='material-icons'>&#xE254;</i></button>
                        <button onclick='deleteRecord(" . $row['id'] . ")' class='delete' title='Delete'><i class='material-icons'>&#xE872;</i></button>
                    </td>
                </tr>";
                }
                ?>
            </div>
        </table>
        <div id="overlay"></div>
        <div id="popup">
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <form id="editForm">
                <input type="hidden" name="id" id="editId">

                <div class="form-row">
                    <label for="voornaam">Voornaam:</label>
                    <input type="text" name="voornaam" id="voornaam">
                </div>
                <div class="form-row">
                    <label for="achternaam">Achternaam:</label>
                    <input type=" text" name="achternaam" id="achternaam">
                </div>
                <div class="form-row">
                    <label for="tussenvoegsel">Tussenvoegsel:</label>
                    <input type="text" name="tussenvoegsel" id="tussenvoegsel">
                </div>
                <div class="form-row">
                    <label for="geboortedatum">Geboortedatum:</label>
                    <input type="date" name="geboortedatum" id="geboortedatum">
                </div>
                <div class="form-row">
                    <label for="mobielnummer">Mobielnummer:</label>
                    <input type="text" name="mobielnummer" id="mobielnummer">
                </div>
                <div class="form-row">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="form-row">
                    <label for="volwassenen">Volwassenen:</label>
                    <input type="number" name="volwassenen" id="volwassenen">
                </div>
                <div class="form-row">
                    <label for="kinderen">Kinderen:</label>
                    <input type="number" name="kinderen" id="kinderen">
                </div>
                <div class="form-row">
                    <label for="babys">Babys:</label>
                    <input type="number" name="babys" id="babys">
                </div>

                <button type="button" onclick="updateRecord()">Update</button>
            </form>
        </div>
    </section>
    <footer class="footer">
        <div class="footer-item">Copyright © 2025 ROCvF</div>
    </footer>
    <script src="gebruikerOverzicht.js" defer></script>
</body>

</html>