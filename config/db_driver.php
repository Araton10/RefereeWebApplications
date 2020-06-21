<?php
    $host = "127.0.0.1";
    $username = "root";
    $psw = "";
    $dbselected = "archiviofir";

    $conn = mysqli_connect($host,$username,$psw,$dbselected);

    if(!$conn){
        echo("Errore di connessione - Ritenta");
    }else{
        echo("Connessione Stabilita");
    }
?>