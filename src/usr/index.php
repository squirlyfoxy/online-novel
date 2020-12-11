<?php
  // Programmer: Leonardo Baldazzi (@squirlyfoxy), Contacts: foxchannel16@gmail.com, leonardo.baldazzi2003@gmail.com

  include_once("../php/server-connector.php");

  session_start();

  //TODO: Controlla se siamo già loggati
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

    <title>Online Novels - LogIn</title>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand" href="../index.php" >Home</a>
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
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="">Search</button>
        </form>
      </div>
    </nav>

    <h1>Log In</h1>

    <div class="container" id="input_dati_login" align="center">
      <form method="POST">
        <div class="form-group">
            <h5>Email</h5>
            <input type="email" class="form-control" id="InputEmailLogin" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <h5>Passworld</h5>
            <input type="password" class="form-control" id="InputPasswordLogin">
        </div>
        <button type="submit" class="btnx btn-dark">Invia</button>
        Non sei registrato? <a class="linkReidirizzamento" href="registrazione.php">Clicca qui</a>
      </form>
    </div>

    <!--- TODO: VISUALIZZA A VIDEO GLI ULTIMI POST E I NOMI DELLE SERIE PIù RECENTI !--->

    <!--- SCRIPTS !--->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!--- BOOTSTRAP !--->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>
