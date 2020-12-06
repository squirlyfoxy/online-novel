<?php
    // Programmer: Leonardo Baldazzi (@squirlyfoxy), Contacts: foxchannel16@gmail.com, leonardo.baldazzi2003@gmail.com

    include_once("../php/server-connector.php");

    session_start();

    ///
@ -13,6 +15,11 @@
    $user_icon = "../img/usr.png";
    $is_logged;

    $last_series = array();
    $popular_series = array();

    //TODO: Raccogli tutte le serie aggiunte per ultime (last 10) e quelle più popolari (con più likes)

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //PER POST RICEVO LE INFORMAZIONI DELL'UTENTE
@ -22,6 +29,12 @@

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
@ -85,8 +98,26 @@
        </nav>

        <h2>Serie Popolari</h2>
        <div class="popular-series">
            <?php
                //Codice per scrivere a video la lista delle serie popolari
                foreach($s as $popular_series)
                {

                }
            ?>
        </div>

        <h2>Ultime Aggiunte</h2>
        <div class="last-series">
            <?php
                //Codice per scrivere a video la lista delle serie aggiunte di recente
                foreach($s as $last_series)
                {

                }
            ?>
        </div>
