<?php

include "connection.php";

if (isset($_REQUEST ['act'])){
  if ($_REQUEST ['act']=='delete') {
$sql='delete from carts where id='.$_REQUEST ['id'];
mysqli_query(open_Con(),$sql);

  }}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="products.css">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Marko+One&family=Rampart+One&display=swap" rel="stylesheet">
  <title>Document</title>
</head>

<body> 
<nav>
  <ul>
  <li><a href="index.php">Home</a></li>
    <li><a href="Products.php">Products</a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="register.php">Register</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="cart.php">Cart</a></li>
  </ul>
</nav>

<body>
<form method="post" action="products.php">

<h2 id="product_title"> Shopping Cart</h2>
<div style="clear:both"></div>
<br />
<h3>Order Details</h3>
<div class="table-responsive">
  <table class="table table-bordered">
    <tr>
      <th width="40%">Item Name</th>
      <th width="10%">Quantity</th>
      <th width="20%">Price</th>
      <th width="15%">Total</th>
      <th width="5%">Action</th>
    </tr>
    <?php
    $sql="select * from carts";
    $result = mysqli_query(open_Con(), $sql);
  while ($row=mysqli_fetch_assoc($result)){
        ?>
        <tr>
          <td><?php echo $row["name"]; ?></td>
          <td><?php echo $row["quantity"]; ?></td>
          <td>$ <?php echo $row["price"]; ?></td>
          <td><?php echo $row["total"]; ?></td>
          <td><a href="cart.php?act=delete&id=<?php echo $row["id"]; ?>" ><span class="text-danger">Remove</span></a></td>
        </tr> 
        <?php
        
  }
      
      ?>
      
      

  </table>
</div>
<br />
</body>
</html>
  


