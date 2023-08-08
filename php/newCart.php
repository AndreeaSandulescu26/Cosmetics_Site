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

<section class="home" id="home">
    <div class="content">
    <h3>MY CART</h3>

    <?php
        include 'connection.php';

        echo"<style>
        table {
          border-collapse: collapse;
          width: 100%;
          font-size: 2.5rem;
        }

        th, td {
          padding: 8px;
          text-align: left;
          border-bottom: 1px solid #DDD;
        }

        tr:hover {
          background-color: var(--pink);
        }

        td .a{
          color: #999;
          font-size: 1.5rem;
          line-height: 1.5rem;
          padding-top: 2rem;
        }

        .btn1{
          display: inline-block;
          margin-top: 1rem;
          border-radius: 5rem;
          background: #333;
          color: #fff;
          padding: .1rem 1rem;
          cursor: pointer;
          font-size: 1.7rem;
        }

        .btn1:hover{
          background: var(--pink);
        }

        </style>";

        $_SESSION['total'] = 0;

        if(sizeof($_SESSION['products']) == 0)
        {
        echo "<span>No products into cart!</span>";
        }
        else
        {
        echo "<br><br>";
        echo "<table class='table'>
        <thead>
          <tr>
            <th scope='col'>id</th>
            <th scope='col'>Product Name</th>
            <th scope='col'>Quantity</th>
            <th scope='col'>Price</th>
            <th scope='col'>Delete</th>
          </tr>
        </thead>
        <tbody>";

        $prod = $_SESSION['products'];
        $quantity = $_SESSION["quantity"];

        // Parcurge fiecare produs din sesiune si afisează detalii în tabel (produsul, cantitatea, pretul si optiunea de stergere)
        for($i = 0; $i< sizeof($_SESSION['products']);$i++){
            echo "<tr>";
            $stid =oci_parse($c, "SELECT * FROM PRODUCT  WHERE product_id = '$prod[$i]'"); 
            oci_execute($stid);
            $nrrows = oci_num_fields($stid);

            if ($nrrows > 0) {
                while(($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
                echo "<th scope='row'>".$i."</th>
                <td>".$row['NAME']."</td>
                <td><a href = 'decreaseQuantity.php?id=".$i."&quantity=".$quantity[$i]."'class= 'btn1'>-</a>".$quantity[$i]."<a href = 'increaseQuantity.php?id=".$i."&quantity=".$quantity[$i]."'class= 'btn1'>+</a></td>
                <td>".$row['PRICE']*$_SESSION['quantity'][$i]."</td>
                <td><a href='removeFromCart.php?id=".$i."' class='btn'>Delete</a></td>";
                $_SESSION['total'] = $_SESSION['total']+ $row['PRICE']*$quantity[$i];
                }
            }
            echo "</tr>";
        }
        echo "</tbody>
              </table>";
        echo "<br><br><br>";
        echo "<span> Total Sum : ".$_SESSION['total']."</span>";
        echo "<br><br>
        <form name='form' action='order.php' method='get'>
        <button type='submit' class='btn btn-danger'>Order</button>
        </form>";
          }
      ?>

    </div>
</section>
</body>
</html>


  