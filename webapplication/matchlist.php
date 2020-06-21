<?php
    require ("../config/db_driver.php");
    error_reporting(E_ERROR);
    session_start();
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
        <a href="index.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="reflist.php" class="list-group-item list-group-item-action bg-light">Lista Arbitri</a>
          <a href="refold.php" class="list-group-item list-group-item-action bg-light">Arbitri al limite d'età </a>
          <?php
          if($_SESSION['secretary']){
              echo'<a href="addreferee.php" class="list-group-item list-group-item-action bg-light">Aggiungi Arbitro</a>';
          }
          if($_SESSION['ref']){
              echo'<a href="addmatch.php" class="list-group-item list-group-item-action bg-light">Aggiungi Partita</a>';
          }
          ?>
        <!--<a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>-->
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
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="logout.php">Disconnettiti</a>
              </li>
          </ul>
        </div>
      </nav>
      <div class="container-fluid">
        <h1 class="mt-4">Lista Partite</h1>
          <p>In questa scheda troverai tutte le partite inserite dagli arbitri</p>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
              <tr>
                  <th>Squadra 1</th>
                  <th>Squadra 2</th>
                  <th>Punti Squadra 1</th>
                  <th>Punti Squadra 2</th>
                  <th>Luogo Partita</th>
                  <th>Data e Ora</th>
                  <th>Cognome Arbitro</th>
                  <th>Comitato</th>
                  <th>Categoria</th>
              </tr>
              </thead>
              <?php

              if (!$conn) {
                  echo "Error: Unable to connect to MySQL." . PHP_EOL;
                  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                  exit;
              }

              $query = "SELECT * FROM partita_arbitrata,arbitro,comitato WHERE partita_arbitrata.id_arbitro_partita = arbitro.id_arbitro AND arbitro.id_comitato_appartenenza = comitato.id_comitato";
              $result = mysqli_query($conn,$query);
              while($row = mysqli_fetch_array($result)){

                  echo "<tr>
            <td>{$row['sq1']}</td>
            <td>{$row['sq2']}</td>
            <td>{$row['punti_sq_1']}</td>
            <td>{$row['punti_sq_2']}</td>
            <td>{$row['citta']}</td>
            <td>{$row['data_partita']}</td>
            <td>{$row['cognome_arbitro']}</td>
            <td>{$row['nome_comitato']}</td>
            <td>{$row['categoria']}</td>
            </tr>
    ";

              }
              ?>
          </table>
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
