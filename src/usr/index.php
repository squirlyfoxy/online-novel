<?php
  // Programmer: Leonardo Baldazzi, Tommaso Brandinelli (@squirlyfoxy, @MayonaiseMan), Contacts: foxchannel16@gmail.com, leonardo.baldazzi2003@gmail.com

  session_start();

  $er = "";
  if($_SERVER['REQUEST_METHOD'] == 'GET')
  {
    if(isset($_GET['er']))
    {
      $er = $_GET['er'];
    }
  }

  //Controlla se siamo già loggati
  if(isset($_SESSION['logged']))
  {
    if(($_SESSION['logged']) == true)
    {
      header("location: ./about");
    }
  }
?>

<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="../css/style-user.css?version=234234">
    <link rel="stylesheet" href="../css/nav-bar.css?version=234234">

    <title>Online Novels - LogIn</title>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand" href="../index.php" >Online Novels</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="../novels/index.php">Archivio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../classifiche/index.php" tabindex="-1" aria-disabled="true">Classifiche</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Ricerca" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="">
                <img src="../img/src.png" width="32" />
            </button>
          </form>
        </div>
    </nav>

    <h1>Log In</h1>

    <div class="container-fluid">
      <div class="container" id="input_dati_login">
        <form action="./processer.php?w=log-in" method="post" role="form">
          <h5>Email</h5>
          <input type="email" class="form-control" id="email" name="email">
          <h5>Passworld</h5>
          <input type="password" class="form-control" id="password" name="password"> <br>
          <button type="submit" class="btnx btn-dark">Invia</button>
          <?php
            //GESTIONE DEGLI ERRORI GET
            if($er == "not_found")
            {
              echo '
                <br>
                <br>
                <div class="alert alert-danger" role="alert">
                  Errore: Utente non trovato :(
                </div>';
            } else if ($er == "cams_not_filled")
            {
              echo '
              <br>
              <br>
              <div class="alert alert-danger" role="alert">
                Errore: Tutti i campi devono essere riempiti :(
              </div>';
            } 
          ?>
          <hr>
          Non sei registrato? <a class="linkReidirizzamento" href="registrazione.php">Clicca qui</a>
        </form>
      </div>
    </div>

    <!--- TODO: VISUALIZZA A VIDEO GLI ULTIMI POST E I NOMI DELLE SERIE PIù RECENTI !--->

    <!--- SCRIPTS !--->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!--- BOOTSTRAP !--->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>
