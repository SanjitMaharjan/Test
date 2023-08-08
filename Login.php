<?php
    include 'connection.php';
    if(isset($_POST['signup'])){
        $name = $_POST['name'];
        $password = $_POST['password'];

        $sel = "SELECT * FROM `user` WHERE Username='$name'";
        $result = mysqli_query($con,$sel);
        $row = mysqli_fetch_a;ssoc($result);
        if($row['Username']==$name && $row['Password']==$password){
            echo "You are fucking logged in";
        }
        else{
            echo "";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup</title>
</head>
<body>
    <form action="" method="POST">
        <label for="">Username : </label><input type="text" name="name" placeholder="Enter username">
        <label for="">Password : </label><input type="password" name="password" placeholder="Enter password">
        
        <input type="submit" name="signup">
    </form>
</body>
</html>