<?php 
    $servername = "localhost";
    $username = "mistersig";
    $password = "TraderV2";
    $dbname = "beebacop";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if (!$conn){
        die("Connect fail" . mysqli_connect_error());
    }
 
?>