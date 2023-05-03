<?php
 include 'db-connection.php'; 

 if(isset($_POST['submit'])){

    //insert data inside table
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $address  = $_POST['address'];


    //insert query
    $sql = "INSERT INTO crud_practice (username, email, phone, address)
    VALUES ('$username', '$email', '$phone', '$address')";

    if ($conn->query($sql) === TRUE) {
    header('location:display.php');
    } else {
    echo die("Data not inserted");
    }
    $conn->close();

   
 }
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Crud Operation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form action="" method="post">
    <h1>PHP CRUD</h1>
    <a href="display.php">view data</a>
    <input type="text" placeholder="Enter your name" required autocomplete="off" name="username">
    <input type="email" placeholder="Enter your email" required autocomplete="off" name="email">
    <input type="tel" placeholder="Enter your phone number" required autocomplete="off" name="phone">
    <input type="text" placeholder="Enter your address" required autocomplete="off" name="address">
    <input type="submit" class="btn" name="submit">
</form>
    
</body>
</html>