<!doctype html>
<html lang="it">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styleUsr.css">

    <title>Online Novels</title>
  </head>
  <body>


    <header>
      <div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
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
      </div>

    </header>


    <h1>Registrati</h1>

    <div>
      <div class="container" id="input_dati_registratione" align="center">
        <form>
          <div class="form-group">
              <h5>Email</h5>
              <input type="email" class="form-control" id="InputEmailRegistrazione" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
              <h5>Conferma Email</h5>
              <input type="email" class="form-control" id="InputEmailRegistrazioneConf" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
              <h5>Passworld</h5>
              <input type="password" class="form-control" id="InputPasswordRegistrazione">
          </div>
          <div class="form-group">
              <h5>Conferma Passworld</h5>
              <input type="password" class="form-control" id="InputPasswordRegistrazioneConf">
          </div>
          <button type="submit" class="btnx btnx btn-dark">Invia</button>
          <a class="linkReidirizzamento" href="index.php"> <p>se hai gi&agrave; un account clicca qui</p> </a>
        </form>
      </div>
    </div>

    <footer class="container" >
           <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-bottom ">
             <div class="collapse navbar-collapse" id="navbarSupportedContentFooter">
             <ul class="navbar-nav mr-auto">
             <li class="nav-item">
               <a class="nav-link" href="../infopage/member.php">membri</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="../infopage/contacts.php" tabindex="-1" aria-disabled="true">contatti</a>
             </li>
             </ul>

             </div>
           </nav>
     </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

  </body>
</html>
