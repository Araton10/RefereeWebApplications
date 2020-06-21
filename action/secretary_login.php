<?php
    require ("../config/db_driver.php");
    error_reporting(E_ERROR);
    session_start();
    $secretary_mail = $_POST['mail'];
    $secretary_psw = $_POST['pass'];
    $strongPsw = md5($secretary_psw);

    echo("---".$secretary_mail);
    echo("---");
    echo($strongPsw);

    $query = "SELECT mail,psw FROM addetto WHERE mail='".$secretary_mail."' AND psw='".$strongPsw."'";
    if(isset($secretary_mail) && isset($strongPsw)) {
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['secretary'] = TRUE;
                $_SESSION['mail'] = $secretary_mail;
                header('Location: ../webapplication/index.php');
        }else{
            echo("Dati Errati");
        }

    }
?>