<?php
    require ("../config/db_driver.php");
    session_start();
    error_reporting(E_ERROR);
    if(!isset($_SESSION['loggedin'])){
        header('Location: ../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Archio F.I.R - Accesso</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Archivio F.I.R </div>
      <div class="list-group list-group-flush">
        <a href="refold.php" class="list-group-item list-group-item-action bg-light">Arbitri al limite d'età</a>
        <a href="reflist.php" class="list-group-item list-group-item-action bg-light">Lista Arbitri</a>
        <a href="matchlist.php" class="list-group-item list-group-item-action bg-light">Lista Partite</a>
        <!--<a href="addreferee.php" class="list-group-item list-group-item-action bg-light">Aggiungi Arbitro</a>-->
        <!--<a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>-->
          <?php
          if($_SESSION['secretary']){
              echo'<a href="addreferee.php" class="list-group-item list-group-item-action bg-light">Aggiungi Arbitro</a>';
          }
          if($_SESSION['ref']){
              echo'<a href="addmatch.php" class="list-group-item list-group-item-action bg-light">Aggiungi Partita</a>';
          }
          ?>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item">
                  <p class="nav-link">Benvenuto <?php echo $_SESSION['mail']?></p>
              </li>
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Disconnettiti</a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
          <center><img src="../images/logo_fir.png" height="200px"></center>
        <h1 class="mt-4">Benvenuto nella WebApp della Federazione Italiana Rugby!</h1>
        <p>Questa applicazione è stata sviluppata per il Comitato Nazionale Arbitri, usa le funzioni sulla destra per consultare o inserire i dati.</p>
          <p> <b>ATTENZIONE!</b> Le funzioni di <b> Aggiunta Arbitri</b> sono riservate al solo personale di segreteria, gli arbitri che tenteranno di eseguire tale azioni, verranno bloccati dal sistema.</p>
          <p>Attività disponibili:</p>

                  <ul>
                      <li> Visualizza Arbitri che stanno per perdere l'idoneità</li>
                      <li> Visualizza Arbitri</li>
                      <li> Inserisci i dati della partita Arbitrata</li>
                      <li> Inserisci Valutazione partita</li>
                  </ul>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
