<?php
    // Programmer: Leonardo Baldazzi (@squirlyfoxy), Contacts: foxchannel16@gmail.com, leonardo.baldazzi2003@gmail.com

    session_start();

    ///
    /// Codice per controllare se siamo loggati oppure no
    /// Codice per avere l'icona dell'utente
    ///

    $usr_name = "";
    $usr_id = 0;
    $user_icon = "../img/usr.png";
    $is_logged;

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //PER POST RICEVO LE INFORMAZIONI DELL'UTENTE

        //Controlla se sono giuste confrontandole con il database
    }

    //Se non ricevo nulla vuol dire che non sono loggato, quindi:
    if($usr_name == "" && $usr_name == "")
    {
        $is_logged = false;
    }

?>

<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--- BOOTSTRAP !--->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!--- CUSTOM CSS !--->
        <link rel="stylesheet" href="../css/nav-bar.css">

        <title>Online Novels - Romanzi</title>
    </head>
    <body>
        <body>
            <!--- MENU !--->
            <nav class="navbar navbar-inverse navbar-expand-lg navbar-dark bg-dark fixed-top">
                <a class="navbar-brand" href="../index.php">Online Novels</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="">Archivio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="" tabindex="-1" aria-disabled="true">Classifiche</a>
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
                        <input class="form-control mr-sm-2" type="search" placeholder="Ricerca" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="">
                            <img src="../img/src.png" width="32" />
                        </button>
                    </form>
                </div>
            </nav>

        <!--- SCRIPTS !--->

        <!--- BOOTSTRAP !--->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>