<?php 
 include("database.php");
 session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Voedselbank Maaskantje</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" media="screen" href="index.css" />
</head>
<body>
  <header>
    <div class="Name">
      <div class="logo">
        <img src="img/mv-vm-letter-logo-vector-29030838.jpg" alt="" />
      </div>
      <p> Voedselbank <br/> Maaskantje</p>
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
          <label for="username">Gebruikersnaam:</label>
          <input type="text" id="username" name="username" required/>
          <br/>
          <br/>
          <label for="password">Wachtwoord:</label>
          <input type="password" id="password" name="password" required/>
          <br/>
          <br/>
          <div class="ButtonHolder">
            <button type="submit">Inloggen</button>
          </div>
        </form>
      </section>
    </section>
  </main>
  <footer>
    <div class="footer-container">
      <div class="footer-left">
        <p>Copyright © 2023 ROCvF</p>
      </div>
    </div>
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