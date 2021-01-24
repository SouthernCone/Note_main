<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "it110";
    $port = "3306";
    $con=mysqli_connect($servername, $username, $password, $database);

    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }
?>