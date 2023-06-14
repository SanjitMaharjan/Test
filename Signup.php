<?php
include 'connection.php';

    

if(isset($_POST['signup'])){
    $uname = $_POST['name'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $udouble = "SELECT `Username` FROM `user` WHERE Username='$uname'";
    $result=mysqli_query($con,$udouble);
    $row = mysqli_fetch_assoc($result);
    $existuser = $row['Username'];
    if($existuser == $uname){
    echo "username". $existuser . "Exits";
    }
    else{
    if($password==$cpassword){
        $stmt = "INSERT INTO `user`(`Username`,`Password`) VALUES('$uname','$password')";
        mysqli_query($con,$stmt);
    }
    else{
        echo "Password not matched";
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup</title>
    <style>
        
        input{
            font-size: 20px;
        }
    </style>
</head>
<body>
    <form action="" method="POST" style="font-size: 20px; ">
        <label for="">Username : </label>
        <br><input type="text" name="name" placeholder="Enter username">
        <br>
        <label for="">Password : </label>
        <br><input type="password" name="password" placeholder="Enter password">
        <br>
        <label for="">Confirm Password : </label>
        <br><input type="password" name="cpassword" placeholder="Confirm password">
        <br>
        <input type="submit" name="signup" value="signup">
    </form>
</body>
</html>