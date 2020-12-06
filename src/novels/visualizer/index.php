<?php
    // Programmer: Leonardo Baldazzi (@squirlyfoxy), Contacts: foxchannel16@gmail.com, leonardo.baldazzi2003@gmail.com

    include_once("../../php/server-connector.php");

    session_start();

    ///
@ -60,6 +62,12 @@

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
