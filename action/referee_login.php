<?php
    require ("../config/db_driver.php");
    error_reporting(E_ERROR);
    session_start();
    $ref_mail = $_POST['mail_arbitro'];
    $ref_psw = $_POST['pass_arbitro'];
    $strongPsw = md5($ref_psw);

    echo("---".$ref_mail);
    echo("---");
    echo($strongPsw);

    $query = "SELECT mail_arbitro,ref_psw FROM arbitro WHERE mail_arbitro='".$ref_mail."' AND ref_psw='".$strongPsw."'";
    if(isset($ref_mail) && isset($strongPsw)) {
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['ref'] = TRUE;
                $_SESSION['mail'] = $ref_mail;
                echo("Loggato Con successo");
                header('Location: ../webapplication/index.php');
        }else{
            echo("Dati Errati");
        }

    }
?>