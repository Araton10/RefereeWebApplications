<?php
    require ("../config/db_driver.php");
    error_reporting(E_ERROR);
    session_start();
    if(!isset($_SESSION['loggedin'])){
        header('Location: ../index.php');
    }

    $isArbitro = $_SESSION['ref'];

    if(!$_SESSION['ref']){
        header('Location: index.php');
        echo("Non hai i permessi necessari per vedere questa pagina");
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
              <li class="nav-item">
                  <a class="nav-link" href="logout.php">Disconnettiti</a>
              </li>
          </ul>
        </div>
      </nav>
      <div class="container-fluid">
        <h1 class="mt-4">Aggiungi Partita</h1>
          <p>In questo modo potrai inserire la partita appena arbitrata guarda l'<code>ID</code> associato al tuo account.</p>
          <?php
            $op = $_SESSION['mail'];
            $operatore = "SELECT id_arbitro FROM arbitro WHERE mail_arbitro='".$op."'";
            $recuperaid = mysqli_query($conn,$operatore);
            $yourId = mysqli_fetch_assoc($recuperaid);

          ?>
          <p> <b> ID ARBITRO: </b> <?php echo($yourId['id_arbitro']); ?> </p>
          <form method="POST" action="../action/matchtodb.php">
              <table class="table id="dataTable" width="100%" cellspacing="0">
                  <tr>
                    <td>
                        <label> Squadra in Casa</label>
                    </td>
                      <td>
                          <input type="text" placeholder="Inserisci il nome della squadra in casa" name="homesquad">
                      </td>
                  </tr>
              <tr>
                  <td>
                      <label> Punti Squadra in Casa</label>
                  </td>
                  <td>
                      <input type="number" placeholder="Inserisci i punti totalizzati dalla Squadra 1" name="scorehomesquad">
                  </td>
              </tr>
              <tr>
                  <td>
                      <label> Squadra in Trasferta</label>
                  </td>
                  <td>
                      <input type="text" placeholder="Inserisci il nome della squadra in trasferta" name="othersquad">
                  </td>
              </tr>
              <tr>
                  <td>
                      <label> Punti Squadra in Trasferta</label>
                  </td>
                  <td>
                      <input type="text" placeholder="Inserisci il nome dell'arbitro" name="scoreothersquad">
                  </td>
              </tr>
              <tr>
                  <td>
                      <label> Città di Svolgimento della partita</label>
                  </td>
                  <td>
                      <input type="text" placeholder="Inserisci il nome della città" name="cityMatch">
                  </td>
              </tr>
              <tr>
                  <td>
                      <label> Categoria</label>
                  </td>
                  <td>
                      <input type="text" placeholder="Inserisci la categoria della partita" name="categoria_match">
                  </td>
              </tr>
              <tr>
                  <td>
                      <label> Data e ora partita</label>
                  </td>
                  <td>
                      <input type="datetime-local" placeholder="Inserisci data e ora" name="data_match">
                  </td>
              <tr>
                  <td>
                      <label> ID Arbitro</label>
                  </td>
                  <td>
                      <input type="number" placeholder="Inserisci l'id dell'arbitro" name="id_referee_match">
                  </td>
              </tr>
              <tr>
                <td>
                    <input type="submit" value="Aggiungi Partita!"
                </td>
              </tr>
              </table>
          </form>
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
