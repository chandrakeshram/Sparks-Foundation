<?php 
    $server = "localhost";
    $user_name = "root";
    $password = "";
    $database = "The_Sparks_Foundation_Basic_Banking_System";

    $conn = mysqli_connect($server, $user_name, $password, $database);

    if (!$conn) {
        die("Connection to this database failed due to ".mysqli_connect_error());
    }
?>