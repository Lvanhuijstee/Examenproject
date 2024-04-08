<?php
    session_start();
    include("database.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

            $sql ="SELECT * FROM users WHERE user='$username'";
            
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                if (password_verify($_POST['password'], $row['password'])) {
                    echo "you logged in";
                    $_SESSION['user'] = $row['user'];
                    header("location: home.php");
                }else{
                    echo'username or password incorrect ';
                }
            }else{
                echo'user name or password incorrect';
            }
        }    

        mysqli_close($conn);
?>