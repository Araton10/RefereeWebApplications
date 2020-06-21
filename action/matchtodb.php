<?php
    require '../config/db_driver.php';
    $sq1 = $_POST['homesquad'];
    $scoresq1 = $_POST['scorehomesquad'];
    $sq2 = $_POST['othersquad'];
    $scoresq2 = $_POST['scoreothersquad'];
    $cityofmatch = $_POST['cityMatch'];
    $dateandhour = $_POST['data_match'];
    $ref_for_match = $_POST['id_referee_match'];
    $cat_Match = $_POST['categoria_match'];

    $secure_city_name = str_replace("'","\'",$cityofmatch); //Questa stringa sostituisce l'apostrofo con \' in modo che su Database venga visualizzato l'apostrofo, ma la query con PHP rimanga corretta.

    //$matchgoindb = "INSERT INTO partita_arbitrata (sq1,sq2,citta,data_partita,id_arbitro_partita,punti_sq1,punti_sq2) VALUES ('".$sq1."','".$sq2."','".$secure_city_name."','".$dateandhour."','".$ref_for_match."','".$scoresq1."','".$scoresq2."')";
    $matchgoindb = "INSERT INTO partita_arbitrata (sq1,sq2,citta,data_partita,id_arbitro_partita,punti_sq_1,punti_sq_2,categoria) VALUES ('".$sq1."','".$sq2."','".$cityofmatch."','".$dateandhour."','".$ref_for_match."','".$scoresq1."','".$scoresq2."','".$cat_Match."')";
    mysqli_query($conn,$matchgoindb);
    header('Location: ../webapplication/matchlist.php');


?>