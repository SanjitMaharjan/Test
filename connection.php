<?php
    $hostname = "localhost";
    $username = "root";
    $pwd = "";
    $db_name = "users";

    $con = mysqli_connect($hostname,$username,$pwd,$db_name);
    if(!$con){
        echo "Error";
    }
?>