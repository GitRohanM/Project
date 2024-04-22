<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hotelblissful";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if(!$conn) {
        die("<script>alert('Connection Failed.')</script>");
    }
?>