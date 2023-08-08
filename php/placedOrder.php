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

    <a href="#" class="logo">Beauty<span>Bliss</span></a>
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
    <div class="content">
<?php

include 'connection.php';
echo"<span>Congratulations! Your order has been placed successfully.</span>";
session_destroy();
?>
    </div>
</section>

</body>
</html>


  