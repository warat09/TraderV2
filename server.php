<?php 
    $servername = "localhost";
    $username = "root";
    $password = "mistersig";
    $dbname = "register_db";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if (!$conn){
        die("Connect fail" . mysqli_connect_error());
    }
    else{
        echo "Connect successfully";
    }
?>