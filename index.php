<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="">Username:</label><br>
        <input type="text" name="user"><br>
        <label for="">Password:</label><br>
        <input type="password" name="pass"><br>
        <input type="submit" name="submit" value="register">
    </form>

    <form action="login.php" method="post">
        <label for="">Username:</label><br>
        <input type="text" name="username"><br>
        <label for="">Password:</label><br>
        <input type="password" name="password"><br>
        <input type="submit" name="submit" value="login">
    </form>

    <form action="productenToevoegen.php" method="post">
        <label for="">Product name:</label><br>
        <input type="text" name="productname"><br>
        <label for="">category:</label><br>
        <input type="text" name="category"><br>
        <input type="submit" name="submit" value="create">
    </form>

</body>
</html>



<?php
    include("database.php");
    

   if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = filter_input(INPUT_POST, "user", FILTER_SANITIZE_SPECIAL_CHARS);
    $code = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($username)){
        echo"please enter a username";
    }elseif(empty($code)){
        echo"please enter a password";
    }else{
        $hash = password_hash($code, PASSWORD_DEFAULT);

        $sql ="INSERT INTO users(user,password)
        VALUES ('$username', '$hash')";
    
        try{
            mysqli_query($conn, $sql);
        }
        catch(mysqli_sql_exception){
            echo"coudnt register";
        }
        }

    }
    mysqli_close($conn);
?>