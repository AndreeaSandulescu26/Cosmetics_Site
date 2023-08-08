<?
include 'php/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeautyBliss</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    
<header>  

    <input type="checkbox" name="" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <a href="#home" class="logo">Beauty<span>Bliss</span></a>
    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#about">about</a>
        <a href="#products">products</a>
        <a href="#review">review</a>
        <a href="#contact">contact</a>
    </nav> 

    <div class="icons">
        <a href="#" class="fas fa-heart"></a>
        <a href="php/newCart.php" class="fas fa-shopping-cart"></a>
        <a href="#" class="fas fa-user"></a>
    </div>

</header>   

<section class="home" id="home">
    <div class="content">
        <h3>Your skin deserves the best, and we deliver.</h3>
        <span>best skincare products</span>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
             Voluptas beatae repellendus hic doloribus
        quis debitis repellat ipsum laboriosam delectus iure?
         Iure eaque possimus rerum commodi sequi reprehenderit natus dolores.</p>
        <a href="#products" class="btn">shop now</a>
    </div>
</section>

<section class="about" id="about">

    <h1 class="heading"> <span> about </span> us </h1>

    <div class="row">
        <div class="video-container">
            <video src="images/about-vid.mp4" loop autoplay muted></video>
            <h3>best skincare products sellers</h3>
        </div>

        <div class="content">
        <h3>why choose us?</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Qui, explicabo! Eius temporibus consequuntur ipsum quam obcaecati ullam officiis a velit adipisci,
            perferendis, explicabo animi sed ut, possimus laudantium ipsa maxime.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Adipisci ipsa molestiae, architecto, id reprehenderit perspiciatis repellat 
            libero culpa ullam aperiam temporibus doloremque debitis sequi ad porro deleniti similique eum quibusdam.</p>
            <a href="#" class="btn">learn more</a>
        </div>
    </div>

</section>

<<section class="icons-container">
    
<div class="icons">
    <img src="images/1.png"></img>
    <div class="info">
        <h3>free delivery</h3>
        <span>on all orders</span>
    </div>
</div>

<div class="icons">
    <img src="images/2.png" alt="">
    <div class="info">
        <h3>10 days returns</h3>
        <span>moneyback guarantee</span>
    </div>
</div>

<div class="icons">
    <img src="images/3.png" alt="">
    <div class="info">
        <h3>offer & gifts</h3>
        <span>on all orders</span>
    </div>
</div>

<div class="icons">
    <img src="images/4.png" alt="">
    <div class="info">
        <h3>secure payment</h3>
        <span>protected by paypal</span>
    </div>
</div>
</section>

<section class="products" id="products">

<?php

include 'php/addToCart.php';

	$username = "system";                    // Foloseste numele de utilizator al bazei de date
	$password = "1234";                     // Si parola
	$database = "localhost:1521/XEPDB1";   // Stringul de conectare la baza de date
	$query = "select * from product";     // Interogarea SQL pentru a selecta toate produsele din tabelul "product"

	$c = oci_connect($username, $password, $database);  // Conectarea la baza de date utilizând informatiile de autentificare
	if (!$c) {
		$m = oci_error();
		trigger_error('Could not connect to database: '. $m['message'], E_USER_ERROR);   // Verificarea erorii de conectare la baza de date
	}

	$s = oci_parse($c, $query);
	if (!$s) {
		$m = oci_error($c);
		trigger_error('Could not parse statement: '. $m['message'], E_USER_ERROR);      // Verificarea erorii de parsare a interogarii
	}
	$r = oci_execute($s);
	if (!$r) {
		$m = oci_error($s);
		trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);    // Verificarea erorii de executare a interogarii
	}

      if (!isset($_SESSION["in"]))
        {   $_SESSION["in"] = 1;
            $_SESSION["products"] = array();
            $_SESSION["quantity"] = array();
            $_SESSION["orderID"] = -1;
        }

?>

    <h1 class="heading"> latest <span>products</span></h1>
    <div class="box-container">

       <div class="box">
            <span class="discount">-28%</span>
            <div class="image">
            <img src="images/img-1.jpg">
            </div>
            <div class="content">
                
                 <h3 class="item-name"><?php $stid = oci_parse($c,"SELECT product_id, name, description, price FROM PRODUCT WHERE product_id = 3"); 
						oci_execute($stid); 
						while(($row = oci_fetch_array($stid, OCI_ASSOC)) != false)
						{	if(isset($row['NAME'])){
							echo $row['NAME'];
						}?></h3>
                 <p><?php $id = $row['PRODUCT_ID']; echo $row['DESCRIPTION'];?><p>

                <div class="price">$<?php echo $row['PRICE'];}?><span> $45.99</span></div>

                <form name='form' action='php/addToCart.php' method='get'>
                    <input type='text' class='form-control' name='quantity' id='quantity' value='1' >
                    <input type='hidden' class='form-control' name='id' id='id' value='<?php echo $id ?>'>
                    <input type="submit" value="Add to Cart" class="btn">
                </form>
            </div>
        </div>


        <div class="box">
            <span class="discount">-30%</span>
            <div class="image">
                <img src="images/img-2.jpg">
            </div>
            <div class="content">
                 <h3 class="item-name"><?php $stid = oci_parse($c,"SELECT product_id, name, description,price FROM PRODUCT WHERE product_id = 4"); 
						oci_execute($stid); 
						while(($row = oci_fetch_array($stid, OCI_ASSOC)) != false)
						{	if(isset($row['NAME'])){
							echo $row['NAME'];
						}?></h3>
                 <p><?php $id = $row['PRODUCT_ID']; echo $row['DESCRIPTION'];?><p>

                <div class="price">$<?php echo $row['PRICE'];}?><span> $99.99</span></div>
                <form name='form' action='php/addToCart.php' method='get'>
                    <input type='text' class='form-control' name='quantity' id='quantity' placeholder='1' value='1'>
                  <input type='hidden' class='form-control' name='id' id='id' value='<?php echo $id ?>'>
                  <input type="submit" value="Add to Cart" class="btn">
                </form>
            </div>
        </div>

        <div class="box">
            <span class="discount">-30%</span>
            <div class="image">
            <img src="images/img-3.jpg">
            </div>
            <div class="content">
                 <h3 class="item-name"><?php $stid = oci_parse($c,"SELECT product_id, name, description,price FROM PRODUCT WHERE product_id = 5"); 
						oci_execute($stid); 
						while(($row = oci_fetch_array($stid, OCI_ASSOC)) != false)
						{	if(isset($row['NAME'])){
							echo $row['NAME'];
						}?></h3>
                 <p><?php $id = $row['PRODUCT_ID']; echo $row['DESCRIPTION'];?><p>

                <div class="price">$<?php echo $row['PRICE'];}?><span> $150.05</span></div>
                <form name='form' action='php/addToCart.php' method='get'>
                    <input type='text' class='form-control' name='quantity' id='quantity' placeholder='1' value='1'>
                  <input type='hidden' class='form-control' name='id' id='id' value='<?php echo $id ?>'>
                  <input type="submit" value="Add to Cart" class="btn">
                </form>
            </div>
        </div>

        <div class="box">
            <span class="discount">-24%</span>
            <div class="image">
            <img src="images/img-4.jpg">
            </div>
            <div class="content">
                 <h3 class="item-name"><?php $stid = oci_parse($c,"SELECT product_id, name, description,price FROM PRODUCT WHERE product_id = 7"); 
						oci_execute($stid); 
						while(($row = oci_fetch_array($stid, OCI_ASSOC)) != false)
						{	if(isset($row['NAME'])){
							echo $row['NAME'];
						}?></h3>
                 <p><?php $id = $row['PRODUCT_ID']; echo $row['DESCRIPTION'];?><p>

                <div class="price">$<?php echo $row['PRICE'];}?><span> $120</span></div>
                <form name='form' action='php/addToCart.php' method='get'>
                  <input type='text' class='form-control' name='quantity' id='quantity' placeholder='Enter the quantity you desire..' value='1'>
                  <input type='hidden' class='form-control' name='id' id='id' value='<?php echo $id ?>'>
                  <input type="submit" value="Add to Cart" class="btn">
                </form>
            </div>
        </div>

    </div>
</section>

<section class="review" id="review">
    <h1 class="heading">customer's <span>review</span></h1>
    <div class="box-container">

         <div class="box">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, nobis ut
                error nesciunt sit rem culpa doloribus quam laborum fugit ipsum accusantium
                alias nostrum quasi voluptatum nihil dolore iste! Ipsam!</p>
                <div class="user">
                    <img src="images/pic-1.jpeg" alt="">
                    <div class="user-info">
                        <h3>Irina</h3>
                        <span>happy customer</span>
                    </div>
                </div>
                <span class="fas fa-quote-right"></span>
         </div>


         <div class="box">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, nobis ut
                error nesciunt sit rem culpa doloribus quam laborum fugit ipsum accusantium
                alias nostrum quasi voluptatum nihil dolore iste! Ipsam!</p>
                <div class="user">
                    <img src="images/pic-2.jpeg" alt="">
                    <div class="user-info">
                        <h3>Olivia</h3>
                        <span>happy customer</span>
                    </div>
                </div>
                <span class="fas fa-quote-right"></span>
         </div>

         <div class="box">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, nobis ut
                error nesciunt sit rem culpa doloribus quam laborum fugit ipsum accusantium
                alias nostrum quasi voluptatum nihil dolore iste! Ipsam!</p>
                <div class="user">
                    <img src="images/pic-3.jpg" alt="">
                    <div class="user-info">
                        <h3>Alex</h3>
                        <span>happy customer</span>
                    </div>
                </div>
                <span class="fas fa-quote-right"></span>
         </div>
    </div>
</section>


<section class="contact" id="contact">
    <h1 class="heading"><span>contact</span> us</h1>
    <div class="row">
        <form action="">
            <input type="text" placeholder="Name:" class="box">
            <input type="email" placeholder="E-mail:" class="box">
            <input type="number" placeholder="Phone Number:" class="box">
            <textarea name="" class="box" placeholder="Your message:" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="send message" class="btn">
        </form>

        <div class="image">
            <img src="images/contact-img.png" alt="">
        </div>

    </div>
</section>


<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>quick links</h3>
            <a href="#">home</a>
            <a href="#">about</a>
            <a href="#">products</a>
            <a href="#">review</a>
            <a href="#">contact</a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="#">my account</a>
            <a href="#">my order</a>
            <a href="#">my favorites</a>
        </div>

        <div class="box">
            <h3>locations</h3>
            <a href="#">Romania</a>
            <a href="#">Hungary</a>
            <a href="#">Greece</a>
            <a href="#">Bulgary</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#">+40723335489</a>
            <a href="#">office@BeautyBliss.ro</a>
            <a href="#">Bucharest, Romania</a>
            <img src="images/payment.png" alt="">
        </div>

    </div>

    <div class="credit">
        created by <span> Andreea Sandulescu </span> | all rights reserved |
    </div>

</section>

</body>
</html>