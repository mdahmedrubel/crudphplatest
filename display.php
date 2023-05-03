<?php 
 include 'db-connection.php'; 

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display project-data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <style>
        table {
    width: 100%;
}

table thead tr {
    border: 1px solid #ddd;
}

table tbody tr {
    border: 1px solid #ddd !important;
}

table tbody tr td {
    border-right: 1px solid #ddd;
    padding: 10px;
}

    </style>
    <h1>Display Data</h1>
    <a href="index.php">back to home</a>
    <table>
        <thead>
            <th>Sl No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Action</th>
        </thead>
        <tbody>


        <?php
        $sql = "SELECT * FROM crud_practice";
        $result = mysqli_query($conn, $sql);
        
        $number = 1;
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $number; ?></td>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['phone'] ?></td>
            <td><?php echo $row['address'] ?></td>
            <td>
                <a href="delete.php?delete=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure? you want to delete this')">Delete</a>
                <a href="edit.php?edit=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure? you want to delete this')">Edit</a>
            </td>
        </tr>
        <?php 
        $number++;
        }


        } else {
          echo "<tr>0 results</tr>";
        }
        
        mysqli_close($conn);
        ?>
       
           
        </tbody>
    </table>
    
</body>
</html>