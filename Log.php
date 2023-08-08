<?php
include 'connection.php';

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    
    $sel = "SELECT * FROM `user` WHERE Username='$name'";
    $result = mysqli_query($con, $sel);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row && $row['Username'] === $name && password_verify($password, $row['Password'])) {
            echo "You are logged in.";
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
    <form action="" method="POST">
        <label for="">Username:</label>
        <input type="text" name="name" placeholder="Enter username" required><br>
        <label for="">Password:</label>
        <input type="password" name="password" placeholder="Enter password" required><br>
        <input type="submit" name="signup" value="Login">
    </form>
</body>
</html>
