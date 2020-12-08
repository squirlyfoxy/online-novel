<?php
    // Programmer: Leonardo Baldazzi (@squirlyfoxy), Contacts: foxchannel16@gmail.com, leonardo.baldazzi2003@gmail.com

    include_once("../php/server-connector.php");

    session_start();

    ///
    /// Codice per controllare se siamo loggati oppure no
    /// Codice per avere l'icona dell'utente
    ///

    // CODE REVISION: Non copiare il mio codice che dopo succede un gran casino, lavora nel tuo :)

    $usr_name = "";
    $usr_id = 0;
    $user_icon = "../img/usr.png";
    $is_logged;

    $last_series = array();
    $popular_series = array();

    //TODO: Raccogli tutte le serie aggiunte per ultime (last 10) e quelle più popolari (con più likes)

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //PER POST RICEVO LE INFORMAZIONI DELL'UTENTE

        //Controlla se sono giuste confrontandole con il database
    }

    //Se non ricevo nulla vuol dire che non sono loggato, quindi:
    if($usr_name == "" && $usr_name == "")
    {
        $is_logged = false;
    } else if($usr_name != "" && $usr_name != "")
    {
        $is_logged = true;
    } else
    {
        $is_logged = false;
    }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Online Novel</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
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
                <a class="nav-link" href="index.php">Archivio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../classifiche/index.php" tabindex="-1" aria-disabled="true">Classifiche</a>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                    <?php
                        echo '<li class="nav-item" >';

                        if($is_logged == false) //Non sono loggato, dai la possibilità di farlo
                        {
                            echo '
                                <a class="nav-link" id="right" href="../usr">Login/Registrati</a>';
                        } else
                        {
                            //Informazioni dell'utente loggato
                            echo '
                                <a class="nav-link" id="right" href="../usr/about/">'.$usr_name.'</a>';
                        }
                        echo '<img id="right" src="'.$user_icon.'" width="32" />';
                        echo '</li>';
                    ?>
                </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="">Search</button>
            </form>
          </div>
        </nav>
      </div>
    </header>


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
