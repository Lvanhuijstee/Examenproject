<?php

function displayBeheerder(){
    include ('dbconection.php');
    $day = date("l");
    $sql = "SELECT $day,Fk_beheerder_Id  FROM availabilities";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
            $id = $row['Fk_beheerder_Id'];
            $sql2 = "SELECT * FROM beheerder WHERE id='$id'";
            $result2 = mysqli_query($conn, $sql2);
            while($row2 = mysqli_fetch_assoc($result2)){
            echo $row2['Naam'];
        }
    }
}