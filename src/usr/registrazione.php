<?php
  // Programmer: Leonardo Baldazzi, Tommaso Brandinelli (@squirlyfoxy, @MayonaiseMan), Contacts: foxchannel16@gmail.com, leonardo.baldazzi2003@gmail.com

  session_set_cookie_params(0);
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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="../css/style-user.css?version=23432234">
    <link rel="stylesheet" href="../css/nav-bar.css?version=234234">

    <title>Online Novels - Registrati</title>
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

    <h1>Registrati</h1>

    <div class="container-fluid">
      <div class="container" id="input_dati_registratione">
        <form action="./processer.php?w=reg" method="POST">
          <h5>Username</h5>
          <input type="text" class="form-control" id="username" name="username">
          <h5>Email</h5>
          <input type="email" class="form-control" id="email" name="email">
          <h5>Passworld</h5>
          <input type="password" class="form-control" id="password" name="password">
          <h5>Conferma Passworld</h5>
          <input type="password" class="form-control" id="password-check" name="password-check"> <br>
          <button type="submit" class="btnx btnx btn-dark">Invia</button>
          <?php
            //GESTIONE DEGLI ERRORI GET
            if($er == "paswd_not_equals")
            {
              echo '
                <br>
                <br>
                <div class="alert alert-danger" role="alert">
                  Errore: Passwords non uguali :(
                </div>';
            } else if ($er == "cams_not_filled")
            {
              echo '
              <br>
              <br>
              <div class="alert alert-danger" role="alert">
                Errore: Tutti i campi devono essere riempiti :(
              </div>';
            } else if ($er == "usr_already_registered")
            {
              echo '
              <br>
              <br>
              <div class="alert alert-danger" role="alert">
                Errore: Esiste già un utente con questo nome utente :(
              </div>';
            } else if ($er == "email_already_registered")
            {
              echo '
              <br>
              <br>
              <div class="alert alert-danger" role="alert">
                Errore: Esiste già un utente con questa email :(
              </div>';
            }
          ?>
          <hr>
          Sei già registrato? <a class="linkReidirizzamento" href="index.php"> Clicca qui</a>
        </form>
      </div>
    </div>

    <!--- SCRIPTS !--->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!--- BOOTSTRAP !--->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>
