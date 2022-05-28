<?php
session_start();
include "connection.php";
if (isset($_REQUEST ['act'])){
  if ($_REQUEST ['act']=='add') {


      $sql="select * from carts where id=".$_REQUEST['id'];
      $result = mysqli_query(open_Con(), $sql);
      if (mysqli_num_rows($result)>0){
    $sql="update carts set quantity=quantity+1, total=total+price";
    mysqli_query(open_Con(),$sql);
    
      }else{
        $sql="select * from product where id=".$_REQUEST['id'];
        $result = mysqli_query(open_Con(), $sql);
        $row=mysqli_fetch_assoc($result);
        $sql="insert into carts (id,name,quantity,total,price)values(". $row['id'].",'". $row['name']."',1 ," .$row['price'] .",". $row['price'].")";
        mysqli_query(open_Con(),$sql);
    
      }
    
    
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

<h2 id="product_title"> OUR PRODUCTS</h2>
  <div class="cart-container">
  <article class="container__card">
  <?php
$query = "SELECT * FROM product";
$result = mysqli_query(open_Con(),$query);
if(mysqli_num_rows($result) > 0)
{
  while ($row = mysqli_fetch_array($result))
{

?>
        <div class="cards">
        <img  src="<?php echo $row['image']; ?> " class="card-img-top" alt="Image of Coat" />
           
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                <h5 class="card-description"><?php echo $row['description']; ?></h5>
                <p class="card-text"><?php echo $row['price']; ?></p>
                <br><br>
                <a href="products.php?act=add&id=<?php echo $row['id']; ?>">
                Add to Cart
                </a>
            </div>
        </div>

        <?php
}
}
?>      
        </div>
    </article>

</form>
</div>
  

