<?php
    // Programmer: Leonardo Baldazzi (@squirlyfoxy), Contacts: foxchannel16@gmail.com, leonardo.baldazzi2003@gmail.com

    include_once("../php/server-connector.php");

    session_start();



    $DAYS_TO_REMOVE = 7;

    $usr_name = "";
    $usr_id = 0;
    $user_icon = "../img/usr.png";
    $is_logged;

    //Devono essere solo i primi 10
    $last_series = array();
    $popular_series = array();

    //Raccogli tutte le serie aggiunte per ultime (last 10) e quelle più popolari (con più likes)
    $date = new DateTime(date('Y-m-d H:i:s'));
    $date->modify("-".$DAYS_TO_REMOVE." days");

    $current_date = $date->format('Y-m-d H:i:s');
    
    //Ultime serie caricate
    if($last_series_result = $connection->query("SELECT * FROM novels WHERE `added_at` >= '".$current_date."'"))
    {
        $last_series_tmp = array();

        //Popola l'array
        while($row = $last_series_result->fetch_assoc())
        {
            $last_series_tmp[] = array("Id"=>$row['id'], "Nome"=>$row['nome'], "Copertina"=>$row['copertina'], "Autore"=>$row['autore'], "Traduttori"=>$row['translators'], "Testo"=>$row['text'], "Data_Aggiunta"=>$row['added_at'], "Likes"=>$row['likes']);
        }

        $last_series = array_slice($last_series_tmp, 0 , 10);

        $last_series_result->free();
    }

    //Serie popolari
    if($popular_series_result = $connection->query("SELECT * FROM novels WHERE 1"))
    {
        $popular_series_tmp;

        //Aggiungi dentro popular_series tutte le novels della query
        while($row = $popular_series_result->fetch_assoc())
        {
            $popular_series_tmp[] = array("Id"=>$row['id'], "Nome"=>$row['nome'], "Copertina"=>$row['copertina'], "Autore"=>$row['autore'], "Traduttori"=>$row['translators'], "Testo"=>$row['text'], "Data_Aggiunta"=>$row['added_at'], "Likes"=>$row['likes']);
        }

        $tmp_likes = $popular_series_tmp[0]['Likes'];
        $tmp;
        $pos = 0;

        //Ordino l'array per numero di likes
        foreach($popular_series_tmp as $key_tmp=>$s_tmp)
        {
            foreach($popular_series_tmp as $key=>$s)
            {
                if((int)$s['Likes'] > $tmp_likes)
                {
                    //Switch
                    $tmp_likes = (int)$s['Likes'];

                    if($pos > 0)
                    {
                        $tmp = $popular_series_tmp[$pos];
                        $popular_series_tmp[$pos] = $popular_series_tmp[$pos - 1];
                        $popular_series_tmp[$pos - 1] = $tmp;
                    }
                }

                $pos++;
            }
            $pos = 0;
        }

        $popular_series = array_slice($popular_series_tmp, 0 , 10);

        $popular_series_result->free();
    }

    ///
    /// Codice per controllare se siamo loggati oppure no
    /// Codice per avere l'icona dell'utente
    ///

    //Non useremo il post ma il session
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

<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!--- BOOTSTRAP !--->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!--- CUSTOM CSS !--->
        <link rel="stylesheet" href="../css/nav-bar.css?version=234234">
        <link rel="stylesheet" href="../css/style-novels.css?version=345345">

        <title>Online Novels - Romanzi</title>
    </head>
    <body>
        <!--- MENU !--->
        <nav class="navbar navbar-inverse navbar-expand-lg navbar-dark bg-dark sticky-top">
            <a class="navbar-brand" href="../">Online Novels</a>
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
                                echo '<a class="nav-link" id="right" href="../usr/">Login/Registrati</a>';
                            } else
                            {
                                //Informazioni dell'utente loggato
                                echo '<a class="nav-link" id="right" href="../usr/about/">'.$usr_name.'</a>';
                            }
                            echo '<img id="right" src="'.$user_icon.'" width="32" />';
                        ?>
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

        <div class="container-fluid">
            <div class="popular-series">
                <h2>Serie Popolari</h2>
                <div class="series-row">
                        <?php
                            //Codice per scrivere a video la lista delle serie popolari
                            if(!(empty($popular_series)))
                            {
                                foreach($popular_series as $key=>$s)
                                {
                                    //Stile di test, position_frame sarà uguale alla posizione attuale letta dell'utente

                                    //TODO: In card-body aggiungere un'immagine per il like, dare uno stile migliore 
                                    echo '<div class="card" style="width: 15rem;">
                                                <div class="view overlay">
                                                    <a href="./visualizer/?novel_id='.$s['Id'].'&position_frame=0">
                                                        <img class="card-img-top" src="../img/upload/'.$s['Copertina'].'" alt="'.$s['Nome'].'">
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        '.$s['Nome'].'
                                                    </div>
                                                    Likes: '.$s['Likes'].'
                                                </div>
                                            </div>';
                                }
                            }
                        ?>
                </div>
            </div>

            <div class="last-series">
                <h2>Ultime Aggiunte</h2>
                <div class="series-row">
                    
                        <?php
                            //Codice per scrivere a video la lista delle serie aggiunte di recente
                            if(!(empty($last_series)))
                            {
                                foreach($last_series as $key=>$s)
                                {
                                    //Stile di test, position_frame sarà uguale alla posizione attuale letta dell'utente

                                    //TODO: In card-body aggiungere un'immagine per il like, dare uno stile migliore 
                                    echo '<div class="card" style="width: 15rem;">
                                            <div class="view overlay">
                                                <a href="./visualizer/?novel_id='.$s['Id'].'&position_frame=0">
                                                    <img class="card-img-top" src="../img/upload/'.$s['Copertina'].'" alt="'.$s['Nome'].'">
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <div class="text-center">
                                                    '.$s['Nome'].'
                                                </div>
                                                Likes: '.$s['Likes'].'
                                            </div>
                                        </div>';
                                }
                            }
                        ?>
                </div>
            </div>
        </div>

        <!--- SCRIPTS !--->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script>
            $(window).resize(function()
            {
                (function($) {
                    $.fn.hasWidthScrollBar = function() {
                        return this.get(0).scrollWidth > this.width();
                    }
                })(jQuery);

                if($(".series-row").hasWidthScrollBar())
                {
                    $(".series-row").css("overflow-x", "scroll");
                } else
                {
                    $(".series-row").css("overflow-x", "hidden");
                }
            });
        </script>

        <!--- BOOTSTRAP !--->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>