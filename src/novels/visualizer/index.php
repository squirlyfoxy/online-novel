<?php
    // Programmer: Leonardo Baldazzi (@squirlyfoxy), Contacts: foxchannel16@gmail.com, leonardo.baldazzi2003@gmail.com

    include_once("../../php/server-connector.php");
    include_once("../../php/log.php");

    session_start();

    // Variabili
    $novel_id = "";
    $novel_name = "";
    $novel_copertina = "";
    $novel_translators = "";
    $novel_autor = "";
    $novel_txt = "";
    $novel_likes = "";
    $novel_added_at = "";
    $position_frame = "";

    /// Per get io avrò la posizione e l'id del romanzo. Se non ricevo nulla visualizzo alcuni romanzi a video
    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        //Se mi vengono passati dei dati per get:
        if($_GET['novel_id'] != "")
        {
            //Ottengo per get un valore che rappresenta l'id del romamzo
            $novel_id = $_GET['novel_id'];
        }

        if($novel_id != "" && $_GET['position_frame'] != "")
        {
            //Ottengo per get la posizione della pagina da leggere
            $position_frame = $_GET['position_frame'];
        }
    }

    //Se non ho ricevuto nulla:
    if($novel_id == "" && $position_frame == "")
    {
        // Redirect a ../
        header("location: ../");
    }

    //Connettersi al database per avere le info romanzo e viasualizzarlo a video
    if($selected_novel_result = $connection->query("SELECT * FROM `novels` WHERE `id`='".$novel_id."'"))
    {
        while($row = $selected_novel_result->fetch_assoc())
        {
            $novel_name = $row['nome'];
            $novel_copertina = $row['copertina'];
            $novel_autor = $row['autore'];
            $novel_translators = $row['translators'];
            $novel_txt = $row['text'];
            $novel_likes = $row['likes'];
            $novel_added_at = $row['added_at'];
        }
    } else
    {
        LogConsole("Errore nella ricerca del libro");
        
        // Redirect a ../
        header("location: ../");
    }

    ///
    /// Codice per controllare se siamo loggati oppure no
    /// Codice per avere l'icona dell'utente
    ///

    $usr_name = "";
    $usr_id = 0;
    $user_icon = "../../img/usr.png";
    $is_logged;

    ///
    /// Codice per controllare se siamo loggati oppure no
    /// Codice per avere l'icona dell'utente
    ///

    //TODO: Non useremo il post ma il session
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //PER POST RICEVO LE INFORMAZIONI DELL'UTENTE

        //Controlla se sono giuste confrontandole con il database
    }

    //Se non ricevo nulla vuol dire che non sono loggato, quindi:
    if($usr_name == "" && $usr_id == "")
    {
        $is_logged = false;
    } else if($usr_name != "" && $usr_id != "")
    {
        $is_logged = true;
    } else
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
        <link rel="stylesheet" href="../../css/nav-bar.css?version=234234">
        <link rel="stylesheet" href="../../css/style-novels.css?version=345345">

        <title>Online Novels - 
            <?php
                //Codice per visualizzare il nome del romanzo
                echo $novel_name;
            ?>
        </title>
    </head>
    <body>
        <!--- MENU !--->
        <nav class="navbar navbar-inverse navbar-expand-lg navbar-dark bg-dark sticky-top">
            <a class="navbar-brand" href="../../">Online Novels</a>
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
                    <li class="nav-item">
                        <?php
                            if($is_logged == false) //Non sono loggato, dai la possibilità di farlo
                            {
                                echo '<a class="nav-link" id="right" href="../usr">Login/Registrati</a>';
                            } else
                            {
                                //Informazioni dell'utente loggato
                                echo '<a class="nav-link" id="right" href="../usr/about/">'.$usr_name.'</a>';
                            }
                            echo '<img src="'.$user_icon.'" width="32"  style="margin-left: 5px; margin-right: 10px;"/>';
                        ?>
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
            <div class="novel-info">
                <?php
                    //Visualizzare le info del romanzo
                    echo "Nome: ".$novel_name.'<br>';
                    echo "Autore: ".$novel_autor;
                ?>
            </div>
            <div class="novel-txt">
                <?php
                    //Visualizzare la pagina del romanzo
                    echo $novel_txt;
                ?>
            </div>
        </div>

        <!--- SCRIPTS !--->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <!--- BOOTSTRAP !--->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>