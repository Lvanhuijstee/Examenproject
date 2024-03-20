<?php
session_start();
include("database.php");

$sql ="SELECT * FROM producten";
$result = mysqli_query($conn,$sql);

$procductArray = array();


if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        array_push($procductArray,$row['name']);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="producten.css">
</head>
<body>
    <div class="cart">
    <form action="producten.php" method="post">
    <input type="submit" value="go to shoping cart">
    </form>
    </div>

    <script>
        var productArray = <?php echo json_encode($procductArray);?>;
        productArray.forEach(function(item, index, array) {
            var count = 0;
            const newDiv = document.createElement("div");
            document.body.appendChild(newDiv);

            const newP = document.createElement("p");
            newP.innerHTML = item
            newDiv.appendChild(newP);

            var newButton = document.createElement("button");
            newButton.innerHTML = "+"
            newDiv.appendChild(newButton);
            newButton.addEventListener('click', function() {
    
                if (count == 0){
                    const name = document.createElement("p")
                    name.id = item
                    name.innerHTML = item;
            
                const cart = document.getElementsByClassName("cart")
                cart[0].appendChild(name)
                console.log(count)
                count = count + 1;
                }else if(count >= 1){
                  var change = document.getElementById(item)
                  change.innerHTML =  item +" "+ count;
                  count = count + 1;
                }
            });
        });

        
        

       
    </script>
</body>
</html>

<?php  
mysqli_close($conn);
?>