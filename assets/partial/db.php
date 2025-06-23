<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "noteapp";

    $connect = mysqli_connect($host,$user,$password,$db);

    if(!$connect){
        echo "data base is not conecte";
    }
?>