<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeautyBliss</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    
<header>  

    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>
    <a href="#home" class="logo">Beauty<span>Bliss</span></a>
    <nav class="navbar">
        <a href="../index.php#home">home</a>
        <a href="../index.php#about">about</a>
        <a href="../index.php#products">products</a>
        <a href="../index.php#review">review</a>
        <a href="../index.php#contact">contact</a>
    </nav> 

    <div class="icons">
        <a href="#" class="fas fa-heart"></a>
        <a href="newCart.php" class="fas fa-shopping-cart"></a>
        <a href="#" class="fas fa-user"></a>
    </div>

</header>

</div>

<section class="home" id="home">


<style>

h3{
    font-size: 2.5rem;
    color: #333;
}

.contact .row form{
    flex:1 1 40rem;
    padding: 2rem 2.5rem;
    box-shadow: 0 .5rem 1.5rem rgba(0, 0, 0, .1);
    border: .1rem solid rgba(0, 0, 0, .1);
    background: #fff;
    border-radius: .5rem;
}

</style>


    <div class = "contact" >
       <div class = "container">
            <h3>Delivery details</h3>
            <br>
            <br>
            <div class = "row">
           
                <?php
               ///orderID = $_GET["orderID"];
                echo "<form action='delivery.php' method='POST'>"
                ?>
            <?php
                 echo "<input type='text' name='firstname' placeholder=' First Name:' class='box' required>";
                 echo "<input type='text' name='lastname' placeholder=' Last Name:' class='box' required>";
                 echo "<input type='text' name='adress' placeholder=' Address:' class='box' required>";
                 echo "<input type='text' name='city' placeholder=' City:' class='box' required>";
                 echo "<input type='email' name='email' placeholder=' E-mail:'' class='box' required>";
                 echo "<input type='number' name='phone' placeholder=' Phone Number:' class='box' required>";
           
                 echo  "<button type='submit' class='btn'>Confirm Details</button>"
                  ?>
                  </form>
                  
        <div class="image">
            <img src="images/homepic1.png" alt="">
        </div>
                
            </div>
    </div>

</section>

</body>
</html>


  