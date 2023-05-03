<?php
 include 'db-connection.php'; 

 if(isset($_POST['update_btn'])){

    $data_id = $_POST['data_id'];
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $address  = $_POST['address'];

    $sql = "update crud_practice set username='$username', email='$email', phone='$phone', address='$address' where id=$data_id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('location:display.php');
    }else{
        echo die("Error in updating data");
    }

 }
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php 
 if(isset($_GET['edit'])){
    $edit_id = $_GET['edit'];

    $get_data = mysqli_query($conn, "Select * from crud_practice where id=$edit_id");
    if(mysqli_num_rows($get_data)>0){
        $fetch_data = mysqli_fetch_assoc( $get_data);
        ?>

        <form action="" method="post">
            <h1>Update Data</h1>
            <a href="display.php">view data</a>
            <input type="hidden" name="data_id" value="<?php echo $fetch_data['id'] ?>">
            <input type="text" required autocomplete="off" value="<?php echo $fetch_data['username'] ?>" name="username">
            <input type="email" required autocomplete="off" value="<?php echo $fetch_data['email'] ?>" name="email">
            <input type="tel"  required autocomplete="off" value="<?php echo $fetch_data['phone'] ?>" name="phone">
            <input type="text" required autocomplete="off" value="<?php echo $fetch_data['address'] ?>" name="address">
            <input type="submit" class="btn" name="update_btn" value="Update">
        </form>


    <?php 
    }

}
?>


    
</body>
</html>