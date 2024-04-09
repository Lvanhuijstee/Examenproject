<?php
    session_start();
    include("database.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

            $sql ="SELECT * FROM gebruiker WHERE Gebruikersnaam ='$username'";


            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                if ($password  == $row['Wachtwoord']) {
                    echo "you logged in";
                    $_SESSION['user'] = $row['Gebruikersnaam'];
                    header("location: home.php");
                }else{
                    echo'username or password incorrect';
                }
            }else{
                echo'username or password incorrect';
            }
        }    

        mysqli_close($conn);
?>