<?php
    // Programmer: Leonardo Baldazzi, Tommaso Brandinelli (@squirlyfoxy, @MayonaiseMan), Contacts: foxchannel16@gmail.com, leonardo.baldazzi2003@gmail.com

    //TODO: PAGINA PER GESTIRE IL PROPRIO PROFILO
    
    session_set_cookie_params(0);
    session_start();
?>

<html lang="it">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

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
        </div>

        <!--- SCRIPTS !--->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <!--- BOOTSTRAP !--->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>
