<?php
include("database.php");
if (!isset($_SESSION)) {
  session_start();
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Voedselbank Maaskantje</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" media="screen" href="css/Header.css" />
  <link rel="stylesheet" media="screen" href="css/index.css" />
  <link rel="stylesheet" media="screen" href="css/footer.css" />
</head>

<body>
<header>
  <div class="menu-container">
    <div class="left">
      <a href="#" class="logo"><img src="img/mv-vm-letter-logo-vector-29030838.jpg" alt=""></a>
        <h1>Voedselbank Maaskantje</h1>
    </div>
  </header>
  <main>
    <section class="GridContainer">
      <section class="WelcomeBox">
        <h2>Welkom bij Voedselbank Maaskantje! <br><br> Login om verder te gaan </h2>
      </section>
      <section class="SubmitForm">
        <form action="login.php" method="post" class="signin">
          <h2>Inloggen</h2>
          <label for="username">Email:</label>
          <input type="email" id="email" name="Email" required />
          <br />
          <br />
          <label for="password">Wachtwoord:</label>
          <input type="password" id="password" name="Wachtwoord" required />
          <br />
          <br />
          <div class="ButtonHolder">
            <button type="submit">Inloggen</button>
          </div>
        </form>
      </section>
    </section> 
  </main>
  <footer class="footer">
        <div class="footer-item">Copyright © 2023 ROCvF</div>
  </footer>
</body>
</html>

<?php


//    if($_SERVER["REQUEST_METHOD"] == "POST"){
//     $Voornaam = filter_input(INPUT_POST, "vrn", FILTER_SANITIZE_SPECIAL_CHARS);
//     $Achternaam = filter_input(INPUT_POST, "achtn", FILTER_SANITIZE_SPECIAL_CHARS);
//     $Tussenvoegsel = filter_input(INPUT_POST, "tsv", FILTER_SANITIZE_SPECIAL_CHARS);
//     $Geboortedatum = filter_input(INPUT_POST, "gbd", FILTER_SANITIZE_SPECIAL_CHARS);
//     $Mobielnummer = filter_input(INPUT_POST, "mbl", FILTER_SANITIZE_SPECIAL_CHARS);
//     $username = filter_input(INPUT_POST, "user", FILTER_SANITIZE_SPECIAL_CHARS);
//     $code = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_SPECIAL_CHARS);

//         $hash = password_hash($code, PASSWORD_DEFAULT);

//         $sql ="INSERT INTO gebruiker(Voornaam,Achternaam,Tussenvoegsel,Geboortedatum,Mobielnummer,Gebruikersnaam,Wachtwoord)
//         VALUES ('$Voornaam','$Achternaam','$Tussenvoegsel','$Geboortedatum','$Mobielnummer','$username','$hash')";

//         try{
//             mysqli_query($conn, $sql);
//         }
//         catch(mysqli_sql_exception){
//             echo"coudnt register";
//         }


//     }
mysqli_close($conn);
?>