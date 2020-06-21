<?php
    require ("../config/db_driver.php");
    $ref_cognome = $_POST['cognomeRef'];
    $ref_nome = $_POST['nomeRef'];
    $ref_mail = $_POST['mailRef'];
    $ref_anno = $_POST['annoRef'];
    $ref_fir = $_POST['tesserafir'];
    $ref_comi = $_POST['ideComitato'];
    $operator_id = $_POST['ideOperatore'];

    $ref_right_cognome = str_replace("'","\'",$ref_cognome); //Questa stringa sostituisce l'apostrofo con \' in modo che su Database venga visualizzato l'apostrofo, ma la query con PHP rimanga corretta.
    $ref_right_nome = str_replace("'","\'",$ref_nome);
    
    $gotodb = "INSERT INTO arbitro (nome_arbitro,cognome_arbitro,mail_arbitro,anno_di_nascita,n_tessera,id_addetto_garantisce_accesso,id_comitato_appartenenza) VALUES ('".$ref_right_nome."','".$ref_right_cognome."','".$ref_mail."','".$ref_anno."','".$ref_fir."','".$operator_id."','".$ref_comi."')";
    mysqli_query($conn,$gotodb);
    header('Location: ../webapplication/reflist.php');

?>