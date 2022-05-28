<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login Page</title>
</head>
<header>
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
    
  </header>
<body>

<?php
$host="localhost";
$user="root";
$password="617120";
$database="ecommerce";

if (isset($_POST['submit'])){
  $conn =  mysqli_connect($host, $user, $password, $database);
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

   $username = $_POST["username"];
   $password = $_POST["password"]; 

    $query = "SELECT * FROM userinformation WHERE username = '$username' AND password = '$password'";
    
    $result = mysqli_query($conn, $query);
    $count = (mysqli_num_rows($result));

    if ($count > 0) {
        
        header("location:index.php");
        }
    } else {
        echo "user Not exist";
    }
    


?>

<section class="login_section">

    <div class="login_box">
        <h1>Login Page</h1>
        <form action="login.php" method="POST">
            <label>Username</label>
            <input name="username" type="text">

            <label>Password</label>
            <input name="password" type="text">


           <input name="submit" type="submit" value="submit">
           </form>
           <p> By clicking the Register Button, You Agree to our Terms and Conditions </p>
</section>
</body>
</html>