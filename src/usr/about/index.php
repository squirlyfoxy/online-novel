<?php
    // Programmer: Leonardo Baldazzi, Tommaso Brandinelli (@squirlyfoxy, @MayonaiseMan), Contacts: foxchannel16@gmail.com, leonardo.baldazzi2003@gmail.com

    //PAGINA PER GESTIRE IL PROPRIO PROFILO
    
    session_set_cookie_params(0);
    session_start();

    ///
    /// Codice per controllare se siamo loggati oppure no
    /// Codice per avere l'icona dell'utente
    ///

    $usr_name = "";
    $usr_mail = "";
    $usr_id = 0;
    $user_icon = "";
    $is_logged = false;

    ///
    /// Codice per controllare se siamo loggati oppure no
    /// Codice per avere l'icona dell'utente
    ///

    if(isset($_SESSION['logged']))
    {
        if(($_SESSION['logged']) == true)
        {
            $is_logged = true;
            $usr_name = $_SESSION['usr_name'];
            $usr_id = $_SESSION['usr_id'];
            $usr_mail = $_SESSION['usr_mail'];

            if($_SESSION['usr_image'] == "default")
            {
                $user_icon = "../../img/usr.png";
            } else
            {
                $user_icon = $_SESSION['usr_image'];
            }
        }
    }
?>

<html lang="it">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!-- CUSTOM CSS -->
        <link rel="stylesheet" href="../../css/nav-bar.css?version=234234">
        <link rel="stylesheet" href="../../css/style-about-user.css?version=234234">

        <title>Online Novels - Profilo</title>
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
                    <a class="nav-link" href="../../novels/index.php">Archivio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../classifiche/index.php" tabindex="-1" aria-disabled="true">Classifiche</a>
                </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Ricerca" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="">
                        <img src="../../img/src.png" width="32" />
                    </button>
                </form>
            </div>
        </nav>

        <div class="container-fluid">

            <div class="usr">
                <div class="usr-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php
                                echo '
                                    <img src="'.$user_icon.'" class="rounded-circle" alt="Immagine Profilo" width="100"/>';
                            ?>
                        </div>
                        <div class="panel-body">
                            <br>
                            <?php
                                echo '<b>@'.$usr_name.'</b>#'.$usr_id;
                            ?>
                        </div>
                    </div>
                </div>
                <hr>
                <h2>Mi Piace</h2>
                <div class="mi-piace">
                    <?php
                        //TOOD: BACKEND PER VISUALIZZARE I MIEI MI PIACE
                    ?>
                </div>
                <h2>Sta Leggendo</h2>
                <div class="reading">
                    <?php
                        //TOOD: BACKEND PER VISUALIZZARE I Romanzi che sto leggendo
                    ?>
                </div>
                <h2>Posts</h2>
                <div class="posts">
                    <?php
                        //TOOD: BACKEND PER VISUALIZZARE I POSTS E PER FARNE/MODIFICARNE UNO
                    ?>
                </div>
            </div>
        </div>

        <!--- SCRIPTS !--->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <!--- BOOTSTRAP !--->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>
