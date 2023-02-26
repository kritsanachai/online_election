<?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "online_election";

    $conn = mysqli_connect($host,$user,$pass,$dbname);

    if(!$conn){
        echo"not connecting".mysqli_connect_error();
    }

?>