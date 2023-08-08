<?php
include 'connection.php';

if (isset($_POST['signup'])) {
    $uname = $_POST['name'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Check if the username already exists
    $udouble = "SELECT `Username` FROM `user` WHERE Username='$uname'";
    $result = mysqli_query($con, $udouble);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            echo "Username '$uname' already exists";
        } else {
            if ($password == $cpassword) {
                // Hash the password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insert the new user into the database
                $stmt = "INSERT INTO `user`(`Username`, `Password`) VALUES ('$uname', '$hashedPassword')";
                mysqli_query($con, $stmt);
                    echo "Signup successful";
                    // You can redirect the user to another page here
            } else {
                echo "Passwords do not match";
            }
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup</title>
    <style>
        input {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <form action="" method="POST" style="font-size: 20px; ">
        <label for="">Username:</label><br>
        <input type="text" name="name" placeholder="Enter username" required pattern="[a-zA-Z0-9_]+"><br>
        <label for="">Password:</label><br>
        <input type="password" name="password" placeholder="Enter password" required><br>
        <label for="">Confirm Password:</label><br>
        <input type="password" name="cpassword" placeholder="Confirm password" required><br>
        <input type="submit" name="signup" value="Signup">
    </form>
</body>
</html>
