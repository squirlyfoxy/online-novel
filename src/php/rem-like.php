<?php
    session_start();

    if(!isset($_SESSION))
        session_set_cookie_params(0);

    include_once("server-connector.php");

    $redirect;
    $usr_id;
    $novel_id;

    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        if((isset($_GET['usr_id']) && isset($_GET['novel_id']) && isset($_GET['redirect']))
            && ($_GET['usr_id'] != 0 && $_GET['novel_id'] != "" && $_GET['redirect'] != ""))
            {
                $redirect = $_GET['redirect'];
                $usr_id = $_GET['usr_id'];
                $novel_id = $_GET['novel_id'];

                //CONTROLLA SE QUESTA NOVEL ESISTE
                if($novel_exists =  $connection->query("SELECT * FROM `novels` WHERE `id` = '".$novel_id."'"))
                {
                    $l = 0;
                    $novel_likes = 0;
                
                    while($row = $novel_exists->fetch_assoc())
                    {
                        $l++;
                        $novel_likes = $row['likes'];
                    }
                
                    if($l == 1)
                    {
                        //TODO: CODICE PER CAVARE IL LIKE ALLA TABELLA DEI LIKES

                        //TODO: CODICE PER CAVARE IL LIKE DALLA TABELLA DELLE NOVELS
                    } else
                    {
                        //SI è VERIFICATO UN ERRORE, ESISTONO PIù NOVELS CON LO STESSO ID
                        header("location: ../novels");
                    }
                }
            }
    }

?>